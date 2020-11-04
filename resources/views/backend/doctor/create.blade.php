<x-backend>
	{{-- Content --}}
	<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Doctor Create Form</h1>
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
                                        <form action="{{route('admin.doctor.store')}}" method="post" novalidate="novalidate" enctype="multipart/form-data">
                                           @csrf

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
                                                            <option value="{{ $sid }}">{{ $sname }}</option>
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
                                                    <input id="name" name="name" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Enter Doctor Name.....">
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
                                                    <input type="file" id="profile" name="profile" class="form-control-file">
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
                                                    <input id="language" name="language" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Enter Language.....">
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
                                                    <input id="qualification" name="qualification" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Enter Qualification.....">
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
                                                    <input id="phone" name="phone" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Enter Phone No.....">
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
                                                    <input id="email" name="email" type="email" class="form-control" aria-required="true" aria-invalid="false" placeholder="Enter Doctor's Email.....">
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
                                                    <input id="password" name="password" type="password" class="form-control" aria-required="true" aria-invalid="false" placeholder="Enter Doctor's Password.....">
                                                </div>
                                                <div class="text-danger form-control-feedback">
                                                      {{$errors->first('password')}}
                                                </div>
                                            </div>

                                            {{-- <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="address" class="control-label mb-1">
                                                        Address
                                                    </label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input id="address" name="address" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Enter Address.....">
                                                </div>
                                                <div class="text-danger form-control-feedback">
                                                      {{$errors->first('address')}}
                                                </div>
                                            </div> --}}

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="cost" class="control-label mb-1">
                                                        Cost
                                                    </label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input id="cost" name="cost" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Enter Cost.....">
                                                </div>
                                                <div class="text-danger form-control-feedback">
                                                      {{$errors->first('cost')}}
                                                </div>
                                            </div>

                                            <div>
                                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                                    <i class="fa fa-save"></i>&nbsp;
                                                    Save
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