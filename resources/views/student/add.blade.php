@extends('app')

@section('tile', 'Student add')

@section('content')
    @php
    $links = [
        'Student list' => route('student.index'),
        'Student add' => '',
    ];
    @endphp
    <x-bred-crumb-componet title='Add a new student' :links="$links" />
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <form method="POST" action="{{ route('student.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="name">First Name</label>
                                <input class="form-control" placeholder="First name" name="first_name" id="name" type="text">
                                @if ($errors->has('first_name'))
                                    <small class="font-weight-bold text-danger">{{ $errors->first('first_name') }}</small>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="name">Last Name</label>
                                <input class="form-control" placeholder="Last name" name="last_name" id="name" type="text">
                                @if ($errors->has('last_name'))
                                    <small class="font-weight-bold text-danger">{{ $errors->first('last_name') }}</small>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="name">Gender</label>

                                <select name="gender" class="form-control" id="exampleSelect1">
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                </select>
                                @if ($errors->has('gender'))
                                    <small class="font-weight-bold text-danger">{{ $errors->first('gender') }}</small>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="date">Birth year</label>
                                <input type="date" name="birth_date" class="form-control" id="date">
                                @if ($errors->has('birth_date'))
                                    <small class="font-weight-bold text-danger">{{ $errors->first('birth_date') }}</small>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="present_address">Present address</label>
                                <input type="text" name="present_address" class="form-control" id="present_address" placeholder="Present address">
                                @if ($errors->has('present_address'))
                                    <small class="font-weight-bold text-danger">{{ $errors->first('present_address') }}</small>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="sms_no">Sms no</label>
                                <input type="text" name="sms_no" class="form-control" id="sms_no" placeholder="sms no">
                                @if ($errors->has('sms_no'))
                                    <small class="font-weight-bold text-danger">{{ $errors->first('sms_no') }}</small>
                                @endif
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="class_id">Academic session</label>
                                <input type="number" class="form-control" name="session_year" min="2000" max="2021" step="1" placeholder="Select a year" />
                                @if ($errors->has('session_year'))
                                    <small class="font-weight-bold text-danger">{{ $errors->first('session_year') }}</small>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="class_id">Academic year</label>
                                <input type="number" class="form-control" name="year" min="2000" max="2021" step="1" placeholder="Select a year" />
                                @if ($errors->has('year'))
                                    <small class="font-weight-bold text-danger">{{ $errors->first('year') }}</small>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="class_id">Class name</label>
                                <select name="class_id" class="form-control" id="class_id">
                                    @foreach($classes as $class)
                                    <option value="{{$class->id}}">{{$class->name}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('class_id'))
                                    <small class="font-weight-bold text-danger">{{ $errors->first('class_id') }}</small>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="class_id">Group name</label>
                                <select name="group_id" class="form-control" id="group_id">
                                    @foreach($groups as $group)
                                        <option value="{{$group->id}}">{{$group->name}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('group_id'))
                                    <small class="font-weight-bold text-danger">{{ $errors->first('group_id') }}</small>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="class_id">Section name</label>
                                <select name="section_id" class="form-control" id="section_id">
                                    <optgroup label="Select a section">
                                        @foreach($sections as $section)
                                            <option value="{{$section->id}}">{{$section->name}}</option>
                                        @endforeach
                                    </optgroup>
                                </select>
                                @if ($errors->has('section_id'))
                                    <small class="font-weight-bold text-danger">{{ $errors->first('section_id') }}</small>
                                @endif
                            </div>

                            <div>
                                <label for="roll">Roll no</label>
                                <input type="number" name="roll" class="form-control" id="roll" placeholder="Roll no">
                                @if ($errors->has('roll'))
                                    <small class="font-weight-bold text-danger">{{ $errors->first('roll') }}</small>
                                @endif
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <button type="submit" class="btn btn-primary mb-2">Submit now</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
