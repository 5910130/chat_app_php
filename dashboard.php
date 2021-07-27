<?php session_start();   ?>
<?php include('theme/header.php');   ?>

<html>  
    <head>  
    <title>Chat Application using PHP Ajax Jquery</title>  
    </head>  
    <body>  
    <div class="container">
   <br />
   
   <h3 align="center">Chat Application</a></h3><br />
   <br />
   
   <div class="table-responsive">
    <h4 align="center">Online User</h4>
    <h1 align="right">Hi &nbsp;<?php echo $_SESSION['fullname']; ?> <a href="logout.php" class="btn btn-primary">Logout</a></h1>
    
   </div>
  </div>
    </body>  
</html> 

<?php include('theme/footer.php');   ?>
