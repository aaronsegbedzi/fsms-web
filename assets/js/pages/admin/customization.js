$(function () {
    // Get root element css colors.
    var rootElement = window.getComputedStyle(document.querySelector("html"));
    var primary_color = rootElement.getPropertyValue('--primary-color');
    var secondary_color = rootElement.getPropertyValue('--secondary-color');
    var tetiary_color = rootElement.getPropertyValue('--tetiary-color');

    $('#primary_color').colorpicker({
        "color": primary_color
    });
    $('#secondary_color').colorpicker({
        "color": secondary_color
    });
    $('#tetiary_color').colorpicker({
        "color": tetiary_color
    });

    // Form for color appearance.
    $("#personalize-form").submit(function (event) {
        event.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            type: 'POST',
            url: '/include/layouts/color.php',
            data: data,
            success: function (response) {
                swal({
                    title: "Settings saved successfully.",
                    text: "Reloading...",
                    icon: "success",
                    timer: 2000,
                    button: false,
                    closeOnClickOutside: false
                }).then(function () {
                    location.reload(true);
                });
            },
            error: function (status) {
                swal('Service Unavailable', 'Unable to establish connection with the server.', 'error');
            }
        });
    });

    // Form for logo only.
    $("#logo-form").submit(function (event) {
        event.preventDefault();
        var data = new FormData(this);
        $.ajax({
            type: 'POST',
            url: '/include/layouts/logo.php',
            data: data,
            async: false,
            cache: false,
            contentType: false,
            enctype: 'multipart/form-data',
            processData: false,
            success: function (response) {
                swal({
                    title: "Image uploaded successfully.",
                    text: "Reloading...",
                    icon: "success",
                    timer: 2000,
                    button: false,
                    closeOnClickOutside: false
                }).then(function () {
                    location.reload(true);
                });
            },
            error: function (status) {
                swal('Service Unavailable', 'Unable to establish connection with the server.', 'error');
            }
        });
    });

    // Form for icon only.
    $("#icon-form").submit(function (event) {
        event.preventDefault();
        var data = new FormData(this);
        $.ajax({
            type: 'POST',
            url: '/include/layouts/icon.php',
            data: data,
            async: false,
            cache: false,
            contentType: false,
            enctype: 'multipart/form-data',
            processData: false,
            success: function (response) {
                swal({
                    title: "Image uploaded successfully.",
                    text: "Reloading...",
                    icon: "success",
                    timer: 2000,
                    button: false,
                    closeOnClickOutside: false
                }).then(function () {
                    location.reload(true);
                });
            },
            error: function (status) {
                swal('Service Unavailable', 'Unable to establish connection with the server.', 'error');
            }
        });
    });

    // Form for company details.
    $("#company-form").submit(function (event) {
        event.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            type: 'POST',
            url: '/include/layouts/company.php',
            data: data,
            success: function (response) {
                swal({
                    title: "Settings saved successfully.",
                    text: "Reloading...",
                    icon: "success",
                    timer: 2000,
                    button: false,
                    closeOnClickOutside: false
                }).then(function () {
                    location.reload();
                });
            },
            error: function (status) {
                swal('Service Unavailable', 'Unable to establish connection with the server.', 'error');
            }
        });
    });
});