$(function () {
  $("#password-form").submit(function (
    event) {
    event.preventDefault();
    var data = $(this).serialize();
    $.ajax({
      type: 'POST',
      url: localStorage.getItem(
          'api') +
        '/v1/password.php?task=force_change_password',
      data: data,
      statusCode: {
        401: function () {
          swal("Unauthorized Access.",
            "Your old password is incorrect. Please try again.",
            "error");
        },
        404: function () {
          swal("Unauthorized Access.",
            "Your account doesn't exist.",
            "error");
        },
        400: function () {
          swal("Password Mismatch.",
            "Passwords do not match. Please try again.",
            "error");
        }
      },
      success: function (response) {
        swal({
          title: "Password saved successfully.",
          text: "Password has been reset. Redirecting to sign in...",
          icon: "success",
          timer: 2000,
          button: false,
          closeOnClickOutside: false
        }).then(function () {
          window.location.href =
            "/index.php";
        });
      },
      error: function (status) {
        swal('Service Unavailable',
          'Unable to establish connection with the server.',
          'error');
      }
    });
  });
});