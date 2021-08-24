@extends('app')

@section('tile', 'Fees List')

@section('content')
@php
    $links = [
        'Fees list'=>route('fees.index'),
       'Fees edit'=>''
    ]
@endphp
<x-bred-crumb-componet title='' :links="$links" />
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <form method="POST" action="{{ route('fees.update', $fees->id)}}">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">Fees Name</label>
                    <input class="form-control" name="name" id="name" type="text"  value="{{ $fees->name }}">

                    @if($errors->has('name'))
                        <small class="font-weight-bold text-danger">{{ $errors->first('name') }}</small>
                    @endif

                  </div>
                <div class="form-group">
                    <label for="name">Amount</label>
                    <input class="form-control" name="amount" id="name" type="number" min="1"  value="{{ $fees->amount }}">

                    @if($errors->has('name'))
                        <small class="font-weight-bold text-danger">{{ $errors->first('amount') }}</small>
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
