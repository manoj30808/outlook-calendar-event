<?php namespace MspPack\OutLookCalendar\Http;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use View;
use DB;
use Auth;
use Session;
use App\Http\Controllers\Controller;
use MspPack\OutLookCalendar\Calendar;
use MspPack\OutLookCalendar\Lib\Office365Service as Office365Service;

class CalendarController extends Controller
{
	private $view_path;
    private $ctrl_url;

    public function __construct()
    {
        $this->middleware('auth');
        $this->ctrl_url = '/admin/outlook-calendar';

        $this->view_path = 'admin.outlook-calendar';
        View::share(['ctrl_url'=>$this->ctrl_url,'view_path'=>$this->view_path,'module_name'=> 'OutLook','title'=>'Calendar']);
    }

    public function index(Request $request)
    {
        return view($this->view_path.'.index');
    }
    public function getList()
    {
        $items = Calendar::select('id as _id','title','start','end',DB::raw("'bg-danger' AS className"))->where('user_id','=',Auth::user()->id)->get();
        return json_encode($items);
    }
    public function store(Request $request)
    {
        $inputs = $request->except('_token','_method');
        $data   = array_except($inputs,array('save','save_exit'));
        $data['user_id'] = Auth::user()->id;
                
        if($event_id = Calendar::create($data)->getKey()){
            
            $start = \Carbon\Carbon::parse($data['start']);
            $end = \Carbon\Carbon::parse($data['end']);
            $event = Office365Service::addEventToCalendar(Session::get('accessToken'), $data['title'] , '', $start, $end, Auth::user()->email);  
            
            /*UPDATE google event id in database*/
            Calendar::where('id','=',$event_id)->update(['g_event_id'=>$event]);
            
            return 'Success';
        }

        return 'Fail';
    }

    public function login(Request $request)
    {
        return $this->loginAuthorize($request->all());
    }

    public function loginAuthorize($data)
    {
        $code = $data['code'];
        $session_state = $data['session_state'];

        if (is_null($code)) {
          // Display error 
          return redirect($this->ctrl_url)
                ->with('error',"There was no 'code' parameter in the query string.");
        }
        else {
              $redirectUri = config('laravel-outlook-calendar.redirect_url'); 
              
              $tokens = Office365Service::getTokenFromAuthCode($code, $redirectUri);
              
              if (isset($tokens['access_token']) && !empty($tokens['access_token'])) {
                
                // Save the access token and refresh token to the session.
                $session_data = [
                    'accessToken'=>$tokens['access_token'],
                    'refreshToken' => $tokens['refresh_token'],
                    'userName' => Office365Service::getUserName($tokens['id_token']),
                ];
                session($session_data);
                
                return redirect($this->ctrl_url)
                        ->with('success','Calendar Success Connected.');
              }
              else {
                return redirect($this->ctrl_url)
                        ->with('error','error in access_token');
              }
        }

        return redirect($this->ctrl_url)
                ->with('error',"There was no 'code' parameter in the query string.");

    }
}
