<!DOCTYPE html>
<html>
<head>
	<title>Hostipal</title>
	<!-- CSS Link -->
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/mystyle.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/fontawesome/css/all.min.css')}}">

</head>
<body>
	<!-- Navogation -->
	<nav class="navbar navbar-expand-lg navbar-light bg-light py-3 menu fixed-top">
		<div class="container">
			<img src="{{asset('frontend/img/OK_logo.jpg')}}" width="40" height="40">
			<a class="navbar-brand" href="index.html">OK Hospital</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a class="nav-link active px-3" href="index.html">Home <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item dropdown">
				        <a class="nav-link dropdown-toggle px-3" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				          Speciality
				        </a>
				        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
				        	@foreach($data[0] as $speciality)
				        	@php 
				        		$speciality_id = $speciality->id;
				        		$speciality_name = $speciality->name;
				        	@endphp
					          	<div class="dropdown-divider"></div>
					          	<a class="dropdown-item" href="{{route('speciality_page',$speciality_id)}}">{{ $speciality_name }}</a>
				          	@endforeach
				        </div>
				    </li>
					<li class="nav-item">
						<a class="nav-link px-3" href="about.html">About</a>
					</li>
					<li class="nav-item">
						<a class="nav-link px-3" href="contact.html">Contact</a>
					</li>
                    @guest
                        <li class="nav-item">
                            <a class="nav-link px-3" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item px-3">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link px-3 dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            	
                            	@if(Auth::user()->hasRole('admin'))
		                            <a class="dropdown-item" href="{{ route('admin.dashboard') }}">
	                                    {{ __('Dashboard') }}
	                                </a>
	                            @elseif(Auth::user()->hasRole('doctor'))   
	                            	<a class="dropdown-item" href="{{ route('doctor.doctor_page') }}">
	                                    {{ __('Account') }}
	                                </a> 
	                            @else
	                            	<a class="dropdown-item" href="{{ route('user_profile') }}">
	                                    {{ __('Account') }}
	                                </a> 
		                        @endif
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
				</ul>
			</div>
	 	</div>
	</nav><!-- End Navogation -->

	<!--Banner Section-->
	{{ $slot }}


	<!-- Footer -->
	<footer>
		<div class="container-fluid mt-5 bg-dark text-white">
			<div class="row pt-3">
				<div class="col-md-6 col-6 text-left">
					<p>All Rigth Reserved &copy; Designed By HMH</p>
				</div>
				<div class="col-md-6 col-6 text-right social">
					<i class="fab fa-facebook-square fa-lg"></i>
					<i class="fab fa-instagram-square fa-lg"></i>
					<i class="fab fa-github-square fa-lg"></i>
				</div>
			</div>
		</div>
	</footer>

	<!-- JS Link -->
	<script type="text/javascript" src="{{asset('frontend/bootstrap/js/jquery.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('frontend/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
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