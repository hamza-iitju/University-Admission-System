@extends('layouts.mainTable')

@section('content')

<!--===============================
=            Hero Area            =
================================-->

<section class="hero-area bg-1 text-center overly">
	<!-- Container Start -->
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<!-- Header Contetnt -->
				<div class="content-block">
					<h1>University Admission System</h1>
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. <br>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
				</div>
				<!-- Advance Search -->
				<div class="advance-search">
                    <div class="text-center">
					<a href="{{ route('student.create') }}" class="btn btn-primary" type="submit">Apply Now</a>
					</div>
				</div>
				
			</div>
		</div>
	</div>
	<!-- Container End -->
</section>


<!--==========================================
=            All Course Section            =
===========================================-->

<section class=" section">
	<!-- Container Start -->
	<div class="container">
		<div class="row">
			<div class="col-12">
				<!-- Section title -->
				<div class="section-title">
					<h2>All Students</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis, provident!</p>
				</div>
                <div class="row">
                        <div class="col-lg-3 offset-lg-0 col-md-5 offset-md-1 col-sm-6 col-6">
                            <div class="course-block">
                                <div class="header">
                                    <h4>
                                        <a href="#">Lorem ipsum <br> <p style="display: inline"> Lorem ipsum dolor sit</p></a>     
                                    </h4>
                                </div>
                                <ul class="course-list">
                                        <li>
                                            <p style="display: inline">Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem, ullam? Iste praesentium fugiat quaerat sint nobis. Odio consectetur qui soluta asperiores ducimus sequi cupiditate eligendi, accusamus tempore id quos assumenda?</p>     
                                        </li>
                                </ul>
                            </div>
                        </div> <!-- /Course List -->     

                        <div class="col-lg-3 offset-lg-0 col-md-5 offset-md-1 col-sm-6 col-6">
                            <div class="course-block">
                                <div class="header">
                                    <h4>
                                        <a href="#">Lorem ipsum <br> <p style="display: inline"> Lorem ipsum dolor sit</p></a>     
                                    </h4>
                                </div>
                                <ul class="course-list">
                                        <li>
                                            <p style="display: inline">Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem, ullam? Iste praesentium fugiat quaerat sint nobis. Odio consectetur qui soluta asperiores ducimus sequi cupiditate eligendi, accusamus tempore id quos assumenda?</p>     
                                        </li>
                                </ul>
                            </div>
                        </div> <!-- /Course List -->     

                        <div class="col-lg-3 offset-lg-0 col-md-5 offset-md-1 col-sm-6 col-6">
                            <div class="course-block">
                                <div class="header">
                                    <h4>
                                        <a href="#">Lorem ipsum <br> <p style="display: inline"> Lorem ipsum dolor sit</p></a>     
                                    </h4>
                                </div>
                                <ul class="course-list">
                                        <li>
                                            <p style="display: inline">Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem, ullam? Iste praesentium fugiat quaerat sint nobis. Odio consectetur qui soluta asperiores ducimus sequi cupiditate eligendi, accusamus tempore id quos assumenda?</p>     
                                        </li>
                                </ul>
                            </div>
                        </div> <!-- /Course List -->     

                        <div class="col-lg-3 offset-lg-0 col-md-5 offset-md-1 col-sm-6 col-6">
                            <div class="course-block">
                                <div class="header">
                                    <h4>
                                        <a href="#">Lorem ipsum <br> <p style="display: inline"> Lorem ipsum dolor sit</p></a>     
                                    </h4>
                                </div>
                                <ul class="course-list">
                                        <li>
                                            <p style="display: inline">Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem, ullam? Iste praesentium fugiat quaerat sint nobis. Odio consectetur qui soluta asperiores ducimus sequi cupiditate eligendi, accusamus tempore id quos assumenda?</p>     
                                        </li>
                                </ul>
                            </div>
                        </div> <!-- /Course List -->               
                </div>
			</div>
		</div>
	</div>
	<!-- Container End -->
</section>


@stop