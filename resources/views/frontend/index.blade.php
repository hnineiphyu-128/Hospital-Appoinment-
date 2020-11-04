<x-frontend>
	<!--Banner Section-->
	<section  id="banner">

		<div class="container-fluid">
			<div class="row justify-content-center text-white text-center">
				<div class="col-8" id="headerWhitespace">
					<h1 class="text-uppercase display-6">Welcome To <span id="a">OK</span> Hospital</h1>
					<p class="my-5">10-12 December,Downtown Conference Center,Yangon</p>
					<a href="appoinment.html" class="btn d-xl-inline-block d-lg-inline-block" id="aboutBtn">Make Appoinment</a>
				</div>
			</div>
		</div>

	</section><!-- End Banner Section -->


	<!-- Doctor List -->
	<div class="container mt-5">
		<h2 class="text-center">Our Main Doctors</h2>
		<hr class="divider my-2">
	</div>
	<div class="container">
		<div class="row">
			@foreach($doctors as $doctor)
			@php 
				$id = $doctor->id;
				$name = $doctor->user->name;
				$email = $doctor->user->email;
				$profile = $doctor->profile;
			@endphp
			<div class="col-md-3 pt-5">
				<div class="card">
					<div class=" card_img">	
						<img src="{{ $profile }}" class="card-img-top border images" alt="...">
						<a href="#" class="detail">
							<span class="fa-stack fa-lg">
								<i class="fa fa-circle fa-stack-2x"></i>
								<i class="fas fa-eye fa-stack-1x fa-inverse"></i>
							</span>
						</a>
					</div>
					<div class="card-body text-center">
						<p class="my-2">{{ $name }}</p>
						<hr class="item-divider">
						<p class="my-2"></p>
						<a href="#" class="btn btn-outline-info btn-block">Making Appoinment</a>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div><!-- End Doctor List -->


	<div class="jumbotron jumbotron-fluid  mt-5">
		<div class="container text-center">
			<h1 class="">Fluid jumbotron</h1>
			<p class="lead">
				This is a modified jumbotron that occupies the entire horizontal space of its parent.
			</p>
		</div>
	</div>

	<!-- Carousel -->
	<div class="container container-carousel mt-5">
		<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
				<li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
				<li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
				<li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
			</ol>
			<div class="carousel-inner">
				@foreach($doctor_carousel as $doctor_carousel)
				@php 
					$dname = $doctor_carousel->name;
					$demail = $doctor_carousel->email;
					$dprofile = $doctor->profile;
					$dqualification = $doctor->qualification;
					$dphone = $doctor->phone;
					$dcost = $doctor->cost;
					$dspeciality = $doctor->speciality->name;
				@endphp
					<div class="carousel-item active">
						<div class="card mb-3 text-decoration-none new_arrival">
							<div class="row no-gutters">
								<div class="col-md-3">
									<img src="{{ $dprofile }}" style="height: 50vh;" class="card-img" alt="...">
								</div>
								<div class="col-md-9">
									<div class="card-body">
										<h5 class="card-title py-2">{{ $dname }}</h5>
										<p class="card-text py-2"> 
											Email : {{ $demail }} <br><br>
											Qualification : {{ $dqualification }} <br><br>
											Speciality : {{ $dspeciality }} <br><br>
										</p>
										<a href="#" class="btn btn-info btn-sm font-weight-light py-2">Appoinment Now</a>
									</div>
								</div>
							</div>
						</div>
						<div class="img-overlay"></div>
					</div>
				@endforeach
			</div>
		</div>
	</div><!-- End Carousel -->
</x-frontend>