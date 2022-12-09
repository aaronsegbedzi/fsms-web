$(function () {

  // Set layout values globally (User firstname and lastname).
  $('.firstName').text(localStorage.getItem(
    'firstName'));
  $('.lastName').text(localStorage.getItem(
    'lastName'));

  // Check if user token is still valid.
  $.ajax({
    type: 'GET',
    url: localStorage.getItem('api') +
      '/v1/auth.php?token=' +
      localStorage.getItem('key'),
    statusCode: {
      401: function () {
        swal({
          title: "Session has expired. Redirecting to sign in...",
          text: " ",
          icon: "error",
          timer: 2000,
          button: false,
          closeOnClickOutside: false
        }).then(function () {
          window.location.href =
            "/index.php";
        });
      }
    }
  });

});

  // Logout button session destroy.
  $('#btn-signout').on('click',
    function () {
      // Check if user token is still valid.
      $.ajax({
        type: 'GET',
        url: '/include/session.php',
        success: function (response) {
          swal({
            title: "Goodbye!",
            text: "Signing out...Have a nice day!",
            icon: "success",
            timer: 2000,
            button: false,
            closeOnClickOutside: false
          }).then(function () {

            // Clear local storage items in browser.
            localStorage.clear();

            // redirect to sign in page.
            window.location = "/index.php";

          });
        }
      });
    });