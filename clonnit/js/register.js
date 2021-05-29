$(document).ready(function () {
  $('#registerbtn').click(function () {
    var username = $('#reg-username').val();
    var email = $('#reg-email').val();
    var password = $('#reg-password').val();
    var confirmPassword = $('#reg-conpassword').val();

    var data =
      'username=' +
      username +
      '&email=' +
      email +
      '&password=' +
      password +
      '&confirmPassword=' +
      confirmPassword;

    $.ajax({
      method: 'POST',
      url: 'reg.php?',
      data: data,
      success: function (data) {
        $('#reg-error').html(data);
      },
    });
  });
});
