$(document).ready( function () {

    $('.showProfile').bootstrapToggle();

    $("input[type='image']").click(function() {
        $("input[id='my_file']").click();
    });
});