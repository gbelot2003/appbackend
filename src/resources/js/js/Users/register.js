$(document).ready( function () {

    $('#country_code').on('change', function(){
        let value = $(this).val();
        if(value === '+504'){
            let response = 'Honduras'
            $('#country_label').html(response);
        }

        if(value === '+501'){
            let response = 'Belise'
            $('#country_label').html(response);
        }

        if(value === '+502'){
            let response = 'Guatemala'
            $('#country_label').html(response);
        }

        if(value === '+503'){
            let response = 'El Salvador'
            $('#country_label').html(response);
        }

        if(value === '+505'){
            let response = 'Nicaragua'
            $('#country_label').html(response);
        }

        if(value === '+506'){
            let response = 'Costa Rica'
            $('#country_label').html(response);
        }

        if(value === '+507'){
            let response = 'Panama'
            $('#country_label').html(response);
        }

        if(value === '+52'){
            let response = 'Mexico'
            $('#country_label').html(response);
        }

        if(value === '+1'){
            let response = 'USA'
            $('#country_label').html(response);
        }


    })
});