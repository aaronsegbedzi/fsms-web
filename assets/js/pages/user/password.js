$(function () {

    $(
        "#password-form input[name=username], #security-form input[name=username]"
    ).val(localStorage.getItem(
        'username'));

    // Password form submit function.
    $("#password-form").submit(function (
        event) {
        event.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            type: 'POST',
            url: localStorage.getItem(
                    'api') +
                '/v1/password.php?task=change_password&token=' +
                localStorage.getItem('key'),
            data: data,
            statusCode: {
                401: function () {
                    swal("Unauthorized Access.",
                        "Password is incorrect. Please try again.",
                        "error");
                },
                400: function () {
                    swal("Password Mismatch.",
                        "Passwords do not match. Please try again.",
                        "error");
                }
            },
            success: function (response) {
                swal(
                    "Password saved successfully.",
                    "Security password has been successfully updated.",
                    "success");
            },
            error: function (status) {
                swal('Service Unavailable',
                    'Unable to establish connection with the server.',
                    'error');
            }
        });
    });

    // Security form submit function.
    $("#security-form").submit(function (
        event) {
        event.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            type: 'POST',
            url: localStorage.getItem(
                    'api') +
                '/v1/password.php?task=security_info&token=' +
                localStorage.getItem('key'),
            data: data,
            success: function (response) {
                swal(
                    'Security details saved successfully.',
                    'Security information has been successfully updated.',
                    'success');
            },
            error: function (status) {
                swal('Service Unavailable',
                    'Unable to establish connection with the server.',
                    'error');
            }
        });
    });

});