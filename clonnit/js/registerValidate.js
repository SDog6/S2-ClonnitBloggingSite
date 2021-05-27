$(document).ready(function () {
  $('#register_form').validate({
    rules: {
      username: {
        requred: true,
        minLength: 3,
        remote: {
          url: 'validatorAJAX.php',
          type: 'post',
        },
      },

      email: {
        requred: true,
        email: true,
        remote: {
          url: 'validatorAJAX.php',
          type: 'post',
        },
      },

      password: {
        requred: true,
        minLength: 8,
      },

      password_confirm: {
        required: true,
        minLength: 8,
        equalTo: '#password',
      },
    },

    messages: {
      username: {
        required: 'Please enter a username',
        minLength: 'The username must be at least 3 characters long',
        remote: 'The username is already in use by another user',
      },
      email: {
        required: 'Please enter an email address',
        email: 'Please enter a valid email address',
        remote: 'The email is already in use by another user',
      },
      password: {
        required: 'Please enter a password',
        minLength: 'The password cannot be less than 8 characters long',
      },
      password_confirm: {
        equalTo: 'The passwords must match',
      },
    },
  });
});
