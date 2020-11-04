<x-frontend>
	<!--Banner Section-->
	<section  id="banner">

		<div class="container-fluid">
			<div class="row justify-content-center text-white text-center">
				<div class="col-8" id="headerWhitespace">
					<h1 class="text-uppercase display-6">Welcome To <span id="a">OK</span> Hospital</h1>
					<p class="my-5">10-12 December,Downtown Conference Center,Yangon</p>
					
				</div>
			</div>
		</div>

	</section>
	<!-- Appoinment List In Doctor Page -->
	<div class="container mt-5">
		{{-- <h2>This is Doctor Page!!</h2> --}}
		<div class="row my-5">
			
			@if(session('successMsg') != NULL)

	        <div class="col-sm-12">
	            <div class="sufee-alert alert with-close alert-success alert-dismissible fade show" role="alert">
	                <strong class="badge badge-pill badge-success">Success!</strong> {{ session('successMsg') }}
	                <button type="submit" class="close" data-dismiss="alert" aria-label="Close">
	                    <span aria-hidden="true">&times;</span>
	                </button>
	            </div>
	        </div>

	        @endif
			<div class="col-2">
				<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
					<a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">
						Appoinment 
					</a>
					<a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">
						Profile
					</a>
				</div>
			</div>
			<div class="col-10">
				<div class="tab-content" id="v-pills-tabContent">
					<div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
						<table class="table">
							<thead>
								<tr>
									<th scope="col">#</th>
									<th scope="col">Patient Name</th>
									<th scope="col">Schedule</th>
									<th scope="col">Doctor</th>
								</tr>
							</thead>
							<tbody>
								@php $i =1; @endphp
								@foreach($appoinments as $appoinment)
								@php
									$patient_name = $appoinment->p_name;
									$patient_phone = $appoinment->p_phone;
									$day = $appoinment->day;
									$time = $appoinment->time;
									$doctor_name = $appoinment->doctor_name;
									$doctor_phone = $appoinment->doctor_phone;
								@endphp
									<tr>
										<th scope="row">{{ $i++ }}</th>
										<td>
											Name &nbsp;&nbsp;: {{ $patient_name }}<br>
											Phone &nbsp;: {{ $patient_phone }}
										</td>
										<td>{{ $day }} - {{ $time }}</td>
										<td>
											Name &nbsp;&nbsp;: {{ $doctor_name }}<br>
											Phone &nbsp;: {{ $doctor_phone }}
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
					<div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
						<div class="container my-3">
							<div class="row">
								<div class="col">
									<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pt-5">
										<div class="shadow p-3 mb-5 bg-white rounded">
											<div class="card">
												<div class="row no-gutters">
													<div class="col-md-4">
														<img src="{{ asset('frontend/img/defaultavatar.webp') }}" class="card-img" style="height: 50vh;" alt="...">
													</div>
													<div class="col-md-8  py-5">
														<div class="card-body">
															{{-- <h5 class="card-title">&nbsp;&nbsp;&nbsp;{{ $user->name }} &nbsp;
																<!-- Button trigger modal -->
																<button type="button" title="Edit Profile" class="btn" data-toggle="modal" data-target="#editProfile">
																	<i class="fa fa-edit"></i>
																</button>
															</h5> --}}
															<ul class="list-group list-group-flush">
																<li class="list-group-item">
																	<i class="fas fa-user"></i>&nbsp;&nbsp; {{ $user->name }} 
																	<!-- Button trigger modal -->
																<button type="button" title="Edit Profile" class="btn" data-toggle="modal" data-target="#editProfile">
																	<i class="fa fa-edit"></i>
																</button>
																</li>
																<li class="list-group-item">
																	<i class="fa fa-envelope"></i>&nbsp;&nbsp; {{ $user->email }} 
																</li>
															</ul>
															<p class="card-text text-center mt-4"><small class="text-muted">Last updated {{ $user->updated_at }}</small></p>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="container my-3">
			<div class="row">
				<div class="col">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pt-5">
						<div class="shadow p-3 mb-5 bg-white rounded text-center">
							<img src="{{asset('frontend/img/doctor_carousel3.png')}}" class="img-fluid">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>




	<!-- Modal -->
	<div class="modal fade" id="editProfile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Edit Your Profile</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="{{ route('user_edit') }}" method="post" enctype="multipart/form-data">
					@csrf
					<div class="modal-body">
						<input type="hidden" name="user_id" id="user_id" value="{{$user->id}}">
						<input type="hidden" name="oldPassword" id="oldPassword" value="{{$user->password}}">
						<div class="container">
							<div class="row">
								<div class="col-md-3 py-2">
									<label for="name">Name</label>
								</div>
								<div class="col-md-9 form-group">
									<input type="text" class="form-control" id="name" name="name" value="{{$user->name}}">
								</div>
								<div class="col-md-3 py-2">
									<label for="email">Email</label>
								</div>
								<div class="col-md-9 form-group">
									<input type="email" class="form-control" id="email" name="email" value="{{$user->email}}">
								</div>
								<div class="col-md-12">
									<label for="ch_pwd">Change Password</label>
									&nbsp;&nbsp;<input type="checkbox" class="pt-1" name="ch_pwd" id="ch_pwd">
								</div>
								<div class="col-md-12 form-group" id="pwd">
									<input type="password" class="form-control my-2" name="newPassword" id="newPassword" placeholder="--Password--">
									<input type="password" class="form-control my-2" name="newConfirmPassword" id="newConfirmPassword" placeholder="--Confirm Password--">
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-info">Save changes</button>
					</div>

				</form>
			</div>
		</div>
	</div>
</x-frontend>