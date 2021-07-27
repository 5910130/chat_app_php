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
    <title>Register - Vali Admin</title>
  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      
      <div class="login-box" style="min-height: 516px;">
        <form class="login-form" id="myform" action="">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>Register</h3>
          <div class="form-group">
            <label class="control-label">Full Name</label>
            <input class="form-control" type="text" placeholder="fullname" id="fullname" autocomplete="off">
          </div>
          <div class="form-group">
            <label class="control-label">Email</label>
            <input class="form-control" type="text" placeholder="username" id="username" autocomplete="off">
          </div>
          <div class="form-group">
            <label class="control-label">Password</label>
            <input class="form-control" type="password" id="password" placeholder="Password" autocomplete="off">
          </div>
          <div class="form-group">
          <label class="control-label">Mobile Number</label>
          <input class="form-control" type="text" id="mobileNumber" placeholder="mobileNumber" autocomplete="off">
        </div>
          <div class="form-group btn-container">
            <button class="btn btn-primary" id="save"><i class="fa fa-sign-in fa-sm fa-fw"></i>Register</button>&nbsp;&nbsp;<span><a class="btn btn-primary" href="login.php"><i class="fa fa-sign-in fa-sm fa-fw"></i>Login</a></span>
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
    <script type="text/javascript">
  
    </script>
  </body>
</html>
<script>
	$(document).ready(function(){
			$('#save').on('click', function() {
			var	fullname = $('#fullname').val();
      var	username = $('#username').val();
			var	password = $('#password').val();
			var	mobileNumber = $('#mobileNumber').val();
			$.ajax({
			    type: "POST",
			    url: "registerdata.php",
			    data: { fullname :fullname ,username:username, password:password, mobileNumber:mobileNumber},	
			    success: function(result)
          {
           
				  }
			});
		});
	});
</script>
