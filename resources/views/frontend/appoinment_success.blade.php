<x-frontend>
	<!--Banner Section-->
	<section  id="banner">

		<div class="container-fluid">
			<div class="row justify-content-center text-white text-center">
				<div class="col-8" id="headerWhitespace">
					<h1 class="text-uppercase display-6">Welcome To <span id="a">OK</span> Hospital</h1>
					<p class="my-5">10-12 December,Downtown Conference Center,Yangon</p>
					
				</div>
			</div>
		</div>

	</section><!-- End Banner Section -->
	<!-- Breadcrumb Section Begin -->
    {{-- <section class="breadcrumb-section set-bg subtitle mt-5 pt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Your Appoinment Success! </h2>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- Breadcrumb Section End -->

	<div class="container mt-5">
		<div class="row">
			<div class="col">
				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pt-5">
					<div class="float-right mt-2 mr-2">
	                    <a href="{{route('index')}}" class="btn btn-outline-info "><i class="fa fa-backward"></i>&nbsp; Back</a>
	                </div>
					<div class="shadow p-3 mb-5 bg-white rounded text-center">
						<br>
						<h1>Your Appoinment is complete</h1>
						<p>We will be contact you.</p>
						<br><br>
					</div>
				</div>
			</div>
		</div>
	</div>
</x-frontend>