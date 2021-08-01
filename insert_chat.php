<?php
session_start();
$conn=mysqli_connect('localhost','root','','chat');
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['toUser']))
 {
    //$_SESSION['toUser']=$_POST['toUser'];
        $chats ="SELECT * FROM message  WHERE (senderId = '".$_SESSION['userdata']['id']."' 
        AND receiverId = '".$_POST['toUser']."') 
        OR (senderId = '".$_POST['toUser']."' 
        AND receiverId = '".$_SESSION['userdata']['id']."') ORDER BY id ASC";
        $result = $conn->query($chats);
       // $chat = mysqli_fetch_assoc($chats);
        //print_r($chat);
        while($chat = mysqli_fetch_assoc($result))
        {
            if($chat['senderId'] == $_SESSION['userdata']['id'])
            {
              echo"<div style='text-align:right;'>
              <p style='background-color:lightblue; word-wrap:break-word; display:inline-block;
              padding:5px; border-radius:10px; max-width:250px;'>
              ".$chat['chatMessage']."
              </p>
              </div>";
            }
            else
            {
                echo"<div style='text-align:left;'>
                <p style='background-color:yellow; word-wrap:break-word; display:inline-block;
                padding:5px; border-radius:10px; max-width:250px;'>
                ".$chat['chatMessage']."
                </p>
                </div>";
            }

        }

     }
        $conn->close();


?>