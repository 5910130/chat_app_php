<?php
session_start();
require('header.php');

$conn=mysqli_connect('localhost','root','','curd');
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM user_details";
$result = mysqli_query($conn,$sql);

?>

 <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Registration</h1>
        </div>
        <div class="ibox-tools">
						<?php include('addModel.php'); ?>
            <?php include('updateModel.php'); ?>
            <button type="button" id="newbutton" class="btn btn-primary" data-toggle="modal" data-target="#addModal"> Add</button>
		  	</div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Table</h3>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr  style="text-align:center">
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Mobile No</th>
                    <th>Email</th>
                    <th>Action</th>                    
                  </tr>
                </thead>
                <?php
                    while( $row = mysqli_fetch_array($result))
                    {
                        echo 
                        "<tr style='text-align:center'>
                            <td>".$row['firstName']."</td>
                            <td>".$row['lastName']."</td>
                            <td>".$row['mobileNumber']."</td>
                            <td>".$row['email']."</td>
                            <td><button class='btn btn-primary btn-xs editButton' data-id=".$row['id']." data-toggle='modal' data-target='#updateModal' > <i class='fa fa-edit'></i></button>
                            <button class='btn btn-danger btn-xs delete' data-id=".$row["id"]."> <i class='fa fa-trash '></i></button>
                            </td>
                        </tr>";
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
   	$(document).ready(function(){ 
        $("#newbutton").click(function (){
         $('#myform').trigger("reset");
     });
   });

  //edit operation
    $(document).on("click",".editButton",function(e) 
    {
        e.preventDefault();
        edit_id = $(this).data('id');
        operation = 'editOperation';
        $.ajax({
            type: "POST",
            url: "operation.php",
            cache: false,
            data:{operation:operation,id:edit_id},
            dataType:"json",
            success: function(data)
            {
                 $('#firstNameU').val(data.firstName);
	               $('#lastNameU').val(data.lastName);
	               $('#mobileNumberU').val(data.mobileNumber);
	               $('#emailU').val(data.email);
	               $('#passwordU').val(data.password);
	               $('#modelUpdate_id').val(data.id);
                 $('#updateModal').modal('show'); 
            }
        });
    });

    
//delete operation
     $(document).on('click', '.delete', function(){ 
	       if(confirm('Do You Really Delete The Record ?')){
         var del_id= $(this).data('id');
         operation = 'deleteRow';
		     var element= this;
      $.ajax({
        type:'POST',
        url:'operation.php',
        data:{operation:operation,id:del_id},
        success: function(data)
        {
             if(data == 1)
             {
                alert('Delete record successfully.');
                $(element).closest('tr').remove();
             }else
             {
                 alert('Delete record not successfully.');
             }
         }

       });
	   }
  });
</script>

<?php
require('footer.php');

?>