<x-backend>
	{{-- Content --}}
	<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Schedule Create Form</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <a href="{{route('admin.schedule.index')}}" class="btn btn-outline-info rounded"><i class="fa fa-backward"></i>&nbsp; Back</a>
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
                                            <h3 class="text-center">Schedule</h3>
                                        </div>
                                        <hr>
                                        <form action="{{route('admin.schedule.store')}}" method="post" novalidate="novalidate" enctype="multipart/form-data">
                                           @csrf

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="speciality_id" class="control-label mb-1">
                                                        Doctor
                                                    </label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="doctor_id" id="doctor_id" class="form-control">
                                                        <option>Choose Doctor</option>
                                                        @foreach($doctors as $doctor)
                                                        @php 
                                                            $did = $doctor->id;
                                                            $dname = $doctor->user->name;
                                                        @endphp
                                                            <option value="{{ $did }}">{{ $dname }}</option>
                                                        @endforeach
                                                        
                                                    </select>
                                                </div>
                                                <div class="text-danger form-control-feedback">
                                                      {{$errors->first('doctor_id')}}
                                                </div>
                                            </div>
                                            
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="day" class="control-label mb-1">
                                                        Day
                                                    </label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input id="day" name="day" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Enter Day.....">
                                                </div>
                                                <div class="text-danger form-control-feedback">
                                                      {{$errors->first('day')}}
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="time" class="control-label mb-1">
                                                        Time Schedule
                                                    </label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input id="time" name="time" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Enter Time Schedule.....">
                                                </div>
                                                <div class="text-danger form-control-feedback">
                                                      {{$errors->first('time')}}
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