$(function () {

    $("#user-form input[name=id]").val(
        localStorage.getItem('id'));
    $("#user-form input[name=username]")
        .val(localStorage.getItem(
            'username'));
    $("#user-form input[name=firstName]")
        .val(localStorage.getItem(
            'firstName'));
    $("#user-form input[name=lastName]")
        .val(localStorage.getItem(
            'lastName'));
    $("#user-form input[name=createdAt]")
        .val(localStorage.getItem(
            'createdAt'));
    $("#user-form input[name=updatedAt]")
        .val(localStorage.getItem(
            'updatedAt'));
    $("#user-form input[name=role]").val(
        localStorage.getItem('role'));
    $("#user-form input[name=Stationid]")
        .val(localStorage.getItem(
            'Stationid'));

    $("#user-form").submit(function (
        event) {
        event.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            type: 'POST',
            url: localStorage.getItem(
                    'api') +
                '/v1/user.php?token=' +
                localStorage.getItem('key'),
            data: data,
            success: function (response) {
                swal(
                    'Profile saved successfully.',
                    'Your personal details have been successfully updated.',
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