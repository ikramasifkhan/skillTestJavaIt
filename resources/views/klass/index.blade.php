@extends('app')

@section('tile', 'Class List')

@section('content')
    @php
        $links = [
            'Class list'=>''
        ]
    @endphp
    <x-bred-crumb-componet title='Class list' :links="$links" />

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="d-flex justify-content-between">
                    <div>
                        <h3 class="tile-title">Class List</h3>
                    </div>
                    <div>
                        <a class="btn btn-primary icon-btn" href="{{ route('class.create') }}" >{{ bladeIcon('add') }}Add New</a>
                    </div>
                </div>
                <table class="table table-bordered table-hover" id="sampleTable">

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
                ajax: '{{ route('class.index') }}',
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

