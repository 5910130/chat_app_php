
<div class="modal inmodal" id="addModel" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated fadeIn">
            <form id="form" method="post"  class="form-horizontal">
                <input id='putmethod' type='hidden' name='_method' value='PUT'>
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <p><b>Branch Company Profile</b></p>
                </div>
                <div class="modal-body">  
                    <!--name,display and dropdown code row-->
                    <div class="form-group">
                        <div class="row">
                                <div class="col-sm-12"> 
                                    
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="text" name="name" title="Company Name"  id="branch_name" placeholder="Company Name" class="form-control" autocomplete="off" required>
                                </div>                      
                        </div><br>
                        <!--address line of different row-->
                        <div class="row">
                                <div class="col-sm-6">
                                    <input type="text" name="alias" id="branch_alias"  placeholder="Display Name" title="Display Name" class="form-control" autocomplete="off" required>
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" name="address_line1" id="branch_address1" placeholder="Address Line1" title="Address Line1" maxlength="45" class="form-control" autocomplete="off" required>
                                </div>
                        </div><br>
                        <!--address line row-->
                        <div class="row">
                                <div class="col-sm-6">
                                    <input type="text" name="address_line2" id="branch_address2" placeholder="Address Line2" title="Address Line2" maxlength="45" class="form-control" autocomplete="off" required >
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" name="address_line3" id="branch_address3" placeholder="Address Line3" title="Address Line3" maxlength="45" class="form-control" autocomplete="off" required>
                                </div>
                        </div><br>
                        <div class="row">
                                <div class="col-sm-6">
                                    <input type="text" name="more_line1" id="branch_line1" placeholder="More Line1" title="More Line1" maxlength="45" class="form-control" autocomplete="off" required >
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" name="more_line2" id="branch_line2" placeholder="More Line2" title="More Line2" maxlength="45" class="form-control" autocomplete="off" required >
                                </div>
                        </div><br>
                        <!--country,state and pin code row-->
                        <div class="row">
                                <div class="col-sm-5">
                                    <select name="country" id="branch_country" title="Select Country" class="form-control" required>
                                        <option value="">Select Country</option>
                                        <option value="1">India</option>
                                    </select>  
                                </div>      
                                <div class="col-sm-4">
                                    
                                    <select name="state" id="branch_state" title="Select State" class="form-control" required>
                                        <option value="">Select State</option>
                                        <option value="1">Haryana</option>
                                        <option value="2">Himachal</option>
                                        <option value="3">Delhi</option>
                                        <option value="4">Gujrat</option>
                                        <option value="5">TamilNadu</option>
                                        <option value="6">Uttarakhand</option>
                                        <option value="7">Maharashtra</option>
                                    </select>  
                                </div> 
                                <div class="col-sm-3">
                                    <input type="text" name="district" id="branch_district"  placeholder="District" title="District" class="form-control" autocomplete="off" required>  
                                </div> 
                                
                        </div><br>
                    
                          <div class="row">
                                <div class="col-sm-4">
                                    <input type="text" name="pincode" id="branch_pincode"  placeholder="Pincode" title="Pincode" class="form-control" autocomplete="off" required>  
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" name="contact_person" id="branch_contact" placeholder="Contact Person" title="Contact Person" class="form-control" autocomplete="off" required/>
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" name="mobile" id="branch_mobile" placeholder="Mobile" title="Mobile" class="form-control"  autocomplete="off" required/>
                                </div>        
                           </div><br>

                               <div class="row">
                               <div class="col-sm-6">
                                    <input type="text" name="email" id="branch_email" placeholder="Email" title="Email" class="form-control" autocomplete="off" required/>
                                </div>    
                                <div class="col-sm-6">
                                    <input type="text" name="department" id="branch_department" placeholder="Department" title="Department" class="form-control" autocomplete="off" required>
                                </div> 
                               </div>
                    </div>
                </div>
                <!--we are create the button-->
                <div class="modal-footer">
                    <input type="submit" class="btn btn-info btn-xs"  value="Save"/>
                    <input type="submit" class="btn btn-info btn-xs"  value="Save & Continue"/>
                </div>
            </form>
        </div>
    </div>
</div>
