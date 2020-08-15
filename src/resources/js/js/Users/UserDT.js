$(document).ready( function () {

    $('div.alert').not('.alert-important').delay(3000).fadeOut(350);

    $('#chkToggle2').bootstrapToggle();

    $('#laravel_datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "/users",
        "order": [[0, "desc"]],
        "createdRow":function (row, data, dataIndex) {
        if (data['user_status'] == 2) {
            $(row).addClass('alert-info');
        }
    },
    columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            { data: 'phonefield', name: 'phonefield' },
            { data: 'rname', name: 'roles.name' },
            { data: 'user_status', name: 'user_status',
                "render": function(data, type, row){
                    if (data === 1){
                        return 'Active'
                    }
                    return 'Inactive'
                },
            },
            { data: 'updated_at', name: 'updated_at' },
            { data: 'actions', name: 'action', "searchable": false }
        ]
    });
});