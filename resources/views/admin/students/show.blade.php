@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.students.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('Image')</th>
                            <td field-key='image'>@if($student->image)<a href="{{ asset(env('UPLOAD_PATH').'/' . $student->image) }}" target="_blank"><img src="{{ asset(env('UPLOAD_PATH').'/thumb/' . $student->image) }}"/></a>@endif</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.students.fields.name')</th>
                            <td field-key='name'>{{ $student->name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('Email')</th>
                            <td field-key='email'>{{ $student->email }}</td>
                        </tr>
                        <tr>
                            <th>@lang('Contact')</th>
                            <td field-key='contact'>{{ $student->contact }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.students.fields.courses')</th>
                            <td field-key='courses'>
                                @foreach ($student->courses as $singleCourses)
                                    <span class="label label-info label-many">{{ $singleCourses->name }}</span>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <!-- <th rowspan="2">Academic Info</th> -->
                            <th>@lang('SSC GPA')</th>
                            <td field-key='ssc_gpa'>{{ $student->ssc_gpa }}</td>
                        </tr>
                        <tr>
                            <th>@lang('HSC or Diploma GPA')</th>
                            <td field-key='hsc_diploma_gpa'>{{ $student->hsc_diploma_gpa }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.students.fields.address')</th>
                            <td field-key='address'>{{ $student->address }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.students.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
            @if($student->decision != 0)
                <button class="btn btn btn-default" disabled="disabled">Admit Card Sent</button>
            @else
            <a href="{{ url('generate-pdf',[$student->id]) }}" class="btn btn-primary">@lang('Send Admit to mail')</a>
            @endif
        </div>
    </div>
@stop
