<?php require 'include/header.php'; ?>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Vaibhav </b>Leads</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form class="loginForm" method="post">
      <div class="form-group has-feedback" style="position:inherit !important;">
        <input type="text" class="form-control" id="login" placeholder="Login ID">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback" style="position:inherit !important;">
        <input type="password" class="form-control" id="password" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label style="padding-left: 20px !important;">
              <input type="checkbox"> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat" name="login_button" id="login_button"><span class="glyphicon glyphicon-log-in"></span>  &nbsp;&nbsp;&nbsp; Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
  </div>
</div>
  <!-- /.login-box-body -->

<!-- /.login-box -->
</body>
<script>
$(function () {

$(document).ready(function () 
{
    $("#login").focus();
    $("#login, #password" ).blur(function()
    {
      if($(this).val().length == 0)
      {
        $(this).next('#span_field_error').remove();
        $(this).after('<span id="span_field_error" class="error error-keyup-1">This field is required.</span>');
        $(this).focus();
      } 
      else
      {
        $(this).next('#span_field_error').remove();
      }
    });
});

  $('#login_button').on('click', function (e) 
  {
    e.preventDefault();
    var login = $("#login").val();
    var password = $("#password").val();
    if($("#login").val().length == 0 || $("#password").val().length == 0)
    {
      $("#password").next('#span_field_error').remove();
      $("#password").after('<span id="span_field_error" class="error error-keyup-1">All fields are required.</span>');
    }
    else
    {
      $("#password").next('#span_field_error').remove();
      var data = {
                  login: login,
                  password: password
                };    
      $.ajax(
      {
            type: 'post',
            url: 'auth.php',
            data: data,
            beforeSend: function()
            {
              $("#login_button").html('<span class="glyphicon glyphicon-transfer"></span>   sending ...');
            },
            success: function (response) 
            {             
              if(response=="ok")
              {
                $("#login_button").html('<img src="dist/img/ajax-loader.gif" />   Signing In ...');
                setTimeout(' window.location.href = "home.php"; ',000);
              } 
              else
              {
                $('#span_login_error').remove();
                $('#password').after('<span id="span_login_error" class="error error-keyup-1">Sorry, Your credentials do not match!</span>');
                $("#login_button").html('<span class="glyphicon glyphicon-log-in"></span>   Sign In');
              }
            },
            error: function(response)
            {
              $('#span_login_error').remove();
              $('#password').after('<span id="span_login_error" class="error error-keyup-1">Sorry, Your credentials do not match!</span>');
              $("#login_button").html('<span class="glyphicon glyphicon-log-in"></span>   Sign In');
              $("#login").focus();
              $('#password').val('');
            }
      });//end of ajax
    }
  });//end of function on click of loginSubmit button
});
</script>
