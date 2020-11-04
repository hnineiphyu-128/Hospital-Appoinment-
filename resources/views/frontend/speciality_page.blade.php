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
				$doctor_id = $doctor->id;
				$doctor_name = $doctor->user->name;
				$doctor_profile = $doctor->profile;
			@endphp
			<div class="col-md-3 pt-5">
				<div class="card">
					<div class=" card_img">	
						<img src="{{ $doctor_profile }}" class="card-img-top border images" alt="...">
						<a href="#" class="detail">
							<span class="fa-stack fa-lg">
								<i class="fa fa-circle fa-stack-2x"></i>
								<i class="fas fa-eye fa-stack-1x fa-inverse"></i>
							</span>
						</a>
					</div>
					<div class="card-body text-center">
						<p class="my-2">{{ $doctor_name }}</p>
						<hr class="item-divider">
						<p class="my-2"></p>
						<a href="{{route('appoinment_doctor',$doctor_id)}}" class="btn btn-outline-info btn-block">Making Appoinment</a>
						{{-- @foreach($schedules as $schedule)
						@if ($schedule->doctor_id == $doctor_id)
							<a href="{{route('appoinment_doctor',$doctor_id)}}" class="btn btn-outline-info btn-block">Making Appoinment</a>
							@php break; @endphp
						@else
							<p class="my-2">Can't Appoinment</p>
							@php break; @endphp
						@endif
						@endforeach --}}
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div><!-- End Doctor List -->

</x-frontend>