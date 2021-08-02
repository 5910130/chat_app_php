<?php
session_start();

$conn=mysqli_connect('localhost','root','','curd');
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
}
//print_r($_POST);
if(isset($_POST['operation']))
{
    switch($_POST['operation'])
    {
        case 'insert':
        {

            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $mobileNumber = $_POST['mobileNumber'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $sql = "INSERT INTO `user_details`( `firstName`,`lastName`, `mobileNumber`, `email`, `password`) VALUES ('$firstName','$lastName', '$mobileNumber', '$email','$password')";
            if ($conn->query($sql) === TRUE) 
            {
               echo 1;
            } 
            else 
            {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $conn->close();

            break;
        }
        case 'login':
        {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $sql = "SELECT * FROM `user_details` WHERE `email`='$email' AND `password`='$password'";
            $result = $conn->query($sql);
            $row = $result -> fetch_assoc();
            if ($row) 
            {
                $_SESSION['userdata'] = $row;
                //echo $_SESSION['userdata']['email'];
                echo 1;
            } 
            else 
            {
                session_destroy();
                echo 0;
            }

            $conn->close();

            break;
        }
        
        case 'editOperation':
            {
    
                $id=$_POST['id'];
                $query='select * from user_details where id='.$id;
                $data=mysqli_query($conn,$query);
                $result=mysqli_fetch_array($data);
                echo json_encode($result); 

                $conn->close();

                break;
            }

        case 'update':
            {
                $id = $_POST['modelUpdate_id'];             
                $firstName = $_POST['firstNameU'];
                $lastName = $_POST['lastNameU'];
                $mobileNumber = $_POST['mobileNumberU'];
                $email = $_POST['emailU'];
                $password = $_POST['passwordU'];
                $sql = "UPDATE `user_details` SET `firstName`='$firstName',`lastName`='$lastName',`mobileNumber`='$mobileNumber',`email`='$email',`password`='$password' WHERE id =".$id;
                if ($conn->query($sql) === TRUE) 
                {
                echo 1;
                } 
                else 
                {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
                $conn->close();

                break;
            }
        
        case 'deleteRow':
            {
    
                $id=$_POST['id'];
                $sql = 'Delete from user_details WHERE id='.$id;
                if(mysqli_query($conn, $sql))
                {
                    echo 1;
                }
                else
                {
                    echo 0;
                }
    
                $conn->close();
    
                break;
            }
    }
}


?>