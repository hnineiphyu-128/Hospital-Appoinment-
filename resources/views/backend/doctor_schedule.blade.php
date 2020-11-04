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
										<th scope="col">Day</th>
										<th scope="col">Time</th>
									</tr>
								</thead>
								<tbody>
									@php $i = 1; @endphp
									@foreach($schedules as $schedule)
									
									@php 
									$day = $schedule->day;
									$time = $schedule->time;
									@endphp
									<tr>
										<th scope="row">{{ $i++ }}</th>
										<td>{{ $day }}</td>
										<td>{{ $time }}</td>
									</tr>
									@endforeach
								</tbody>
                                <tfoot>
                                    <tr>
										<th scope="col">No.</th>
										<th scope="col">Day</th>
										<th scope="col">Time</th>
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