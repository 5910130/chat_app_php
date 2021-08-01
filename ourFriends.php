<?php
session_start();
require('header.php');

$conn = mysqli_connect('localhost', 'root', '', 'chat');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM `friends` WHERE (`senderId` IN (" . $_SESSION['userdata']['id'] . ") OR  `receiverId` IN (" . $_SESSION['userdata']['id'] . ")) and status='Accept' ";
$result = mysqli_query($conn, $sql);
$friendList = '';
while ($row = mysqli_fetch_array($result)) {
    if ($_SESSION['userdata']['id'] == $row['senderId']) {
        $friendList .= $row['receiverId'] . ',';
    } else {
        $friendList .= $row['senderId'] . ',';
    }
}

$friendList = trim($friendList, ',');

if (!$friendList) {
    $friendList = 0;
}

$sql = "SELECT * FROM `user_details` WHERE `id` IN (" . $friendList . ")";
$result = mysqli_query($conn, $sql);

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
                            <tr style="text-align:center">
                                <th>Full Name</th>
                                <th>Mobile Number</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <?php
                        while ($row = mysqli_fetch_array($result)) {
                            echo '
                        <tr  style="text-align:center">
                            <td>' . $row['fullName'] . '</td>
                            <td>' . $row['mobileNumber'] . '</td>
                            <td>' . $row['email'] . '</td>';
                            echo '<td><button id="chatButton" data-toggle="modal" data-target="#myModal" class="' . $row['id'] . '">Chat</button></td>';
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
                <h4 class="modal-title"> Hi <?php echo $_SESSION['userdata']['fullName']; ?></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action="#" method="POST" id="myform">
                <div class="modal-body" id="chat_history" style="height:400px; overflow-y:scroll; overflow-x:hidden;">
                </div>
                <input type="hidden" id="model_id" name="model_id">
                <input type="hidden" name="operation" value="sendchat">
                <div class="modal-footer">
                    <input type="text" class="form-control" value="" name="chatMessage" id="chatMsg" required>
                    <button type="button" class="btn btn-success send_btn">Send</button>
                    </from>
                </div>
        </div>
    </div>
</div>

<script>
    // $(document).ready(function(){

    // $("#myform").validate({
    //    rules: {
    //     chatMessage: "required"
    //    },
    //    messages: {
    //     chatMessage: "Please Enter Message"

    //    }
    // })
    // })

    $(document).on("click", "#chatButton", function(e) {
        e.preventDefault();
        toUser = $(this).prop('class');
        //alert(toUser);
        $("#model_id").val(toUser);
        $.ajax({
            type: "POST",
            url: "insert_chat.php",
            data: {
                toUser: toUser
            },
            success: function(data) {
                $("#chat_history").html(data);
            }
        });
    });

    $(document).on("click", ".send_btn", function(e) {
        e.preventDefault();
        var msg = document.getElementById("chatMsg").value
        if (!msg) {
            alert("Please enter message")
            return
        }
        $.ajax({
            type: "POST",
            url: "operation.php",
            cache: false,
            data: $('#myform').serialize(),
            success: function(html) {
                if (html == 1) {

        $.ajax({
            type: "POST",
            url: "insert_chat.php",
            data: {
                toUser: toUser
            },
            success: function(data)
             {
               $("#chat_history").html(data);
             }
        });
                $('#myform').trigger("reset");
                }
            }
        });
    });
</script>
<?php
require('footer.php');
?>