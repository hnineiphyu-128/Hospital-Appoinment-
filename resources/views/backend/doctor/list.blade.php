<x-backend>
	{{-- Content --}}
	<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Doctor Lists</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <a href="{{route('admin.doctor.create')}}" class="btn btn-outline-info rounded"><i class="fa fa-plus"></i>&nbsp; Add</a>
                    </div>
                </div>
            </div>
    </div>

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
                @php $i = 1; @endphp
                @foreach($doctors as $doctor)
                @php 
                    $id = $doctor->id;
                    $name = $doctor->user->name;
                    $profile = $doctor->profile;
                @endphp
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-user-md"></i><strong class="card-title pl-2">Doctor's Profile</strong>
                        </div>
                        <div class="card-body">
                            <div class="mx-auto d-block">
                                <img class="rounded-left rounded-right mx-auto d-block" width="100%" height="300px" src="{{ $profile }}" alt="Card image cap">
                                <h5 class="text-sm-center mt-2 mb-1">{{ $name }}</h5>
                               {{--  <div class="location text-sm-center"><i class="fa fa-envelope"></i> {{ $email }}</div> --}}
                            </div>
                            <hr>
                            <div class="card-text text-center">
                                <a href="{{route('admin.doctor.show',$id )}}" class="btn btn-outline-primary btn-sm rounded"><i class="fa fa-info"></i>&nbsp; Detail</a>
                                <a href="{{route('admin.doctor.edit',$id )}}" class="btn btn-outline-warning btn-sm rounded"><i class="fa fa-edit"></i>&nbsp; Edit</a>
                                <form action="{{route('admin.doctor.destroy',$id)}}" method="post" class="d-inline-block" onsubmit="return confirm('Are you sure want to delete?')">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-outline-danger btn-sm rounded"><i class="fa fa-trash"></i>&nbsp; Delete
                                        </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                {{-- <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Data Table</strong>
                        </div>
                        <div class="card-body">
                            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th> No. </th>
                                        <th> Name </th>
                                        <th> Action </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = 1; @endphp
                                    @foreach($doctors as $doctor)
                                    @php 
                                        $id = $doctor->id;
                                        $name = $doctor->user->name;
                                    @endphp
                                        <tr>
                                            <td> {{ $i++ }} </td>
                                            <td> {{ $name }} </td>
                                            <td>
                                            	<a href="#" class="btn btn-outline-primary btn-sm"><i class="fa fa-info"></i>&nbsp; Detail</a>
                                            	<a href="{{route('admin.doctor.edit',$id )}}" class="btn btn-outline-warning btn-sm"><i class="fa fa-edit"></i>&nbsp; Edit</a>
                                                <form action="{{route('admin.doctor.destroy',$id)}}" method="post" class="d-inline-block" onsubmit="return confirm('Are you sure want to delete?')">

                                                        @csrf
                                                        @method('DELETE')

                                                        <button type="submit" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i>&nbsp; Delete
                                                        </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th> No. </th>
                                        <th> Name </th>
                                        <th> Action </th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div> --}}


            </div>
        </div><!-- .animated -->

       {{--  <div class="container">
            <div class="row">
                <div class="col-lg-6 borders">
                    <div class="card">
                        <div class="card-header">
                            <h4>Default Tab</h4>
                        </div>
                        <div class="card-body">
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Home</a>
                                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Profile</a>
                                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Contact</a>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">...</div>
                                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">...</div>
                                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">...</div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div> --}}
        
    </div>

</x-backend>

