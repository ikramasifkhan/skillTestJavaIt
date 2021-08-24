@extends('app')

@section('tile', 'Fees setup list')

@section('content')
    @php
    $links = [
        'Students list' => '',
    ];
    @endphp
    <x-bred-crumb-componet title='Fees setup list' :links="$links" />

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="d-flex justify-content-between">
                    <div>
                        <h3 class="tile-title">Fees setup list</h3>
                    </div>
                    <div>
                        <a class="btn btn-primary icon-btn"
                            href="{{ route('fees-setup.create') }}">{{ bladeIcon('add') }}Add
                            New</a>
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
        $(document).ready(function() {
            $('#sampleTable').dataTable({
                stateSave: true,
                responsive: true,
                serverSide: true,
                processing: true,
                ajax: '{{ route('fees-setup.index') }}',
                columns: [{
                        data: "DT_RowIndex",
                        title: "SL",
                        name: "DT_RowIndex",
                        searchable: false,
                        orderable: false
                    },
                    {
                        data: "acedamic_year",
                        title: "Academic year",
                        searchable: true
                    },

                    {
                        data: "klass.name",
                        title: "Class",
                        searchable: true
                    },
                    {
                        data: "group.name",
                        title: "Group",
                        searchable: true
                    },
                    {
                        data: "section.name",
                        title: "Section",
                        searchable: true
                    },
                    {
                        data: "payment.name",
                        title: "Section",
                        searchable: true
                    },
                    {
                        data: "fees.name",
                        title: "Section",
                        searchable: true
                    },
                    {
                        data: "amount",
                        title: "Amount",
                        searchable: true
                    },

                    {
                        data: "status",
                        title: "Status",
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: "action",
                        title: "Action",
                        orderable: false,
                        searchable: false
                    },
                ],
            });
        })
    </script>
@endpush
