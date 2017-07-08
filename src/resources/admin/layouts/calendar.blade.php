<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('admin/plugins/images/favicon.png')}}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{asset('admin/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/plugins/bower_components/calendar/dist/fullcalendar.css')}}" rel="stylesheet">
    <link href="{{asset('admin/css/animate.css')}}" rel="stylesheet">
    <link href="{{ asset('admin/css/bootstrap-tagsinput.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/select2.min.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{asset('admin/css/custom.css')}}" id="theme" rel="stylesheet">
    <link href="{{asset('admin/css/style.css')}}" rel="stylesheet">
    <!-- color CSS -->
    <link href="{{asset('admin/css/colors/blue-dark.css')}}" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body class="fix-sidebar">
    <!-- Preloader -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>
        </svg>
    </div>
    <div id="wrapper">
        @include('admin.layouts.partials.header')
        @include('admin.layouts.partials.navigation')
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">{{$module_name}} <small>{{ isset($title)?$title:'' }}</small></h4> 
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <?php $segments = Request::segments();?>
                        @if(!empty($segments))
                            <ol class="breadcrumb">
                                <li {{ (( Request::segment(1)=='home') ? 'class=active' : '') }}><a href="{{url('home')}}">Dashboard</a></li>
                                @if(isset($module_name))
                                    <li class="active"><a href="{{url(Request::segment(1))}}">{{ $module_name }}</a></li>
                                @endif
                                @if(isset($title))
                                    <li class="active">{{ ucfirst($title) }}</li>
                                @endif
                            </ol>
                        @endif
                    </div>
                </div>
                @include('admin.layouts.partials.notifications')
                @yield('content')
                <footer class="footer text-center"> {{date('Y')}} &copy; Copy right by {{ config('setup.project_full_name', 'Laravel') }} </footer>
            </div>
        </div>
    </div>
    
    <script src="{{asset('admin/plugins/bower_components/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('admin/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admin/js/jquery.slimscroll.js')}}"></script>
    
    <script src="{{asset('admin/plugins/bower_components/calendar/jquery-ui.min.js')}}"></script>
    <script src="{{asset('admin/plugins/bower_components/moment/moment.js')}}"></script>
    
    <script src="{{asset('admin/plugins/bower_components/calendar/dist/fullcalendar.min.js')}}"></script>
    <script src="{{asset('admin/plugins/bower_components/calendar/dist/jquery.fullcalendar.js')}}"></script>
    <script src="{{asset('admin/plugins/bower_components/calendar/dist/cal-init.js')}}"></script>

    <script src="{{ asset('admin/js/bootbox.min.js') }}"></script>
    <script src="{{ asset('admin/js/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('admin/js/select2.min.js') }}"></script>
    <!-- Custom Theme JavaScript -->
    <script src="{{asset('admin/js/custom.min.js')}}"></script>
    <script type="text/javascript">
    $('select').select2();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    </script>
    <script src="{{asset('admin/plugins/bower_components/toast-master/js/jquery.toast.js')}}"></script>
</body>

</html>