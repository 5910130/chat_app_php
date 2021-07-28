<?php
session_start();
require('header.php');

$conn=mysqli_connect('localhost','root','','chat');
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM `friends` WHERE `receiverId` IN (".$_SESSION['userdata']['id'].") and status ='Pending'";
$result = mysqli_query($conn,$sql);
$friendList = '';
while( $row = mysqli_fetch_array($result))
{
    $friendList .= $row['senderId'].',';
}
$friendList = trim($friendList ,',');

if(!$friendList)
{
    $friendList = 0;
}

$sql = "SELECT * FROM `user_details` WHERE `id` IN (".$friendList.")";
$result = mysqli_query($conn,$sql);

?>

 <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Friend Request</h1>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Friend Request Table</h3>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr style="text-align:center">
                    <th>Full Name</th>
                    <th>Mobile Number</th>
                    <th>Email</th>
                    <th colspan=2>Action</th>                    
                  </tr>
                </thead>
                <?php
                    while( $row = mysqli_fetch_array($result))
                    {
                        echo '
                        <tr  style="text-align:center">
                            <td>'.$row['fullName'].'</td>
                            <td>'.$row['mobileNumber'].'</td>
                            <td>'.$row['email'].'</td>
                            <td><button id="acceptButton" class="'.$row['id'].'">Accept</button></td>
                            <td><button id="rejectButton" class="'.$row['id'].'">Reject</button></td>
                        </tr>';
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
    $(document).on("click","#acceptButton",function(e) 
    {
        e.preventDefault();
        userId = $(this).prop('class');
        operation = 'acceptRequest';
        $.ajax({
            type: "POST",
            url: "operation.php",
            cache: false,
            data: {operation:operation,userId:userId},
            dataType: 'json',
            context: this,
            success: function(html)
            {
                if(html==1)
                {
                    alert('Friend request accepted successfully.');
                    $(this).closest("tr").remove();
                }else
                {
                    alert('Friend request not accepted.');
                }
            }
        });
    });


    $(document).on("click","#rejectButton",function(e) 
    {
        e.preventDefault();
        userId = $(this).prop('class');
        operation = 'rejectRequest';
        $.ajax({
            type: "POST",
            url: "operation.php",
            cache: false,
            data: {operation:operation,userId:userId},
            dataType: 'json',
            context: this,
            success: function(html)
            {
                if(html==1)
                {
                    alert('Friend request rejected successfully.');
                    $(this).closest("tr").remove();
                }else
                {
                    alert('Friend request not rejected.');
                }
            }
        });
    });
       

    </script>

<?php
require('footer.php');

?>