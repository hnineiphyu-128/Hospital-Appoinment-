<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>OK Hospital </title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">


    <link rel="stylesheet" href="{{asset('backend/vendors/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/vendors/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/vendors/themify-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('backend/vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/vendors/selectFX/css/cs-skin-elastic.css')}}">
    <link rel="stylesheet" href="{{asset('backend/vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}">

    <link rel="stylesheet" href="{{asset('backend/assets/css/style.css')}}">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
</head>

<body>
    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            @if(Auth::user()->hasRole('admin'))
                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand" href="./"><img src="{{asset('backend/images/logo.png')}}" width="50" height="50"></a>
                    {{-- <a class="navbar-brand hidden" href="./"><img src="{{asset('backend/images/logo.png')}}" alt="Logo"></a> --}}
                </div>
                <div id="main-menu" class="main-menu collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="menu-title {{Request::segment(2)==='dashboard' ? 'active':''}}">
                            <a href="{{route('admin.dashboard')}}"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                        </li>
                        <h2 class="menu-title">Management</h2><!-- /.menu-title -->

                        <li class="menu-title {{Request::segment(2)==='speciality' ? 'active':''}}">
                            <a href="{{route('admin.speciality.index')}}" class=""> <i class="menu-icon fa fa-stethoscope"></i>
                                Speciality
                            </a>
                        </li>

                        <li class="menu-title {{Request::segment(2)==='doctor' ? 'active':''}}">
                            <a href="{{route('admin.doctor.index')}}" class=""> <i class="menu-icon fa fa-user-md"></i>
                                Doctor
                            </a>
                        </li>

                        <li class="menu-title {{Request::segment(2)==='schedule' ? 'active':''}}">
                            <a href="{{route('admin.schedule.index')}}" class=""> <i class="menu-icon fa fa-calendar"></i>
                                Schedule
                            </a>
                        </li>

                        {{-- <li class="menu-title">
                            <a href="#" class=""> <i class="menu-icon fa fa-dedent"></i>
                                Appoinment Lists
                            </a>
                        </li> --}}

                        <li class="menu-title" class="{{Request::segment(2)==='patient' ? 'active':''}}">
                            <a href="{{route('admin.patient.index')}}" class=""> <i class="menu-icon fa fa-wheelchair"></i>
                                Patient Lists
                            </a>
                        </li>

                        <li class="menu-title {{Request::segment(2)==='user' ? 'active':''}}">
                            <a href="{{route('admin.user.index')}}" class=""> <i class="menu-icon fa fa-users"></i>
                                User Lists
                            </a>
                        </li>

                        
                        {{-- <li class="menu-item-has-children dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Forms</a>
                            <ul class="sub-menu children dropdown-menu">
                                <li><i class="menu-icon fa fa-th"></i><a href="forms-basic.html">Basic Form</a></li>
                                <li><i class="menu-icon fa fa-th"></i><a href="forms-advanced.html">Advanced Form</a></li>
                            </ul>
                        </li> --}}

                        
                    </ul>
                </div><!-- /.navbar-collapse -->
            @elseif(Auth::user()->hasRole('doctor'))
                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa fa-bars"></i>
                    </button>

                    <img src="{{asset('backend/images/logo.png')}}" width="40" height="40">
                </div>
                <div id="main-menu" class="main-menu collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="menu-title {{Request::segment(2)==='doctor_page' ? 'active':''}}">
                            <a href="{{route('doctor.doctor_page')}}"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                        </li>
                        <h2 class="menu-title">Management</h2><!-- /.menu-title -->


                        <li class="menu-title {{Request::segment(2)==='doctor_profile' ? 'active':''}}">
                            <a href="{{route('doctor.doctor_profile')}}" class=""> <i class="menu-icon fa fa-user"></i>
                                Profile
                            </a>
                        </li>


                        <li class="menu-title {{Request::segment(2)==='doctor_schedule' ? 'active':''}}">
                            <a href="{{route('doctor.doctor_schedule')}}" class=""> <i class="menu-icon fa fa-calendar"></i>
                                Schedule
                            </a>
                        </li>

                        <li class="menu-title" class="{{Request::segment(2)==='doctor_patient' ? 'active':''}}">
                            <a href="{{route('doctor.doctor_patient')}}" class=""> <i class="menu-icon fa fa-wheelchair"></i>
                                Patient Lists
                            </a>
                        </li>
                        
                    </ul>
                </div><!-- /.navbar-collapse -->
            @endif
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left">
                        <div class="dropdown for-notification">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="notification">
                                <i class="fa fa-bell"></i>
                                <span class="count bg-danger" id="notification_count">5</span>
                            </button>
                        </div>

                        <div class="dropdown for-message">
                            <button class="btn btn-secondary dropdown-toggle" type="button"
                                id="message">
                                <i class="ti-email"></i>
                                <span class="count bg-primary" id="message_count">9</span>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="{{asset('backend/images/admin.jpg')}}" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <h4 class="font-weight-bold font-italic">{{ Auth::user()->name }} </h4>
                            <hr>
                            <a class="nav-link" href="#"><i class="fa fa-user"></i> My Profile</a>

                            <a class="nav-link" href="#"><i class="fa fa-user"></i> Notifications <span class="count">13</span></a>

                            <a class="nav-link" href="#"><i class="fa fa-cog"></i> Settings</a>

                            {{-- <a class="nav-link" href="#"><i class="fa fa-power-off"></i> Logout</a> --}}
                            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fa fa-power-off"></i> {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>

                    <div class="language-select dropdown" id="language-select">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown"  id="language" aria-haspopup="true" aria-expanded="true">
                            <i class="flag-icon flag-icon-us"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="language">
                            <div class="dropdown-item">
                                <span class="flag-icon flag-icon-fr"></span>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-es"></i>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-us"></i>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-it"></i>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->

        {{ $slot }}
        <!-- .content -->


    </div><!-- /#right-panel -->

    <!-- Right Panel -->


    <script src="{{asset('backend/vendors/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('backend/vendors/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{asset('backend/vendors/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('backend/assets/js/main.js')}}"></script>


    <script src="{{asset('backend/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('backend/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('backend/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('backend/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('backend/vendors/jszip/dist/jszip.min.js')}}"></script>
    <script src="{{asset('backend/vendors/pdfmake/build/pdfmake.min.js')}}"></script>
    <script src="{{asset('backend/vendors/pdfmake/build/vfs_fonts.js')}}"></script>
    <script src="{{asset('backend/vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('backend/vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('backend/vendors/datatables.net-buttons/js/buttons.colVis.min.js')}}"></script>
    <script src="{{asset('backend/assets/js/init-scripts/data-table/datatables-init.js')}}"></script>
    <script src="{{asset('backend/custom.js')}}"></script>
    <script type="text/javascript" src="{{asset('frontend/bootstrap/js/jquery.min.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#pwd').hide();
            
            $('#editProfile').on('click','#ch_pwd',function () {
                // alert('Xiao Zhan');
                var chkbox = $("input[type='checkbox']");
                if (chkbox.is(':checked')) {
                    $('#pwd').show(500);
                }
                else {
                    $('#pwd').hide(500);
                }
            })
        })
    </script>


</body>

</html>
