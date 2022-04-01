jQuery(function () {

    jQuery.validator.addMethod("dollarsscents", function (value, element) {
        return this.optional(element) || /^\d{0,4}(\.\d{0,2})?$/i.test(value);
    }, "You must enter valid numbers up to 2 decimal places only");

    jQuery('.registration').validate({
        errorClass: 'invalid-feedback animated fadeIn',
        errorElement: 'div',
        errorPlacement: (error, el) => {
            jQuery(el).addClass('is-invalid');
            jQuery(el).parents('.form-group').append(error);
        },
        highlight: (el) => {
            jQuery(el).parents('.form-group').find('.is-invalid').removeClass('is-invalid').addClass('is-invalid');
        },
        success: (el) => {
            jQuery(el).parents('.form-group').find('.is-invalid').removeClass('is-invalid');
            jQuery(el).remove();
        },
        rules: {
            'first_name': {
                required: true,
                minlength: 2
            },
            'last_name': {
                required: true
            },

            'password': {
                required: true,
                minlength: 5
            },

            'email': {
                required: true,
                email: true,
                remote: {
                    url: "/checkemail?email=" + jQuery('#email').val(),
                    type: "get"
                }
            },

            'password_confirmation':{
                required: true,
                minlength: 5,
                equalTo: '#password'
            },
            'dob':{
                required: true,
            },


        },
        messages: {
            'first_name': {
                required: 'First name must not be empty',
                minlength: 'Must be minimum 2 characters',
            },
            'last_name': {
                required: 'Last name must not be empty'
            },
            'password': {
                required: 'password must not be empty',
                minlength: 'password must be 5 characters long',
            },

            'password_confirmation': {
                required: 'password must not be empty',
                minlength: 'password must be 5 characters long',
                equalTo: 'password and confirm password must be equal',
            },

            'dob': {
                required: 'date of birth must not be empty',

            },

            'email': {
                required: 'email must not be empty',
                email: 'email must be valid',
                remote: 'email must be unique',

            },



        }
    });









});
