$(function () {

    // Set global API url stored in browser local storage.
    localStorage.setItem('api',
        'http://service.cocoware.co.uk');

    // Show password on user click event.
    $("#show_password").on('mousedown',
        function () {
            $("#password").get(0).type =
                'text';
        }).on('mouseup mouseleave',
        function () {
            $("#password").get(0).type =
                'password';
        });

    // Login form submit function.
    $("#login-form").submit(function (
        event) {
        event.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            type: 'POST',
            url: localStorage.getItem(
                'api') + '/v1/auth.php',
            data: data,
            statusCode: {
                401: function () {
                    swal("Unauthorized Access.",
                        "Your account username or password is incorrect.",
                        "error");
                },
                404: function () {
                    swal("Unauthorized Access.",
                        "Your account username or password is incorrect.",
                        "error");
                }
            },
            success: function (response) {
                if ($.trim(response.redirect) ==
                    'change_password') {
                    window.location.href =
                        "/change_password.php?username=" +
                        response.username;
                } else {
                    swal({
                        title: "Greetings!",
                        text: "Successfully signed in. Redirecting to dashboard...",
                        icon: "success",
                        timer: 2000,
                        button: false,
                        closeOnClickOutside: false
                    }).then(function () {
                        // Send auth token to user session handler.
                        $.get(
                            "/include/session.php", {
                                token: response
                            },
                            function (result) {
                                var role;
                                $.each(result,
                                    function (key, val) {
                                        // Set user session id.
                                        localStorage.setItem(
                                            'id', val.id);
                                        // Set user session username.
                                        localStorage.setItem(
                                            'username', val.username
                                        );
                                        // Set user session firstname.
                                        localStorage.setItem(
                                            'firstName', val
                                            .firstName);
                                        // Set user session lastname.
                                        localStorage.setItem(
                                            'lastName', val.lastName
                                        );
                                        // Set user session createdAt.
                                        localStorage.setItem(
                                            'createdAt', val
                                            .created_at);
                                        // Set user session updatedAt.
                                        localStorage.setItem(
                                            'updatedAt', val
                                            .updated_at);
                                        // Set user session role.
                                        localStorage.setItem(
                                            'role', val.role
                                        );
                                        // Set user session Stationid.
                                        localStorage.setItem(
                                            'Stationid', val
                                            .Stationid);
                                        // Set user session token key.
                                        localStorage.setItem(
                                            'key', response);

                                        // Set value for role variable.
                                        role = val.role;
                                    });

                                if (role == '2') {
                                    window.location.href =
                                    "/station/view.php";
                                } else {
                                    window.location.href =
                                    "/dashboard.php";
                                }
                                
                            });
                    });
                }
            },
            error: function (status) {
                swal('Service Unavailable',
                    'Unable to establish connection with server.',
                    'error');
            }
        });
    });
});
