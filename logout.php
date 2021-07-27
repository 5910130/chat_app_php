<?php
session_start();
include 'connect.php'; 
	session_destroy();
	unset($_SESSION['username']);
    unset($_SESSION['password']);
	header('Location:login.php');
exit();
?>