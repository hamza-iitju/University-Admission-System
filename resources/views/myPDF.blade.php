<!DOCTYPE html>
<html>

<head>
    <title>Admit Card of {{$student->name}}</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	
	<style>
		table, tr {padding: 5px;}
	</style>
</head>

<body>
    <div class="container">
        <div class="panel panel-default" style="background-color: #DCDCDC; padding: 10px">
            <div class="row">
                <div class="text-center">
                    <img src="{{ public_path().'/thumb/ju-logo.png'}}" height="80" width="80">
                </div>
                <div class="text-center">
                    <h3>Jahangirnagar University</h3>
                    <p>Savar, Dhaka-1342</p>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-body" style="background-color: #DCDCDC; padding: 5px 5px 0 5px;">
                <div class="row">
						<p style="float: left; width: 20%; text-align: center;">Applicants Copy</p>
						<p style="float: left; width: 58%; text-align: center;">Admit card</p>
						<p style="float: left; width: 20%; text-align: right;">Invoice PS5QWD</p>
					</p>
				</div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-8" style="float: left">
                        <table class="info">
                            <tr>
                                <th>Name: </th>
								<td>{{ $student->name }}</td>
                            </tr>
                            <tr>
                                <th>Address: </th>
                                <td>{{ $student->address }}</td>
                            </tr>
                            <tr>
                                <th>Contact: </th>
                                <td>{{ $student->contact }}</td>
                            </tr>
                            <tr>
                                <th>Email: </th>
                                <td>{{ $student->email }}</td>
                            </tr>
                            <tr>
                                <th>Courses Applying to: </th>
                                <td field-key='courses'>
									@foreach ($student->courses as $singleCourses)
								<span>{{ $singleCourses->name. ", " }}</span>
									@endforeach
								</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-4" style="float: right;">
						@if($student->image)<img src="{{ public_path(). '/thumb/' . $student->image }}" height="100" width="100" style="vertical-align: middle"/>@endif</td>
                    </div>
	            </div>
			</div>
        </div>
			<div class="panel panel-default" style="background-color: #DCDCDC;">
				<div class="panel-body">
					<h4>General Instructions</h4>
					<ol>
						<li>The Admission Examination is held once a year. No supplementary examination will be arranged.</li>
						<li>Candidates must attend the Admission Examination subject according to the examination date, time and venue on their Admission Examination Permit.</li>
						<li>It is forbidden to scribble any information on the Admission Examination Permit.</li>
						<li>Candidates should check carefully the information printed on their Admission Examination Permit.</li>
						<li>Any mistakes detected should be reported in writing or by email to the Registry at least 3 working days before the examination.</li>
					</ol>
				</div>
				</div>
        </div>
    </body>
</html>