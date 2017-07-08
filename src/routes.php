<?php 

/*USER MANAGEMENT*/
Route::group(['prefix'=>'admin','middleware' => ['web']], function()
{
	/*CALENDAR*/
	Route::get('outlook-calendar/getlist','MspPack\OutLookCalendar\Http\CalendarController@getList');
	Route::get('outlook-calendar/login','MspPack\OutLookCalendar\Http\CalendarController@login');
	Route::resource('outlook-calendar','MspPack\OutLookCalendar\Http\CalendarController');
});
