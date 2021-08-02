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
    <title>Registration</title>
  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      
      <div class="login-box" style="min-height: 630px;">
        <form class="login-form" id="registrationForm">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>Registration Form</h3>
          <input type="hidden" name="operation" value="registration">
          
          <div class="form-group">
            <label class="control-label">First Name</label>
            <input class="form-control" type="text" placeholder="First Name" name="firstName" autofocus >
          </div>
          <div class="form-group">
            <label class="control-label">Last Name</label>
            <input class="form-control" type="text" placeholder="Last Name" name="lastName" autofocus >
          </div>
          <div class="form-group">
            <label class="control-label">Mobile Number</label>
            <input class="form-control" type="text" placeholder="Mobile Number" name="mobileNumber">
          </div>
          <div class="form-group">
            <label class="control-label">Email Id</label>
            <input class="form-control" type="text" placeholder="Email Id" name="email">
          </div>
          <div class="form-group">
            <label class="control-label">Password</label>
            <input class="form-control" type="password" placeholder="Password" name="password">
          </div>
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block" id="submitButton"><i class="fa fa-sign-in fa-lg fa-fw"></i>Submit</button>
          </div>
            <br>
          <div class="form-group btn-container">
            <button class="btn btn-danger btn-block" id="loginButton" ><i class="fa fa-sign-in fa-lg fa-fw"></i>Login</button>
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
    $(document).on("click","#submitButton",function(e) 
    {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "operation.php",
            cache: false,
            data: $('#registrationForm').serialize(),
            success: function(html)
            {
                if(html==1)
                {
                    alert("New record created successfully");
                    $('#registrationForm').trigger("reset");
                }
            }
        });
    });

    $(document).on("click","#loginButton",function(e) 
    {
        e.preventDefault();
        window.location = 'login.php';
    });
    </script>
    
  </body>
</html>