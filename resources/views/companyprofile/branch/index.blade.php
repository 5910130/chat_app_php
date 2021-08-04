@extends('layouts.header')
@section('content')
<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i>Branch Company Profile</h1>
        </div>
        <div class="ibox-tools">
           @include('companyprofile/branch.form')
            <button type="button" id="newbutton" class="btn btn-primary" data-toggle="modal" data-target="#addModel">Add</button>
		  	</div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Branch Company</h3>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr  style="text-align:center">
                    <th>Name</th>
                    <th>Alias</th>
                    <th>Action</th>                    
                  </tr>
                </thead>
                    <tbody>
                        @foreach( $branchcompanyprofiles as  $branchcompanyprofile)

                        <tr style="text-align:center">
                            <td>{{ $branchcompanyprofile->branch_name }} </td>
                            <td>{{ $branchcompanyprofile->branch_alias }} </td>
                            <td> 
                                <button class="btn btn-primary btn-xs editButton" value="{{$branchcompanyprofile->id}}" data-toggle="modal" data-target="#addModel" > <i class="fa fa-edit"></i></button>
                                {{ Form::open(array('url' => 'branchcompanyprofiles/' . $branchcompanyprofile->id, 'class' => 'pull-right','onsubmit'=>'return isDelete()'))}}
                                {{ Form::hidden('_method', 'DELETE') }}                  
                                {{Form::button('<i class="fa fa-trash"></i>', array('type' => 'submit', 'class' => 'btn btn-danger btn-xs'))}}                    
                                {{ Form::close() }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    
              </table>
            </div>
          </div>
        </div>
      </div>
    </main>

<script>

function isDelete() 
    {
    if (confirm("Are you Sure You Want To Delete ?"))
      {
        return true;
      } else
        {
        return false;
        }
    }
    $("#newbutton").click(function ()
     {
            $('#form').trigger("reset");
            $('#form').attr("action", "");
            $('#putmethod').attr("value", "POST");
     });

    $(".editButton").click(function ()
    {

        var c = $(this).val();
        //alert(c);
    $.ajax({
        url: "branchcompanyprofiles/" + c + "/edit", 
        success: function (result)
     {
        var data = result;
        $('#branch_name').val(data.branch_name);
        $("#branch_alias").val(data.branch_alias);
        $("#branch_address1").val(data.address_line1);
        $("#branch_address2").val(data.address_line2);
        $("#branch_address3").val(data.address_line3);
        $("#branch_line1").val(data.more_line1);
        $("#branch_line2").val(data.more_line2);
        $("#branch_country").val(data.country);
        $("#branch_state").val(data.state);
        $("#branch_district").val(data.district);
        $("#branch_pincode").val(data.pincode);
        $("#branch_contact").val(data.contact_person);
        $("#branch_mobile").val(data.mobile);
        $("#branch_email").val(data.email);
        $("#branch_department").val(data.department);
        $("#editButton").val(c);
        $('#form').attr("action", "branchcompanyprofiles/" + c);
        $('#putmethod').attr("value", "PUT");
    }
  });

});

</script>

@endsection
@extends('layouts.footer')