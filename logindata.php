<?php
include 'connect.php'; 
session_start();
$username=$_POST['username'];
$password=$_POST['password'];
$query="select * from userdetail where username='$username' and password='$password'";
$login= mysqli_query($conn,$query);
if($row=mysqli_fetch_array($login))
{
    $_SESSION['fullname']=$row['fullname'];
    $_SESSION['username']=$row['username'];
    $_SESSION['password']=$row['password'];
    $_SESSION['mobileNumber']=$row['mobileNumber'];
    echo "success";
}
else
{
    echo "fail";
}
?>
