@extends('admin.layouts.master')

@section('content')
    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                        <span class="kt-portlet__head-icon">
                        </span>
                <h3 class="kt-portlet__head-title">
                    School
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-actions">
                    <a href="{{ route('admin.user.school.create') }}" class="btn btn-primary">
                        <i class="fa fa-plus"></i>
                        Create
                    </a>
                </div>
            </div>
        </div>
        <div class="kt-portlet__body">
            <table
                class="table table-striped table-bordered table-hover table-checkable order-column dataTable no-footer"
                width="100%" id="school-table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Principal</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Status</th>
                    <th style="text-align: center">Actions</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@push('script')
    <script type="application/javascript">
        var url = '{{ route('admin.user.school.index') }}';
        var schoolTable = $('#school-table').DataTable({
            processing: true,
            serverSide: true,
            autoWidth: false,
            searching: true,
            stateSave: true,
            ajax: {
                url: url,
            },
            order: [[1, 'asc']],
            columns: [
                {data: 'DT_RowIndex', searchable: false, orderable: false, width: '5%'},
                {data: 'name', name: 'name'},
                {data: 'user.email', name: 'user.email'},
                {data: 'principal_name', name: 'principal_name'},
                {data: 'phone', name: 'phone'},
                {data: 'address', name: 'address'},
                {data: 'status', name: 'status'},
                {
                    data: 'action',
                    'name': 'action',
                    searchable: false,
                    orderable: false,
                    className: 'dt-body-center',
                    width: '5%'
                }
            ],
        });
    </script>
@endpush
