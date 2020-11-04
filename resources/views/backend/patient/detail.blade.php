<x-backend> 
	{{-- Content --}}
	<div class="breadcrumbs">
        {{-- <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Doctor Information</h1>
                </div>
            </div>
        </div> --}}
        <div class="col-sm-12 pt-2">
            <div class="page-header float-right">
                <div class="page-title">
                    <a href="{{route('admin.patient.index')}}" class="btn btn-outline-info rounded"><i class="fa fa-backward"></i>&nbsp; Back</a>
                </div>
            </div>
        </div>
    </div>
	{{-- <h3 class="text-center mb-4">Doctor Detail</h3> --}}
	<div class="col-xl-6 col-lg-6 offset-3 py-5">
		<aside class="profile-nav alt">
			<section class="card">
				<div class="card-header user-header alt bg-dark">
					<div class="media">
						<div class="media-body">
							<h4 class="text-light display-6 text-center py-3">
                                <i class="fa fa-user"></i>&nbsp; Patient Information 
                            </h4>
							<p> 
                                <ul class="list-unstyled my-5 mx-4">
                                    <li class="text-light">Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $patient->name }}</li>
                                    <li class="text-light">Age&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $patient->age }}</li>
                                    <li class="text-light">Phone&nbsp;&nbsp;&nbsp;&nbsp;: {{ $patient->phone }}</li>
                                    <li class="text-light">Address&nbsp;: {{ $patient->address }}</li>
                                    <li class="text-light">Doctor&nbsp;&nbsp;&nbsp;: {{ $patient->doctor->user->name }}</li>
                                    <hr size="2" style="background-color: #fff;">
                                    <h6 class="text-light display-6 text-center py-3">
                                        <i class="fa fa-user"></i>&nbsp; Patient's Family
                                    </h6>
                                    <li class="text-light">Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $patient->user->name }}</li>
                                    <li class="text-light">Email&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $patient->user->email }}</li>
                                    @if($patient->user->status > 0)  
                                        <li class="text-danger">This User is blocked user!!!!</li>
                                    @endif                                 
                                </ul>
                            </p>
						</div>
					</div>
				</div>

			</section>
		</aside>
	</div>

{{-- 	<div class="col-xl-6 col-lg-6 py-1">
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
	</div> --}}


</x-backend>