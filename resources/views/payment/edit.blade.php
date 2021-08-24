@extends('app')

@section('tile', 'Payment edit')

@section('content')
@php
    $links = [
        'Payment list'=>route('payment.index'),
       'Payment edit'=>''
    ]
@endphp
<x-bred-crumb-componet title='Payment Edit' :links="$links" />
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <form method="POST" action="{{ route('payment.update', $payment->id)}}">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">Payment Name</label>
                    <input name="id" type="hidden"  value="{{ $payment->id }}">
                    <input class="form-control" name="name" id="name" type="text"  value="{{ $payment->name }}">

                    @if($errors->has('name'))
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
