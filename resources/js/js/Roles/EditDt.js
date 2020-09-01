$(document).ready( function () {
    let id = $('#editNumber').val();

    $('#users_role_table').DataTable({
        processing: true,
        serverSide: true,
        ajax: `/roles/${id}/edit`,
        "order": [[0, "desc"]],
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'updated_at', name: 'updated_at' },
        ]
    });
});