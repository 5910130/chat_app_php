
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('theme_v1/css/main.css')}}">
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
        <form class="login-form" method="POST" action="/login">
        {{ csrf_field() }}
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>SIGN IN</h3>
          <div class="form-group">
            <label class="control-label">USERNAME</label>
            <input class="form-control" type="text" name="email" placeholder="Email" autofocus>
            @if ($errors->has('email'))
               <span class="error">{{ $errors->first('email') }}</span>
           @endif
          </div>
          <div class="form-group">
            <label class="control-label">PASSWORD</label>
            <input class="form-control" type="password" name="password" placeholder="Password">
            @if ($errors->has('password'))
             <span class="error">{{ $errors->first('password') }}</span>
            @endif
          </div>
          
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block" id="loginButton"><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN IN</button>
          </div>
          <br>
          <div class="form-group btn-container">
            <a href="{{url('/register')}}" class="btn btn-danger btn-block" id="submitButton" ><i class="fa fa-sign-in fa-lg fa-fw"></i>Registration</a>
          </div>
        </form>
      </div>
    </section>
    <!-- Essential javascripts for application to work-->
    <script src="{{ URL::asset('theme_v1/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{ URL::asset('theme_v1/js/popper.min.js')}}"></script>
    <script src="{{ URL::asset('theme_v1/js/bootstrap.min.js')}}"></script>
    <script src="{{ URL::asset('theme_v1/js/main.js')}}"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="{{ URL::asset('theme_v1/js/plugins/pace.min.js')}}"></script> 
  </body>
</html>