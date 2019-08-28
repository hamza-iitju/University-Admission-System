@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.students.title')</h3>
    @can('student_create')
    <p>
        <a href="{{ route('admin.students.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>
    @endcan

    @can('student_delete')
    <p>
        <ul class="list-inline">
            <!-- <li><a href="{{ route('admin.students.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('quickadmin.qa_all')</a></li> |
            <li><a href="{{ route('admin.students.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('quickadmin.qa_trash')</a></li> -->
        </ul>
    </p>
    @endcan


    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive" style="overflow: scroll">
            <table class="table table-bordered table-striped {{ count($students) > 0 ? 'datatable' : '' }} @can('student_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                    <tr>
                        @can('student_delete')
                            @if ( request('show_deleted') != 1 )<th rowspan="2" style="vertical-align: middle; text-align: center;"><input type="checkbox" id="select-all" /></th>@endif
                        @endcan

                        <th rowspan="2" style="vertical-align: middle; text-align: center;">@lang('Image')</th>
                        <th rowspan="2" style="vertical-align: middle; text-align: center;">@lang('Name')</th>
                        <th rowspan="2" style="vertical-align: middle; text-align: center;">@lang('Email')</th>
                        <th rowspan="2" style="vertical-align: middle; text-align: center;">@lang('Contact')</th>
                        <th rowspan="2" style="vertical-align: middle; text-align: center;">@lang('Course')</th>
                        <th colspan="2" style="vertical-align: middle; text-align: center;">@lang('Academic Info')</th>
                            
                        <th rowspan="2" style="vertical-align: middle; text-align: center;">@lang('Present Address')</th>
                        @if( request('show_deleted') == 1 )
                        <th rowspan="2" style="vertical-align: middle; text-align: center;">Actions</th>
                        @else
                        <th rowspan="2" style="vertical-align: middle; text-align: center;">Actions</th>
                        @endif
                    </tr>
                    <tr>
                       
                        <th>SSC GPA</th>
                        <th>HSC or Diploma GPA</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($students) > 0)
                        @foreach ($students as $student)
                            <tr data-entry-id="{{ $student->id }}">
                                @can('student_delete')
                                    @if ( request('show_deleted') != 1 )<td></td>@endif
                                @endcan
                                
                                <td field-key='image'>@if($student->image)<a href="{{ asset(env('UPLOAD_PATH').'/' . $student->image) }}" target="_blank"><img src="{{ asset(env('UPLOAD_PATH').'/thumb/' . $student->image) }}" width="50" height="50"/></a>@endif</td>

                                <td field-key='name'>{{ $student->name }}</td>
                                <td field-key='email'>{{ $student->email }}</td>
                                <td field-key='contact'>{{ $student->contact }}</td>
                                <td field-key='courses'>
                                    @foreach ($student->courses as $singleCourses)
                                        <span class="label label-info label-many">{{ $singleCourses->name }}</span>
                                    @endforeach
                                </td>
                                <td field-key='email'>{{ $student->ssc_gpa }}</td>
                                <td field-key='email'>{{ $student->hsc_diploma_gpa }}</td>
                                
                                <td field-key='address'>{{ $student->address }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    @can('student_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.students.restore', $student->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                    @can('student_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.students.perma_del', $student->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                </td>
                                @else
                                <td>
                                    @if($student->decision != 0)
                                        <button class="btn btn-xs btn-default" disabled="disabled">Admit Card Sent</button>
                                    @else
                                    @can('student_view')
                                        <a href="{{ route('admin.students.show',[$student->id]) }}" class="btn btn-xs btn-primary">@lang('Admit Card')</a>                                        
                                    @endcan
                                    {{-- <!-- @can('student_view')
                                    <a href="{{ route('admin.students.show',[$student->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan -->
                                    <!-- @can('student_edit')
                                    <a href="{{ route('admin.students.edit',[$student->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan --> --}}
                                    @can('student_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.students.destroy', $student->id])) !!}
                                    {!! Form::submit(trans('Reject'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                    @endif
                                </td>
                                @endif
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="11">@lang('quickadmin.qa_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('student_delete')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.students.mass_destroy') }}'; @endif
        @endcan

    </script> 
@endsection