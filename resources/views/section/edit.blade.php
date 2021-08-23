@extends('app')

@section('tile', 'Section List')

@section('content')
    @php
    $links = [
        'Section list' => route('section.index'),
        'Section edit' => '',
    ];
    @endphp
    <x-bred-crumb-componet title='' :links="$links" />
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <form method="POST" action="{{ route('section.update', $section->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="name">Section Name</label>
                        <input  name="id"  type="hidden" value="{{ $section->id }}">
                        <input class="form-control" name="name" id="name" type="text" value="{{ $section->name }}">

                        @if ($errors->has('name'))
                            <small class="font-weight-bold text-danger">{{ $errors->first('name') }}</small>
                        @endif

                    </div>
                    
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary mb-2">Update now</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
