@extends('app')

@section('tile', 'Group List')

@section('content')
    @php
    $links = [
        'Group list' => route('group.index'),
        'Group edit' => '',
    ];
    @endphp
    <x-bred-crumb-componet title='' :links="$links" />
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <form method="POST" action="{{ route('group.update', $group->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="name">Group Name</label>
                        <input class="form-control" name="id" id="name" type="hidden" value="{{ $group->id }}">
                        <input class="form-control" name="name" id="name" type="text" value="{{ $group->name }}">

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
