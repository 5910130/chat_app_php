
<!-- Modal -->
<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" id="sucess">
        <h5 class="modal-title" id="exampleModalLabel">Registration Form</h5>
         <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      </div>
      <div class="modal-body">
	  <form id="updateform">
      <input type="hidden" name="operation" value="update"> 
      
       <div class="form-group">
            <label class="control-label">First Name</label>
            <input class="form-control" type="text" placeholder="First Name" name="firstNameU" id="firstNameU" autofocus >
            <input type="hidden" name="modelUpdate_id" id="modelUpdate_id" >
          </div>
          <div class="form-group">
            <label class="control-label">Last Name</label>
            <input class="form-control" type="text" placeholder="Last Name" name="lastNameU" id="lastNameU" autofocus >
          </div>
          <div class="form-group">
            <label class="control-label">Mobile Number</label>
            <input class="form-control" type="text" placeholder="Mobile Number" name="mobileNumberU" id="mobileNumberU">
          </div>
          <div class="form-group">
            <label class="control-label">Email Id</label>
            <input class="form-control" type="text" placeholder="Email Id" name="emailU" id="emailU">
          </div>
          <div class="form-group">
            <label class="control-label">Password</label>
            <input class="form-control" type="password" placeholder="Password" name="passwordU" id="passwordU">
          </div>			
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-primary" data-bs-dismiss="modal" id="update_btn">Update</button>
	  </form>
      </div>
    </div>
  </div>
</div>

<script>
    //update operation
    $(document).on("click","#update_btn",function(e) 
    {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "operation.php",
            cache: false,
            data: $('#updateform').serialize(),
            success: function(html)
            {
                if(html==1)
                {
                    alert("New record created successfully");
                    $('#updateform').trigger("reset");
                }
            }
        });
    });
    </script>
           
	