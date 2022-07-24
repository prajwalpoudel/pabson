@extends('moderator.discussion.main')
@section('discussion')
        <div class="kt-portlet__body">
            <table
                class="table table-striped table-bordered table-hover table-checkable order-column dataTable no-footer"
                width="100%" id="discussion-table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>User</th>
                    <th>Status</th>
                    <th style="text-align: center">Actions</th>
                </tr>
                </thead>
            </table>
        </div>
@endsection

@push('script')
    <script type="application/javascript">
        var url = '{{ route(request()->route()->getName()) }}';
        var discussionTable = $('#discussion-table').DataTable({
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
                {data: 'title', name: 'title'},
                {data: 'description', name: 'description'},
                {data: 'user.first_name', name: 'user.first_name'},
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
