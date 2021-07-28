<?php
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Login - Vali Admin</title>
  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      
      <div class="login-box">
        <form class="login-form" id="loginForm">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>SIGN IN</h3>
          <input type="hidden" name="operation" value="login">
          <div class="form-group">
            <label class="control-label">USERNAME</label>
            <input class="form-control" type="text" name="email" placeholder="Email" autofocus>
          </div>
          <div class="form-group">
            <label class="control-label">PASSWORD</label>
            <input class="form-control" type="password" name="password" placeholder="Password">
          </div>
          
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block" id="loginButton"><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN IN</button>
          </div>
        </form>
        
      </div>
    </section>
    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <script>
    $(document).on("click","#loginButton",function(e) 
    {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "operation.php",
            cache: false,
            data: $('#loginForm').serialize(),
            success: function(html)
            {
                if(html==1)
                {
                    window.location = 'index.php';
                }else
                {
                    alert('Invalid username and password.')
                }
            }
        });
    });

    
    </script>
  </body>
</html>