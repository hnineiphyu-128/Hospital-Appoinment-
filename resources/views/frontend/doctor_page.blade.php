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
		<div class="row offset-1 my-5">
			<div class="col-3">
				<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
					<a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">
						Home
					</a>
					<a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">
						Profile
					</a>
					<a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">
						Messages
					</a>
					<a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">
						Settings
					</a>
				</div>
			</div>
			<div class="col-9">
				<div class="tab-content" id="v-pills-tabContent">
					<div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
						Home
					</div>
					<div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
						Profile
					</div>
					<div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
						Message
					</div>
					<div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
						Setting
					</div>
				</div>
			</div>
		</div>
		{{-- <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
			<li class="nav-item" role="presentation">
				<a class="nav-link active" id="pills-appoinments-tab" data-toggle="pill" href="#pills-appoinments" role="tab" aria-controls="pills-appoinments" aria-selected="true">
					Today Appoinment
				</a>
			</li>
			<li class="nav-item" role="presentation">
				<a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">
					Profile
				</a>
			</li>
		</ul>
		<div class="tab-content" id="pills-tabContent">
			<div class="tab-pane fade show active" id="pills-appoinments" role="tabpanel" aria-labelledby="pills-appoinments-tab">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<table class="table">
								<thead>
									<tr>
										<th scope="col">#</th>
										<th scope="col">Patient Info</th>
										<th scope="col">Schedule</th>
										<th scope="col">Appoinment Date</th>
									</tr>
								</thead>
								<tbody>
									@php $i = 1; @endphp
									@foreach($appoinments as $appoinment)
									
										@php 
											$p_name = $appoinment->p_name;
											$p_age = $appoinment->p_age;
											$p_phone = $appoinment->p_phone;
											$day = $appoinment->day;
											$time = $appoinment->time;
											$appoinment_Date = $appoinment->appoinment_Date;
										@endphp
										<tr>
											<th scope="row">{{ $i++ }}</th>
											<td>
												Name &nbsp;: {{ $p_name }} <br>
												Age &nbsp;&nbsp;&nbsp;&nbsp;: {{ $p_age }} <br>
												Phone : {{ $p_phone }} <br>
											</td>
											<td>{{ $day }} - {{ $time }}</td>
											<td>{{ $appoinment_Date }}</td>
										</tr>
									@endforeach
								</tbody>
							</table>
						</div>
							
					</div>
				</div>
			</div>
			<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
				<div class="container my-3">
					<div class="row">
						<div class="col">
							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pt-5">
								<div class="shadow p-3 mb-5 bg-white rounded">
									<div class="card">
										<div class="row no-gutters">
											<div class="col-md-4">
												<img src="{{ $doctor->profile }}" class="card-img" style="height: 60vh;" alt="...">
											</div>
											<div class="col-md-8  py-2">
												<div class="card-body">
													<h5 class="card-title">&nbsp;&nbsp;&nbsp;{{ $doctor->user->name }} &nbsp;
														<!-- Button trigger modal -->
														<button type="button" title="Edit Profile" class="btn" data-toggle="modal" data-target="#editProfile">
															<i class="fa fa-edit"></i>
														</button>
													</h5>
													<ul class="list-group list-group-flush">
														<li class="list-group-item">
															<i class="fas fa-stethoscope"></i>&nbsp;&nbsp; {{ $doctor->speciality->name }} ( Specialily ) 
														</li>
														<li class="list-group-item">
															<i class="fa fa-envelope"></i>&nbsp;&nbsp; {{ $doctor->user->email }} 
														</li>
														<li class="list-group-item">
															<i class="fa fa-phone"></i>&nbsp;&nbsp; {{ $doctor->phone }} 
														</li>
														<li class="list-group-item">
															<i class="fa fa-graduation-cap"></i>&nbsp;&nbsp; {{ $doctor->qualification }} 
														</li>
														<li class="list-group-item">
															<i class="fa fa-comments"></i>&nbsp;&nbsp; {{ $doctor->language }} 
														</li>
													</ul>
													<p class="card-text text-center mt-4"><small class="text-muted">Last updated {{ $doctor->updated_at }}</small></p>
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
		</div> --}}

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
				<form action="{{route('doctor_edit')}}" method="post" enctype="multipart/form-data">
					@csrf
					<div class="modal-body">
						<input type="hidden" name="doctor_id" id="doctor_id" value="{{$doctor->id}}">
						<input type="hidden" name="oldProfile" id="oldProfile" value="{{$doctor->profile}}">
						<input type="hidden" name="oldPassword" id="oldPassword" value="{{$doctor->user->password}}">
						<input type="hidden" name="cost" id="cost" value="{{$doctor->cost}}">
						<div class="container">
							<div class="row">
								<div class="col-md-12 form-group">
									<ul class="nav nav-tabs" id="myTab" role="tablist">
										<li class="nav-item" role="presentation">
											<a class="nav-link active" id="old-tab" data-toggle="tab" href="#old" role="tab" aria-controls="old" aria-selected="true">Old Profile</a>
										</li>
										<li class="nav-item" role="presentation">
											<a class="nav-link" id="new-tab" data-toggle="tab" href="#new" role="tab" aria-controls="new" aria-selected="false">New Profile</a>
										</li>
									</ul>
									<div class="tab-content" id="myTabContent">
										<div class="tab-pane fade show active" id="old" role="tabpanel" aria-labelledby="old-tab">
											<img src="{{$doctor->profile}}" width="60px;" height="85px;" alt="">
										</div>
										<div class="tab-pane fade" id="new" role="tabpanel" aria-labelledby="new-tab">
											<input type="file" class="form-control-file" name="newProfile" id="newProfile">
										</div>
									</div>
								</div>
								<div class="col-md-3 py-2">
									<label for="speciality_id">Speciality</label>
								</div>
								<div class="col-md-9 form-group">
									<select name="speciality_id" id="speciality_id" class="form-control">
                                        <option>Choose Speciality</option>
                                        @foreach($specialities as $speciality)
                                        @php 
                                            $sid = $speciality->id;
                                            $sname = $speciality->name;
                                        @endphp
                                            <option value="{{ $sid }}"
                                                @if($sid == $doctor->speciality_id)
                                                    selected="" 
                                                @endif
                                            >{{ $sname }}</option>
                                        @endforeach
                                        
                                    </select>
								</div>
								<div class="col-md-3 py-2">
									<label for="name">Name</label>
								</div>
								<div class="col-md-9 form-group">
									<input type="text" class="form-control" id="name" name="name" value="{{$doctor->user->name}}">
								</div>
								<div class="col-md-3 py-2">
									<label for="email">Email</label>
								</div>
								<div class="col-md-9 form-group">
									<input type="email" class="form-control" id="email" name="email" value="{{$doctor->user->email}}">
								</div>
								<div class="col-md-12">
									<label for="ch_pwd">Change Password</label>
									&nbsp;&nbsp;<input type="checkbox" class="pt-1" name="ch_pwd" id="ch_pwd">
								</div>
								<div class="col-md-12 form-group" id="pwd">
									<input type="password" class="form-control my-2" name="newPassword" id="newPassword" placeholder="--Password--">
									<input type="password" class="form-control my-2" name="newConfirmPassword" id="newConfirmPassword" placeholder="--Confirm Password--">
								</div>
								<div class="col-md-3 py-2">
									<label for="phone">Phone No</label>
								</div>
								<div class="col-md-9 form-group">
									<input type="text" class="form-control" id="phone" name="phone" value="{{$doctor->phone}}">
								</div>
								<div class="col-md-3 py-2">
									<label for="qualification">Qualification</label>
								</div>
								<div class="col-md-9 form-group">
									<input type="text" class="form-control" id="qualification" name="qualification" value="{{$doctor->qualification}}">
								</div>
								<div class="col-md-3 py-2">
									<label for="language">Language</label>
								</div>
								<div class="col-md-9 form-group">
									<input type="text" class="form-control" id="language" name="language" value="{{$doctor->language}}">
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