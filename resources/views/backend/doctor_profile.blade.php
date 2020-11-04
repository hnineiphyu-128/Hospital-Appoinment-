<x-backend>
	{{-- Content --}}
    {{-- <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Patient Lists</h1>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="content mt-3">
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

        <div class="animated fadeIn">
            <div class="row">
            	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pt-5">
					<div class="shadow p-3 mb-5 bg-white rounded">
						<div class="card">
							<div class="row no-gutters">
								<div class="col-md-4">
									<img src="{{ asset($doctor->profile) }}" class="card-img" style="height: 60vh;" alt="...">
								</div>
								<div class="col-md-8  py-2">
									<div class="card-body">
										<h5 class="card-title">&nbsp;&nbsp;&nbsp;{{ $doctor->user->name }} &nbsp;
											<!-- Button trigger modal -->
											<button type="button" title="Edit Profile" class="btn btn-outline-warning rounded" data-toggle="modal" data-target="#editProfile">
												<i class="fa fa-edit"></i>
											</button>
										</h5>
										<ul class="list-group list-group-flush">
											<li class="list-group-item">
												<i class="fa fa-stethoscope"></i>&nbsp;&nbsp; {{ $doctor->speciality->name }} ( Specialily ) 
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
        </div><!-- .animated -->
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
				<form action="{{route('doctor.doctor_edit')}}" method="post" enctype="multipart/form-data">
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
											<img src="{{asset($doctor->profile)}}" width="60px;" height="85px;" alt="">
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
</x-backend>