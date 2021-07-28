<?php
session_start();

$conn=mysqli_connect('localhost','root','','chat');
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
            $sql = "INSERT INTO `user_details`( `fullname`, `mobileNumber`, `email`, `password`) VALUES ('$fullName', '$mobileNumber', '$email','$password')";
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
        case 'sendRequest':
        {
            $userId = $_POST['userId'];
            $sql = "SELECT * FROM `friends` WHERE `senderId`='".$_SESSION['userdata']['id']."' AND `receiverId`='$userId'";
            $result = $conn->query($sql);
            $row = $result -> fetch_assoc();
            if ($row) 
            {
                $sql = "UPDATE `friends` SET `status`='Pending' WHERE `senderId`='".$_SESSION['userdata']['id']."' AND `receiverId`='$userId'";
            } 
            else 
            {
                $sql = "INSERT INTO `friends`( `senderId`, `receiverId`, `status`) VALUES ('".$_SESSION['userdata']['id']."', '$userId', 'Pending')";
            }

            if ($conn->query($sql) === TRUE) 
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

        case 'cancelRequest':
        {
            $userId = $_POST['userId'];
            $sql = "UPDATE `friends` SET `status`='Cancel' WHERE `senderId`='".$_SESSION['userdata']['id']."' AND `receiverId`='$userId'";
            if ($conn->query($sql) === TRUE) 
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

        case 'acceptRequest':
        {
            $userId = $_POST['userId'];
            $sql = "UPDATE `friends` SET `status`='Accept' WHERE `receiverId`='".$_SESSION['userdata']['id']."' AND `senderId`='$userId'";
            if ($conn->query($sql) === TRUE) 
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
        case 'rejectRequest':
        {
            $userId = $_POST['userId'];
            $sql = "UPDATE `friends` SET `status`='Reject' WHERE `receiverId`='".$_SESSION['userdata']['id']."' AND `senderId`='$userId'";
            if ($conn->query($sql) === TRUE) 
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