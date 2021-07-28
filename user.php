<?php
session_start();
require('header.php');

$conn=mysqli_connect('localhost','root','','chat');
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
}



$sql = "SELECT * FROM `friends` WHERE `senderId` IN (".$_SESSION['userdata']['id'].")";
$result = mysqli_query($conn,$sql);
$friendData = [];
while( $row = mysqli_fetch_array($result))
{
    $friendData[$row['receiverId']] = $row['status'];
}


$sql = "SELECT * FROM `friends` WHERE `receiverId` IN (".$_SESSION['userdata']['id'].") and status in ('Accept','Reject')";
$result = mysqli_query($conn,$sql);
$friendList = '';
while( $row = mysqli_fetch_array($result))
{
    $friendData[$row['senderId']] = $row['status'];
}




$sql = "SELECT * FROM `user_details` WHERE `id` NOT IN (".$_SESSION['userdata']['id'].")";
$result = mysqli_query($conn,$sql);

?>

 <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Users</h1>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">User Table</h3>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr  style="text-align:center">
                    <th>Full Name</th>
                    <th>Mobile Number</th>
                    <th>Email</th>
                    <th>Action</th>                    
                  </tr>
                </thead>
                <?php
                    while( $row = mysqli_fetch_array($result))
                    {
                        echo '
                        <tr  style="text-align:center">
                            <td>'.$row['fullName'].'</td>
                            <td>'.$row['mobileNumber'].'</td>
                            <td>'.$row['email'].'</td>';

                         if(isset($friendData[$row['id']]))
                         {
                            switch($friendData[$row['id']])
                            {
                                case 'Pending' :
                                {
                                    echo '<td><button id="requestButton" class="'.$row['id'].'">Cancel Request</button></td>';
                                    break;
                                }
                                case 'Accept' :
                                {
                                    echo '<td>Accept</td>';
                                    break;
                                }
                                case 'Reject' :
                                {
                                    echo '<td>Reject</td>';
                                    break;
                                }
                                default :
                                {
                                    echo '<td><button id="requestButton" class="'.$row['id'].'">Send Request</button></td>';
                                    break;
                                }

                            }
                         }else
                         {
                            echo '<td><button id="requestButton" class="'.$row['id'].'">Send Request</button></td>';
                         }  
                            
                        echo '</tr>';
                    }
                ?>
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </main>
    <script>
    $(document).on("click","#requestButton",function(e) 
    {
        e.preventDefault();
        userId = $(this).prop('class');
        if($(this).html()=='Send Request')
        {
            operation = 'sendRequest';
        }else
        {
            operation = 'cancelRequest';
        }
        $.ajax({
            type: "POST",
            url: "operation.php",
            cache: false,
            data: {operation:operation,userId:userId},
            dataType: 'json',
            context: this,
            success: function(html)
            {
                if($(this).html()=='Send Request')
                {
                    
                    if(html==1)
                    {
                        alert('Friend request send successfully.');
                        $(this).html('Cancel Request');
                    }else
                    {
                        alert('Friend request not sent.');
                    }
                }else
                {
                    if(html==1)
                    {
                        alert('Friend request cancel successfully.');
                        $(this).html('Send Request');
                    }else
                    {
                        alert('Friend request not cancel.');
                    }
                }
            }
        });
    });
       

    </script>

<?php
require('footer.php');

?>