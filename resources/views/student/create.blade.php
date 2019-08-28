<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.head')
</head>


<body class="hold-transition skin-blue sidebar-mini">

<div id="wrapper">

<header class="main-header">
    <!-- Logo -->
    <a href="{{ url('/') }}" class="logo"
       style="font-size: 16px;">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini">
           @lang('University Admission System')</span>
        <!-- logo for reglar state and mobile devices -->
        <span class="logo-lg">
           @lang('University Admission System')</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>
    </nav>
</header>


<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="sidebar-menu">

            <li class="active">
                <a href="{{ url('/') }}">
                    <i class="fa fa-wrench"></i>
                    <span class="title">@lang('Back to Home')</span>
                </a>
            </li>

        </ul>
    </section>
</aside>

<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            @if(isset($siteTitle))
                <h3 class="page-title">
                    {{ $siteTitle }}
                </h3>
            @endif

            <div class="row">
                <div class="col-md-12">

                    @if (Session::has('message'))
                        <div class="alert alert-info">
                            <p>{{ Session::get('message') }}</p>
                        </div>
                    @endif
                    @if ($errors->count() > 0)
                        <div class="alert alert-danger">
                            <ul class="list-unstyled">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

    <h3 class="page-title">@lang('Student Info')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['student.store'], 'files' => true,]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('name', trans('quickadmin.students.fields.name').'', ['class' => 'control-label']) !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '', 'required']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('name'))
                        <p class="help-block">
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('email', trans('Email').'', ['class' => 'control-label']) !!}
                    {!! Form::text('email', old('email'), ['class' => 'form-control', 'placeholder' => '', 'required']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('email'))
                        <p class="help-block">
                            {{ $errors->first('email') }}
                        </p>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('contact', trans('Contact').'', ['class' => 'control-label']) !!}
                    {!! Form::text('contact', old('contact'), ['class' => 'form-control', 'placeholder' => '', 'required']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('contact'))
                        <p class="help-block">
                            {{ $errors->first('contact') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    @lang('Academic Info')
                </div>
                
                <div class="panel-body">

            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('ssc_gpa', trans('SSC GPA').'', ['class' => 'control-label']) !!}
                    {!! Form::text('ssc_gpa', old('ssc_gpa'), ['class' => 'form-control', 'placeholder' => '', 'required']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('ssc_gpa'))
                        <p class="help-block">
                            {{ $errors->first('ssc_gpa') }}
                        </p>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('hsc_diploma_gpa', trans('HDC or Diploma GPA').'', ['class' => 'control-label']) !!}
                    {!! Form::text('hsc_diploma_gpa', old('hsc_diploma_gpa'), ['class' => 'form-control', 'placeholder' => '', 'required']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('hsc_diploma_gpa'))
                        <p class="help-block">
                            {{ $errors->first('hsc_diploma_gpa') }}
                        </p>
                    @endif
                </div>
            </div>

            </div>
            </div>
            
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('courses', trans('quickadmin.students.fields.courses').'', ['class' => 'control-label']) !!}
                    {!! Form::select('courses[]', $courses, old('courses'), ['class' => 'form-control select2', 'multiple' => 'multiple', 'required']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('courses'))
                        <p class="help-block">
                            {{ $errors->first('courses') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('address', trans('quickadmin.students.fields.address').'', ['class' => 'control-label']) !!}
                    {!! Form::text('address', old('address'), ['class' => 'form-control', 'placeholder' => '', 'required']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('address'))
                        <p class="help-block">
                            {{ $errors->first('address') }}
                        </p>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('image', trans('Image').'', ['class' => 'control-label']) !!}
                    {!! Form::hidden('image', old('image')) !!}
                    {!! Form::file('image', ['class' => 'form-control', 'style' => 'margin-top: 4px;', 'required']) !!}
                    {!! Form::hidden('image_max_size', 5) !!}
                    {!! Form::hidden('image_max_width', 4096) !!}
                    {!! Form::hidden('image_max_height', 4096) !!}
                    <p class="help-block"></p>
                    @if($errors->has('image'))
                        <p class="help-block">
                            {{ $errors->first('image') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ url('/') }}">
        <p class="btn btn-danger">@lang('Cancel')</p>
    </a>
    {!! Form::close() !!}


                </div>
            </div>
        </section>
    </div>
</div>

{!! Form::open(['route' => 'auth.logout', 'style' => 'display:none;', 'id' => 'logout']) !!}
<button type="submit">Logout</button>
{!! Form::close() !!}

@include('partials.javascripts')
</body>
</html>
