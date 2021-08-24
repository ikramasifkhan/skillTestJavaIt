@extends('app')

@section('tile', 'Student edit form')

@section('content')
    @php
    $links = [
        'Student list' => route('student.index'),
        'Student edit' => '',
    ];
    @endphp
    <x-bred-crumb-componet title='' :links="$links" />
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <form method="POST" action="{{ route('student.update', $student->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="name">First Name</label>
                                <input class="form-control" placeholder="First name" name="first_name" id="name" type="text" value="{{$student->first_name}}">
                                @if ($errors->has('first_name'))
                                    <small class="font-weight-bold text-danger">{{ $errors->first('first_name') }}</small>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="name">Last Name</label>
                                <input class="form-control" placeholder="Last name" name="last_name" id="name" type="text" value="{{$student->last_name}}">
                                @if ($errors->has('last_name'))
                                    <small class="font-weight-bold text-danger">{{ $errors->first('last_name') }}</small>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="name">Gender</label>

                                <select name="gender" class="form-control" id="exampleSelect1">
                                    <option value="male" {{$student->gender== 'male'?'selected': ' '}}>Male</option>
                                    <option value="female" {{$student->gender== 'female'?'selected': ' '}}>Female</option>
                                    <option value="other" {{$student->gender== 'other'?'selected': ' '}}>Other</option>
                                </select>
                                @if ($errors->has('gender'))
                                    <small class="font-weight-bold text-danger">{{ $errors->first('gender') }}</small>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="date">Birth year</label>
                                <input type="date" name="birth_date" class="form-control" id="date" value="{{$student->birth_date}}">
                                @if ($errors->has('birth_date'))
                                    <small class="font-weight-bold text-danger">{{ $errors->first('birth_date') }}</small>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="present_address">Present address</label>
                                <input type="text" name="present_address" class="form-control" id="present_address" placeholder="Present address" value="{{$student->present_address}}">
                                @if ($errors->has('present_address'))
                                    <small class="font-weight-bold text-danger">{{ $errors->first('present_address') }}</small>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="sms_no">Sms no</label>
                                <input type="text" name="sms_no" class="form-control" id="sms_no" placeholder="sms no" value="{{$student->sms_no}}">
                                @if ($errors->has('sms_no'))
                                    <small class="font-weight-bold text-danger">{{ $errors->first('sms_no') }}</small>
                                @endif
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="class_id">Academic session</label>
                                <input type="number" name="session_year" value="{{$student->session}}" class="form-control"  min="2000" max="2021" step="1" placeholder="Select a year" />
                                @if ($errors->has('session_year'))
                                    <small class="font-weight-bold text-danger">{{ $errors->first('session_year') }}</small>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="class_id">Academic year</label>
                                <input type="number" name="year" value="{{$student->year}}" class="form-control"  min="2000" max="2021" step="1" placeholder="Select a year" />
                                @if ($errors->has('year'))
                                    <small class="font-weight-bold text-danger">{{ $errors->first('year') }}</small>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="class_id">Class name</label>
                                <select name="class_id" class="form-control" id="class_id">
                                    @foreach($classes as $class)
                                        <option value="{{$class->id}}" {{$class->id==$student->klass_id ? 'selected': ''}}>{{$class->name}}</option>
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
                                        <option value="{{$group->id}}" {{$group->id==$student->group_id ? 'selected': ''}}>{{$group->name}}</option>
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
                                            <option value="{{$section->id}}" {{$section->id==$student->section_id ? 'selected': ''}}>{{$section->name}}</option>
                                        @endforeach
                                    </optgroup>
                                </select>
                                @if ($errors->has('section_id'))
                                    <small class="font-weight-bold text-danger">{{ $errors->first('section_id') }}</small>
                                @endif
                            </div>

                            <div>
                                <label for="roll">Roll no</label>
                                <input type="number" name="roll" class="form-control" id="roll" placeholder="Roll no" value="{{$student->roll}}">
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
