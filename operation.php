<?php
session_start();

$conn=mysqli_connect('localhost','root','','curd');
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['operation']))
{
    switch($_POST['operation'])
    {
        case 'registration':
            {
                $fullName = $_POST['fullName'];
                $mobileNumber = $_POST['mobileNumber'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $sql = "INSERT INTO `users_detail`( `fullname`, `mobileNumber`, `email`, `password`) VALUES ('$fullName', '$mobileNumber', '$email','$password')";
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
            $sql = "SELECT * FROM `users_detail` WHERE `email`='$email' AND `password`='$password'";
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

        case 'insert':
            {
    
                $firstName = $_POST['firstName'];
                $lastName = $_POST['lastName'];
                $fatherName = $_POST['fatherName'];
                $mobileNumber = $_POST['mobileNumber'];
                $email = $_POST['email'];
                $sql = "INSERT INTO `student_detail`( `firstName`,`lastName`,`fatherName`,`mobileNumber`, `email`) VALUES ('$firstName','$lastName','$fatherName','$mobileNumber', '$email')";
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
        
        case 'editOperation':
            {
    
                $id=$_POST['id'];
                $query='select * from student_detail where id='.$id;
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
                $fatherName= $_POST['fatherNameU'];
                $mobileNumber = $_POST['mobileNumberU'];
                $email = $_POST['emailU'];
                $sql = "UPDATE `student_detail` SET `firstName`='$firstName',`lastName`='$lastName',`fatherName`='$fatherName',`mobileNumber`='$mobileNumber',`email`='$email' WHERE id =".$id;
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
                $sql = 'Delete from student_detail WHERE id='.$id;
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