
<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" id="sucess">
        <h5 class="modal-title" id="exampleModalLabel">Registration Form</h5>
         <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      </div>
      <div class="modal-body">
	  <form id="myform">
      <input type="hidden" name="operation" value="insert">
      
       <div class="form-group">
            <label class="control-label">First Name</label>
            <input class="form-control" type="text" placeholder="First Name" name="firstName" id="firstName" autofocus >
          </div>
          <div class="form-group">
            <label class="control-label">Last Name</label>
            <input class="form-control" type="text" placeholder="Last Name" name="lastName" id="lastName" autofocus >
          </div>
          <div class="form-group">
            <label class="control-label">Father Name</label>
            <input class="form-control" type="text" placeholder="Father Name" name="fatherName" id="fatherName">
          </div>
          <div class="form-group">
            <label class="control-label">Mobile Number</label>
            <input class="form-control" type="text" placeholder="Mobile Number" name="mobileNumber" id="mobileNumber">
          </div>
          <div class="form-group">
            <label class="control-label">Email Id</label>
            <input class="form-control" type="text" placeholder="Email Id" name="email" id="email">
          </div>			
      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-primary" id="submitButton">
	  </form>
      </div>
    </div>
  </div>
</div>


<script>
    $(document).on("click","#submitButton",function(e) 
    {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "operation.php",
            cache: false,
            data: $('#myform').serialize(),
            success: function(html)
            {
                if(html==1)
                {
                    alert("New record created successfully");
                    $('#myform').trigger("reset");
                }
            }
        });
    });

     $(document).on("click","#loginButton",function(e) 
    {
       e.preventDefault();
         window.location = 'login.php';
     });
    </script>
           
	