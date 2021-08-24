@extends('app')

@section('tile', 'Payment List')

@section('content')
@php
    $links = [
        'Payment list'=>route('payment.index'),
        'Payment add'=>''
    ]
@endphp
<x-bred-crumb-componet title='Payment Add' :links="$links" />
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <form method="POST" action="{{ route('payment.store') }}">
                @csrf
                <div class="form-group">
                    <label for="name">Payment Name</label>
                    <input class="form-control" name="name" id="name" type="text"  placeholder="Enter payment name">
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
