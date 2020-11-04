<x-backend>
	{{-- Content --}}
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Patient Lists</h1>
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
										<th scope="col">No.</th>
										<th scope="col">Patient Name</th>
										<th scope="col">Patient Age</th>
										<th scope="col">Patient Phone</th>
										<th scope="col">Appoinment Date</th>
									</tr>
								</thead>
								<tbody>
									@php $i = 1; @endphp
									@foreach($patients as $patient)
									
										@php 
											$name = $patient->name;
											$age = $patient->age;
											$phone = $patient->phone;
											$created_at = $patient->created_at;
										@endphp
										<tr>
											<th scope="row">{{ $i++ }}</th>
											<td>{{ $name }}</td>
											<td>{{ $age }}</td>
											<td>{{ $phone }}</td>
											<td>{{ $created_at }}</td>
										</tr>
									@endforeach
								</tbody>
                                <tfoot>
                                    <tr>
                                        <th scope="col">No.</th>
										<th scope="col">Patient Name</th>
										<th scope="col">Patient Age</th>
										<th scope="col">Patient Phone</th>
										<th scope="col">Appoinment Date</th>
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