@extends('app')

@section('tile', 'Fees List')

@section('content')
@php
    $links = [
        'Fees list'=>''
    ]
@endphp
<x-bred-crumb-componet title='Fees list' :links="$links" />
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <form method="POST" action="{{ route('fees.store') }}">
                @csrf
                <div class="form-group">
                    <label for="name">Fees Name</label>
                    <input class="form-control" name="fees_name" id="name" type="text"  placeholder="Enter fees name">
                    <small class="form-text text-muted" id="emailHelp">We'll never share your email with anyone else.</small>
                  </div>
                  <div class="form-group">
                      <button type="submit" class="btn btn-primary mb-2">Confirm identity</button>
                  </div>
            </form>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="d-flex justify-content-between">
            <div>
                <h3 class="tile-title">Fees List</h3>
            </div>
            <div>
                <a class="btn btn-primary icon-btn" href="{{ route('fees.create') }}" >{{ bladeIcon('add') }}Add New</a>
            </div>
        </div>
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>#</th>
              <th>Fees name</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>Mark</td>
              <td>Otto</td>

            </tr>
          </tbody>
        </table>
      </div>
    </div>

  </div>
@endsection
