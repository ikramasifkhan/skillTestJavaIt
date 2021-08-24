@extends('app')

@section('tile', 'Student details')

@section('content')
    @php
        $links = [
            'Student list' => route('student.index'),
            'Student details' => '',
        ];
    @endphp
    <x-bred-crumb-componet title='Student details' :links="$links" />

    <div class="row">
        <div class="col-md-3">
            <div class="widget-small primary coloured-icon py-3">
                <div class="info">
                    <h4>Student ID</h4>
                    <p><b>{{$student->studentId}}</b></p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="widget-small primary coloured-icon py-3">
                <div class="info">
                    <h4>Student Roll</h4>
                    <p><b>{{$student->roll}}</b></p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="widget-small primary coloured-icon py-3">
                <div class="info">
                    <h4>Full name</h4>
                    <p><b>{{$student->first_name. ' '. $student->last_name}}</b></p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="widget-small primary coloured-icon py-3">
                <div class="info">
                    <h4>Birth year</h4>
                    <p><b>{{date('d M Y', strtotime($student->birth_date))}}</b></p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="widget-small primary coloured-icon py-3">
                <div class="info">
                    <h4>Present address</h4>
                    <p><b>{{$student->present_address}}</b></p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="widget-small primary coloured-icon py-3">
                <div class="info">
                    <h4>Class</h4>
                    <p><b>{{$student->klass->name}}</b></p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="widget-small primary coloured-icon py-3">
                <div class="info">
                    <h4>Group</h4>
                    <p><b>{{$student->group->name}}</b></p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="widget-small primary coloured-icon py-3">
                <div class="info">
                    <h4>Section</h4>
                    <p><b>{{$student->section->name}}</b></p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="widget-small primary coloured-icon py-3">
                <div class="info">
                    <h4>Academic year</h4>
                    <p><b>{{date('y', strtotime($student->year)).'(Jan) to '. date('y', strtotime($student->year)).'(Dec)'}}</b></p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="widget-small primary coloured-icon py-3">
                <div class="info">
                    <h4>Session</h4>
                    <p><b>{{date('y', strtotime($student->session)).'(Jan) to '. date('y', strtotime($student->session)).'(Dec)'}}</b></p>
                </div>
            </div>
        </div>
    </div>
@endsection

