@extends('app')

@section('tile', 'Class List')

@section('content')
    @php
        $links = [
            'Class list'=>route('class.index'),
           'Class edit'=>''
        ]
    @endphp
    <x-bred-crumb-componet title='' :links="$links" />
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <form method="POST" action="{{ route('class.update', $class->id)}}">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="name">Class Name</label>
                        <input class="form-control" name="name" id="name" type="number"  value="{{ $class->name }}">

                        @if($errors->has('name'))
                            <small class="font-weight-bold text-danger">{{ $errors->first('name') }}</small>
                        @endif

                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary mb-2">Submit now</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

