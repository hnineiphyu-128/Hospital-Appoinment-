<x-backend>
	{{-- Content --}}
	<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Doctor Edit Form</h1>
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

        <div class="content mt-3">

            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center">Doctor</h3>
                                        </div>
                                        <hr>
                                        @php 
                                            $id = $doctor->id;
                                            $speciality_id = $doctor->speciality_id;
                                            $user_id = $doctor->user_id;
                                            $name = $doctor->user->name;
                                            $profile = $doctor->profile;
                                            $language = $doctor->language;
                                            $qualification = $doctor->qualification;
                                            $phone = $doctor->phone;
                                            $email = $doctor->user->email;
                                            $password = $doctor->user->password;
                                            $cost = $doctor->cost;
                                        @endphp
                                        <form action="{{route('admin.doctor.update',$id)}}" method="post" novalidate="novalidate" enctype="multipart/form-data">
                                           @csrf
                                           @method('PUT')

                                           <input type="hidden" id="id" name="id" value="{{ $id }}">
                                           <input type="hidden" id="id" name="user_id" value="{{ $user_id }}">
                                           <input type="hidden" id="oldProfile" name="oldProfile" value="{{ $profile }}">
                                           <input type="hidden" id="doctor_email" name="email" value="{{ $email }}">
                                           <input type="hidden" id="doctor_email" name="password" value="{{ $password }}">

                                           

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="speciality_id" class="control-label mb-1">
                                                        Speciality
                                                    </label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="speciality_id" id="speciality_id" class="form-control">
                                                        <option>Choose Speciality</option>
                                                        @foreach($specialities as $speciality)
                                                        @php 
                                                            $sid = $speciality->id;
                                                            $sname = $speciality->name;
                                                        @endphp
                                                            <option value="{{ $sid }}"
                                                                @if($sid == $speciality_id)
                                                                    selected="" 
                                                                @endif
                                                            >{{ $sname }}</option>
                                                        @endforeach
                                                        
                                                    </select>
                                                </div>
                                                <div class="text-danger form-control-feedback">
                                                      {{$errors->first('speciality_id')}}
                                                </div>
                                            </div>
                                            
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="name" class="control-label mb-1">
                                                        Doctor Name
                                                    </label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input id="name" name="name" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Enter Doctor Name....." value="{{ $name }}">
                                                </div>
                                                <div class="text-danger form-control-feedback">
                                                      {{$errors->first('name')}}
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="profile" class=" form-control-label">
                                                        Profile
                                                    </label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <div class="default-tab">
                                                        <nav>
                                                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">
                                                                    Old Profile
                                                                </a>
                                                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">
                                                                    New Profile
                                                                </a>
                                                            </div>
                                                        </nav>
                                                        <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                                                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                                                <img src="{{asset($profile)}}" width="120" height="120">
                                                            </div>
                                                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                                                <input type="file" id="profile" name="profile" class="form-control-file">
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="text-danger form-control-feedback">
                                                      {{$errors->first('profile')}}
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="language" class="control-label mb-1">
                                                        Language
                                                    </label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input id="language" name="language" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Enter Language....." value="{{ $language }}">
                                                </div>
                                                <div class="text-danger form-control-feedback">
                                                      {{$errors->first('language')}}
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="qualification" class="control-label mb-1">
                                                        Qualification
                                                    </label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input id="qualification" name="qualification" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Enter Qualification....." value="{{ $qualification }}">
                                                </div>
                                                <div class="text-danger form-control-feedback">
                                                      {{$errors->first('qualification')}}
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="phone" class="control-label mb-1">
                                                        Phone No.
                                                    </label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input id="phone" name="phone" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Enter Phone No....." value="{{ $phone }}">
                                                </div>
                                                <div class="text-danger form-control-feedback">
                                                      {{$errors->first('phone')}}
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="email" class="control-label mb-1">
                                                        Doctor's Email
                                                    </label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input id="email" type="email" disabled="" class="form-control" aria-required="true" aria-invalid="false" placeholder="Enter Doctor's Email....." value="{{ $email }}">
                                                </div>
                                                <div class="text-danger form-control-feedback">
                                                      {{$errors->first('email')}}
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="password" class="control-label mb-1">
                                                        Doctor's Password
                                                    </label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input id="password" type="password" disabled="" class="form-control" aria-required="true" aria-invalid="false" placeholder="Enter Doctor's Password....." value="{{ $password }}">
                                                </div>
                                                <div class="text-danger form-control-feedback">
                                                      {{$errors->first('password')}}
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="cost" class="control-label mb-1">
                                                        Cost
                                                    </label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input id="cost" name="cost" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Enter Cost....." value="{{ $cost }}">
                                                </div>
                                                <div class="text-danger form-control-feedback">
                                                      {{$errors->first('cost')}}
                                                </div>
                                            </div>

                                            <div>
                                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                                    <i class="fa fa-save"></i>&nbsp;
                                                    Update
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div>

</x-backend>