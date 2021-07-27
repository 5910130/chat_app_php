<?php   
include 'connect.php'; 
$sql = "insert into userdetail ( fullname,username,password,mobileNumber) values ( '".$_POST['fullname']."' , '".$_POST['username']."' , '".$_POST['password']."', '".$_POST['mobileNumber']."')";
if ($conn->query($sql)) 
{
	echo "Data Inserted Successfully ";
} 
else 
{
	echo "Data Not Inserted Successfully";
}
?>