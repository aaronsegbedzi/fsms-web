$(function () {
  $("#forgot-password-form").submit(
    function (event) {
      event.preventDefault();
      var data = $(this).serialize();
      $.ajax({
        type: 'POST',
        url: localStorage.getItem(
            'api') +
          '/v1/password.php?task=forgot_password',
        data: data,
        statusCode: {
          401: function () {
            swal("Unauthorized Access.",
              "Your security details are incorrect.",
              "error");
          },
          404: function () {
            swal("Unauthorized Access.",
              "Your account doesn't exist.",
              "error");
          }
        },
        success: function (response) {
          swal({
            title: "Password has been successfully reset.",
            text: "Your temporary password: " +
              response.password +
              ", please use this in your next login attempt.",
            icon: "success",
            button: 'Sign In',
            closeOnClickOutside: false
          }).then(function () {
            window.location.href =
              "/index.php";
          });
        },
        error: function (status) {
          swal('Service Unavailable',
            'Unable to establish connection with server.',
            'error');
        }
      });
    });
});