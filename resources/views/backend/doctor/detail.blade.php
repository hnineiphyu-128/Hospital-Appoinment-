<x-backend> 
	{{-- Content --}}
	<div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Doctor Information</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <a href="{{route('admin.doctor.index')}}" class="btn btn-outline-info rounded"><i class="fa fa-backward"></i>&nbsp; Back</a>
                </div>
            </div>
        </div>
    </div>
	{{-- <h3 class="text-center mb-4">Doctor Detail</h3> --}}
	<div class="col-xl-6 col-lg-6 py-5">
		<aside class="profile-nav alt">
			<section class="card">
				<div class="card-header user-header alt bg-dark">
					<div class="media">
						<img class="align-self-center rounded mr-3" style="width:200px; height:280px;" alt="" src="{{ $doctor->profile }}">
						<div class="media-body my-5 py-5">
							<h4 class="text-light display-6"> {{ $doctor->user->name }} </h4>
							<p> {{ $doctor->speciality->name }} ( Specialist )</p>
						</div>
					</div>
				</div>


				<ul class="list-group list-group-flush">
					<li class="list-group-item">
						<i class="fa fa-envelope"></i> {{ $doctor->user->email }} 
					</li>
					<li class="list-group-item">
						<i class="fa fa-phone"></i> {{ $doctor->phone }} 
					</li>
					<li class="list-group-item">
						<i class="fa fa-graduation-cap"></i> {{ $doctor->qualification }} 
					</li>
					<li class="list-group-item">
						<i class="fa fa-comments"></i> {{ $doctor->language }} 
					</li>
				</ul>

			</section>
		</aside>
	</div>

	<div class="col-xl-6 col-lg-6 py-1">
		<div class="row">
			<div class="col-xl-12 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-one">
                        	<div class="stat-icon dib"><i class="ti-calendar text-danger border-danger"></i></div>
	                            <div class="stat-content dib">
	                                <div class="stat-digit">Schedule</div>
	                            	@foreach($schedules as $schedule)
	                            	@php
	                            		$day = $schedule->day;
	                            		$time = $schedule->time;
	                            	@endphp
		                                <div class="stat-text h2"> {{ $day }} - {{ $time }} </div>
		                            @endforeach
	                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
			<div class="col-xl-12 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib"><i class="ti-money text-success border-success"></i></div>
                            <div class="stat-content dib">
                                <div class="stat-text">Cost</div>
                                <div class="stat-digit"> {{ $doctor->cost }} </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-12 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib"><i class="ti-clipboard text-primary border-primary"></i></div>
                            <div class="stat-content dib">
                                <div class="stat-text">Today Appoinment</div>
                                <div class="stat-digit"> {{ $today_count }} </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-12 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib"><i class="ti-id-badge text-warning border-warning"></i></div>
                            <div class="stat-content dib">
                                <div class="stat-text">Patient Lists</div>
                                <div class="stat-digit">{{ $patient_count }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-12 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib"><i class="ti-layout-grid4 text-dark border-dark"></i></div>
                            <div class="stat-content dib">
                                <div class="stat-text">Active Projects</div>
                                <div class="stat-digit">770</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
		</div>
	</div>


</x-backend>