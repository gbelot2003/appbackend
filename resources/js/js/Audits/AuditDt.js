$(document).ready( function () {
        let table = $('#dataTable').DataTable({
        processing: true,
        serverSide: false,
        ajax: "/audits",
        "order": [[0, "desc"]],
        columns: [
            { data: 'id', name: 'audits.id', "visible": false,},
            { data: 'updated_at', name: 'updated_at' },
            { data: 'name', name: 'user.name' },
            { data: 'event', name: 'event' },
            { data: 'auditable_type', name: 'auditable_type' },
            { data: 'old_values', name: 'old_values', "visible": false, },
            { data: 'new_values', name: 'new_values' , "visible": false,},
            { data: 'url', name: 'url' },
            { data: 'ip_address', name: 'ip_address' },
            { data: 'user_agent', name: 'user_agent',  "visible": false,},
            { data: 'tags', name: 'tags', "visible": false,},
        ]
    });

    $('button.toggle-vis').on( 'click', function (e) {
        e.preventDefault();

        if ($(this).hasClass('btn-secondary')){
            $(this).removeClass('btn-secondary');
            $(this).addClass('btn-outline-secondary');
        } else {
            $(this).removeClass('btn-outline-secondary');
            $(this).addClass('btn-secondary');
        }

        // Get the column API object
        let column = table.column($(this).attr('data-column'));


        // Toggle the visibility
        column.visible( ! column.visible() );
    } );
});