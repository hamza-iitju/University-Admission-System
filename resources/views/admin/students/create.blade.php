@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.students.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.students.store'], 'files' => true,]) !!}

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

    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

