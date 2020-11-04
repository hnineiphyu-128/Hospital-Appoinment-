<x-backend>
	{{-- Content --}}
	<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Speciality Lists</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <a href="{{route('admin.speciality.create')}}" class="btn btn-outline-info rounded"><i class="fa fa-plus"></i>&nbsp; Add</a>
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

                    <div class="col-md-12">
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
                                        @foreach($specialities as $speciality)
                                        @php 
                                            $id = $speciality->id;
                                            $name = $speciality->name;
                                        @endphp
                                            <tr>
                                                <td> {{ $i++ }} </td>
                                                <td> {{ $name }} </td>
                                                <td>
                                                	{{-- <a href="#" class="btn btn-outline-primary btn-sm"><i class="fa fa-info"></i>&nbsp; Detail</a> --}}
                                                	<a href="{{route('admin.speciality.edit',$id )}}" class="btn btn-outline-warning btn-sm rounded"><i class="fa fa-edit"></i>&nbsp; Edit</a>
                                                    <form action="{{route('admin.speciality.destroy',$id)}}" method="post" class="d-inline-block" onsubmit="return confirm('Are you sure want to delete?')">

                                                            @csrf
                                                            @method('DELETE')

                                                            <button type="submit" class="btn btn-outline-danger btn-sm rounded"><i class="fa fa-trash"></i>&nbsp; Delete
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
                    </div>


                </div>
            </div><!-- .animated -->
        </div>

</x-backend>