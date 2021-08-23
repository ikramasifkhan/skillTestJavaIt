@extends('app')

@section('tile', 'Class List')

@section('content')
    @php
        $links = [
            'Class list'=>route('class.index'),
            'Class add'=>''
        ]
    @endphp
    <x-bred-crumb-componet title='Add a new class' :links="$links" />
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <form method="POST" action="{{ route('class.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name">Class Name</label>
                        <input class="form-control" name="name" id="name" type="number" min="6" max="10">
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

