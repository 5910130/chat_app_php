<?php
session_start();
require('header.php');

$conn=mysqli_connect('localhost','root','','chat');
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM `friends` WHERE (`senderId` IN (".$_SESSION['userdata']['id'].") OR  `receiverId` IN (".$_SESSION['userdata']['id'].")) and status='Accept' ";
$result = mysqli_query($conn,$sql);
$friendList = '';
while( $row = mysqli_fetch_array($result))
{
    if($_SESSION['userdata']['id']==$row['senderId'])
    {
        $friendList .= $row['receiverId'].',';
    }else
    {
        $friendList .= $row['senderId'].',';
        
    }
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
          <h1><i class="fa fa-th-list"></i> Our Friends</h1>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Friends Table</h3>
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
                            echo '<td><button id="chatButton" data-toggle="modal" data-target="#myModal" class="'.$row['id'].'">Chat</button></td>';
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
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Perveen Kumar</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    
                </div>
                <div class="modal-body">
                    <p style="text-align:left;padding-right: 40%;">Some text in the modal .Some text in the modal .Some text in the modal .Some text in the modal .Some text in the modal .Some text in the modal .</p>
                    <p style="text-align:right;padding-left: 40%;">Some text in the modal.</p>
                    <p style="text-align:left;padding-right: 40%;">Some text in the modal.</p>
                    <p style="text-align:right;padding-left: 40%;">Some text in the modal.</p>
                </div>
                <div class="modal-footer">
                    <input type="text" class="form-control" id="chatMsg">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Send</button>
                </div>
            </div>

        </div>
    </div>
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