<span class="kt-switch kt-switch--outline kt-switch--icon kt-switch--success">
    <label>
        <input type="checkbox" {{ $checked ? 'checked' : null }} name="{{ $name ?? null }}" id="switch" data-url="{{$url}}" onchange="changeStatus(this)">
        <span></span>
    </label>
</span>

<script>
    function changeStatus(element) {
            var url = $(element).data('url');
            var tableName = @json($tableName ?? null);

        $.ajax({
                url: url,
                type: 'PUT',
                data: {
                    '<?php echo $name ?>': $("#switch").prop('checked') === true ? 1 : 0,
                    "_token": "<?php echo csrf_token() ?>"
                },
                success: function (data) {
                    toastr.success('Status changed successfully.');
                    if (tableName) {
                        $('#'+ tableName).DataTable().ajax.reload();
                    }
                },
                error: function (request, error) {
                    toastr.error('Sorry something went wrong.');
                }
            });
    }
</script>
