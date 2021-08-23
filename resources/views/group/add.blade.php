@extends('app')

@section('tile', 'Class List')

@section('content')
    @php
    $links = [
        'Group list' => route('class.index'),
        'Group add' => '',
    ];
    @endphp
    <x-bred-crumb-componet title='Add a new group' :links="$links" />
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <form method="POST" action="{{ route('group.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name">Group Name</label>
                        <input class="form-control" placeholder="Group name" name="name" id="name" type="text" min="6"
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
