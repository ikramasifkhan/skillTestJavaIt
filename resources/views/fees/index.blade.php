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
        <div class="d-flex justify-content-between">
            <div>
                <h3 class="tile-title">Fees List</h3>
            </div>
            <div>
                <a class="btn btn-primary icon-btn" href="{{ route('fees.create') }}" >{{ bladeIcon('add') }}Add New</a>
            </div>
        </div>
        <table class="table table-bordered table-hover" id="sampleTable">
          {{-- <thead>
            <tr>
              <th>#</th>
              <th>Fees name</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($feeses as $fees)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $fees->name }}</td>
                    <td>
                        @if($fees->status == 'active')
                            {{ showStatus('active') }}
                            @else
                            {{ showStatus('inactive') }}
                        @endif
                    </td>
                    <td>
                        @php
                            $status = $fees->status;
                            $actions = [
                                'edit'=>route('fees.edit', $fees->id),
                                'active'=>route('fees.ActiveInactive', $fees->id),
                                'inactive'=>route('fees.ActiveInactive', $fees->id),
                                'delete' =>route('fees.destroy', $fees->id),
                            ]
                        @endphp
                        <x-action-component :actions="$actions" status="{{ $fees->status }}" />
                    </td>
                </tr>
              @endforeach

          </tbody> --}}
        </table>
      </div>
    </div>

  </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function () {
            Table = $('#sampleTable').dataTable({
                stateSave: true,
                responsive: true,
                serverSide: true,
                processing: true,
                ajax: '{{ route('fees.index') }}',
                columns: [
                    {data: "DT_RowIndex",title:"SL", name: "DT_RowIndex", searchable: false, orderable: false},
                    {data: "name", title:"Name", searchable: true},
                    {data: "status", title:"Status", orderable: false, searchable: false},
                    {data: "action",title:"Action", orderable: false, searchable: false},
                ],
            });
        })
    </script>
@endpush
