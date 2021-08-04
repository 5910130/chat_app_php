
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <title>Blank Page - Vali Admin</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('theme_v1/css/main.css') }}">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
     <!-- Essential javascripts for application to work-->
    <script src="{{ URL::asset('theme_v1/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ URL::asset('theme_v1/js/popper.min.js') }}"></script>
    <script src="{{ URL::asset('theme_v1/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('theme_v1/js/main.js') }}"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="{{ URL::asset('theme_v1/js/plugins/pace.min.js') }}"></script>
  </head>
  <body class="app sidebar-mini">
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="index.html">Curd </a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- Navbar Right Menu-->
      <ul class="app-nav">
        
        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
            <li><a class="dropdown-item" href="{{url('/logout')}}"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
          </ul>
        </li>
      </ul>
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="{{ URL::asset('theme_v1/images/user.jpg')}}" style="width:50px;" alt="User Image">
        <div>
          <p class="app-sidebar__user-name"></p>
          <p class="app-sidebar__user-designation">Active</p>
        </div>
      </div>
      <ul class="app-menu">
        <li><a class="app-menu__item" href="{{url('/branchcompanyprofiles')}}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
        <!-- <li><a class="app-menu__item" href=""><i class="app-menu__icon fa fa-file-text"></i><span class="app-menu__label">Branch Company</span></a></li> -->
      </ul>
    </aside>

    <div id="page-wrapper">
      @yield('content')
</div>