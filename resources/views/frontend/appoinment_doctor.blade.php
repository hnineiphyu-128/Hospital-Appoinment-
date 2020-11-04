<x-frontend>
	<!-- Appoinment Form -->
	<div class="container-fluid mt-5">
	<form action="{{route('patient_info')}}" method="POST" enctype="multipart/form-data">
			{{-- Token --}}
			@csrf
			<div class="container row mt-5">
				<div class="col-md-10 ml-auto mt-5">
					<h4 class="text-center">Please Fill The Patient Information</h4>
					<hr class="fullDivider">
					<div class="row form-group">
						<div class="col-md-4 col-6 text-center">
							<label for="Patient_Name">Patient Name :</label>
						</div>
						<div class="col-md-7 col-6">
							<input type="text" class="form-control" id="Patient_Name" name="name" placeholder="--Enter a Patient Name--">
						</div>
					</div>
					<div class="row form-group">
						<div class="col-md-4 col-6 text-center">
							<label for="Patient_Address">Patient Address :</label>
						</div>
						<div class="col-md-7 col-6">
							<textarea class="form-control" id="Patient_Address" name="address" placeholder="--Enter a Patient Address--"></textarea>
						</div>
					</div>
					<div class="row form-group">
						<div class="col-md-4 col-6 text-center">
							<label for="Patient_Age">Age of Patient :</label>
						</div>
						<div class="col-md-7 col-6">
							<input type="number" class="form-control" id="Patient_Age" name="age" placeholder="--Enter a Patient Age--">
						</div>
					</div>
					<div class="row form-group">
						<div class="col-md-4 col-6 text-center">
							<label for="Patient_Phone">Patient Phone :</label>
						</div>
						<div class="col-md-7 col-6">
							<input type="text" class="form-control" id="Patient_Phone" name="phone" placeholder="--Enter a Patient Phone--">
						</div>
					</div>
					<div class="row form-group">
						<div class="col-md-4 col-6 text-center">
							<label for="schedule">Choose Schedule :</label>
						</div>
						<div class="col-md-7 col-6">
							<select class="form-control" id="schedule" name="schedule_id">
								<option>--Choose Schedule--</option>
								@foreach($schedules as $schedule)
								@php 
									$schedule_id = $schedule->id;
									$day = $schedule->day;
									$time = $schedule->time;
								@endphp 
									<option value="{{ $schedule_id }}">{{ $day }} - {{ $time }}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="row form-group">
						<div class="col-md-4 col-6 text-center">
							<label for="doctor_name">Choosing Doctor :</label>
						</div>
						<div class="col-md-7 col-6">
							<!-- <select class="form-control" id="doctor" name="doctor_id">
								<option>--Choose A Doctor--</option>
								<option>Dr. Xiao</option>
								<option>Dr. Wang</option>
							</select> -->

							<input type="text" class="form-control" id="doctor_name" name="doctor_name" value="{{ $doctor->user->name }}" readonly="">
							<input type="hidden" class="form-control" id="doctor_id" name="doctor_id" value="{{ $doctor->id }}">
						</div>
					</div>
					<div class="row form-group">
						<div class="col-md-4 col-6 text-center">
							<label for="speciality_name">Choosing Speciality :</label>
						</div>
						<div class="col-md-7 col-6">
							<!-- <select class="form-control" id="doctor" name="doctor_id">
								<option>--Choose A Doctor--</option>
								<option>Dr. Xiao</option>
								<option>Dr. Wang</option>
							</select> -->

							<input type="text" class="form-control" id="speciality_name" name="speciality_name" value="{{ $doctor->speciality->name }}" readonly="">
							<input type="hidden" class="form-control" id="speciality_id" name="speciality_id" value="{{ $doctor->speciality_id }}">
						</div>
					</div>
					<div class="row form-group">
						<div class="col-md-4 col-6 text-center">
							<label for="Patient_Gender">Patient Gender :</label>
						</div>
						<div class="col-md-7 col-6" id="Patient_Gender" class="form-control">
							<input type="checkbox" name="gender" value="Male" id="male">
							<label for="male"> : Male</label>
							<input type="checkbox" name="gender" value="Female" id="female">
							<label for="female"> : Female</label>
						</div>
					</div>
					<div class="row form-group mt-5">
						<div class="col-md-5 ml-auto mr-auto">
							

							 @if(Auth::check())

	                            <input type="submit" class="btn btn-outline-info btn-block" id="btnSave" name="btnSave" value="Make Appoinment">

	                        @else

	                            <a href="{{route('login')}}" class="btn btn-outline-info btn-block">Make Appoinment</a>

	                        @endif
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</x-frontend>