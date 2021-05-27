$(document).ready(function () {
  $('#register_form').submit(function (event) {
    event.preventDefault();
    var name = $('#reg-username').val();
    var email = $('#reg-email').val();
    var password = $('#reg-password').val();
    var confirmPassword = $('#reg-conpassword').val();
    var submit = $('#reg-submitbtn').val();
    $('.error-msg-credentials').load('register.php', {
      name: name,
      email: email,
      password: password,
      confirmPassword: confirmPassword,
      submit: submit,
    });
  });
});
