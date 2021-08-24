@extends('app')

@section('tile', 'Fees sttings')

@section('content')
    @php
    $links = [
        'Fees settings list' => route('student.index'),
        'Fees settings add' => '',
    ];
    @endphp
    <x-bred-crumb-componet title='Add a new settings' :links="$links" />
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <form method="POST" action="{{ route('fees-setup.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="name">Acedamic year</label>
                                <input class="form-control" placeholder="Acedamic year" name="acedamic_year" id="acedamic_year" type="number">
                                @if ($errors->has('acedamic_year'))
                                    <small class="font-weight-bold text-danger">{{ $errors->first('acedamic_year') }}</small>
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
                                    @foreach($sections as $section)
                                        <option value="{{$section->id}}">{{$section->name}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('section_id'))
                                    <small class="font-weight-bold text-danger">{{ $errors->first('section_id') }}</small>
                                @endif
                            </div>

                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="class_id">Payment name</label>
                                <select name="payment_id" class="form-control" id="group_id">
                                    @foreach($payments as $payment)
                                        <option value="{{$payment->id}}">{{$payment->name}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('payment_id'))
                                    <small class="font-weight-bold text-danger">{{ $errors->first('payment_id') }}</small>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="class_id">Fees name</label>
                                <select name="fees_id" class="form-control" id="fees_id">
                                    @foreach($feeses as $fees)
                                        <option value="{{$fees->id}}">{{$fees->name}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('fees_id'))
                                    <small class="font-weight-bold text-danger">{{ $errors->first('fees_id') }}</small>
                                @endif
                            </div>

                            <div>
                                <label for="roll">Amount</label>
                                <input type="number" name="amount" class="form-control" id="amount" placeholder="Amount">
                                @if ($errors->has('amount'))
                                    <small class="font-weight-bold text-danger">{{ $errors->first('amount') }}</small>
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
