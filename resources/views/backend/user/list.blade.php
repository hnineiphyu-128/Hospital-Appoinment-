<x-backend>
	{{-- Content --}}
	<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Registered User Only Lists</h1>
                    </div>
                </div>
            </div>
            {{-- <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <a href="{{route('admin.doctor.create')}}" class="btn btn-outline-info "><i class="fa fa-plus"></i>&nbsp; Add</a>
                    </div>
                </div>
            </div> --}}
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
                    @foreach($users as $user)
                    @php 
                        $id = $user->id;
                        $name = $user->name;
                        $email = $user->email;
                        $status = $user->status;
                        // if ($status >0 ) {
                        //     $user_status = "Blocked User!";
                        // }
                    @endphp
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <i class="fa fa-user"></i><strong class="card-title pl-2">Profile Card</strong>
                            </div>
                            <div class="card-body">
                                <div class="mx-auto d-block">
                                    <img class="rounded-circle mx-auto d-block w-50" src="{{asset('backend/images/admin.jpg')}}" alt="Card image cap">
                                    <h5 class="text-sm-center mt-2 mb-1">{{ $name }}</h5>
                                    <div class="location text-sm-center"><i class="fa fa-envelope"></i> {{ $email }}</div>
                                </div>
                                <hr>
                                <div class="card-text float-right">
                                    @if($status > 0)
                                        <form action="{{route('admin.user.update',$id)}}" method="post" class="d-inline-block" onsubmit="return confirm('Are you sure want to unblock?')">

                                                @csrf
                                                @method('PUT')
                                                
                                                <lablel class="pr-5 text-danger">Blocked User!</lablel>

                                                <button type="submit" class="btn btn-outline-warning btn-sm rounded"><i class="fa fa-edit"></i>&nbsp; Undo
                                                </button>
                                        </form>
                                    @else
                                        <form action="{{route('admin.user.destroy',$id)}}" method="post" class="d-inline-block" onsubmit="return confirm('Are you sure want to block?')">

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-outline-danger btn-sm rounded"><i class="fa fa-trash"></i>&nbsp; Delete
                                                </button>
                                        </form>
                                    @endif
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
                                            <th> Email </th>
                                            <th> Action </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i = 1; @endphp
                                        @foreach($users as $user)
                                        @php 
                                            $id = $user->id;
                                            $name = $user->name;
                                            $email = $user->email;
                                        @endphp
                                            <tr>
                                                <td> {{ $i++ }} </td>
                                                <td> {{ $name }} </td>
                                                <td> {{ $email }} </td>
                                                <td>
                                                    <form action="{{route('admin.user.destroy',$id)}}" method="post" class="d-inline-block" onsubmit="return confirm('Are you sure want to delete?')">

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
                                            <th> Email </th>
                                            <th> Action </th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div> --}}


                </div>
            </div><!-- .animated -->
        </div>

</x-backend>