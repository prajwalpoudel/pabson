@extends('admin.layouts.master')

@section('content')
    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                        <span class="kt-portlet__head-icon">
                        </span>
                <h3 class="kt-portlet__head-title">
                    Subjects
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-actions">
                    <a href="{{ route('admin.academics.subject.create') }}" class="btn btn-primary">
                        <i class="fa fa-plus"></i>
                        Create
                    </a>
                </div>
            </div>
        </div>
        <div class="kt-portlet__body">
            <table
                class="table table-striped table-bordered table-hover table-checkable order-column dataTable no-footer"
                width="100%" id="subject-table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Grade</th>
                    <th style="text-align: center">Actions</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@push('script')
    <script type="application/javascript">
        var url = '{{ route('admin.academics.subject.index') }}';
        var subjectTable = $('#subject-table').DataTable({
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
                {data: 'grade.display_name', name: 'grade.display_name'},
                {data: 'action', 'name': 'action', searchable: false, orderable: false, className: 'dt-body-center'}
            ],
        });
    </script>
@endpush
