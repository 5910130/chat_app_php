<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "chating";


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn)
{
die('connection error create;'.mysqli_connect_error());
}
?>