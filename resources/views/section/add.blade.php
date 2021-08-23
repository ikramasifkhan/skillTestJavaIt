@extends('app')

@section('tile', 'Section List')

@section('content')
    @php
    $links = [
        'Section list' => route('class.index'),
        'Section add' => '',
    ];
    @endphp
    <x-bred-crumb-componet title='Add a new section' :links="$links" />
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <form method="POST" action="{{ route('section.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name">Section Name</label>
                        <input class="form-control" placeholder="Section name" name="name" id="name" type="text" min="6"
                            max="10">
                        @if ($errors->has('name'))
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
