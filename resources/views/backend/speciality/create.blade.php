<x-backend>
	{{-- Content --}}
	<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Speciality Create Form</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <a href="{{route('admin.speciality.index')}}" class="btn btn-outline-info rounded"><i class="fa fa-backward"></i>&nbsp; Back</a>
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
                                            <h3 class="text-center">Speciality</h3>
                                        </div>
                                        <hr>
                                        <form action="{{route('admin.speciality.store')}}" method="post" novalidate="novalidate" enctype="">
                                           @csrf
                                            <div class="form-group">
                                                <label for="name" class="control-label mb-1">
                                                    Speciality Name
                                                </label>
                                                <input id="name" name="name" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Enter Speciality Name.....">
                                                <div class="text-danger form-control-feedback">
                                                      {{$errors->first('name')}}
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