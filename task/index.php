<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Task</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<style>
    .bottom-gap{
        margin-bottom: 5px;
        margin-top: 5px;
    }
</style>
</head>
<body>
<div class="container">
     <a onclick="open_modal()" class="btn btn-primary pull-right bottom-gap">Add New</a>
     <div id="error_div"></div>
    <table class="table table-striped">
        <tr>
            <th>Sr.No</th>
            <th>Name</th>
            <th>Age</th>
            <th>City</th>
            <th>State</th>
            <th>Country</th>
            <th>Date of Birth</th>
            <th>Blood Group</th>
            <th>Action</th>
        </tr>

         <tbody id="AjaxData"></tbody>
    </table>


<!-- Modal -->
<div class="modal fade" id="crudModal" tabindex="-1" role="dialog" aria-labelledby="crudModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Patient Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
         <form id="crudForm">
                   <div class="row">
                       <div class="col-md-4">
                           <div class="form-group">
                               <label for="name">Name <span class="field-required">*</span></label>
                               <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                               <span id="validation_name"></span>
                           </div>
                       </div>
                       <div class="col-md-4">
                           <div class="form-group">
                               <label for="email">Age <span class="field-required">*</span></label>
                               <input type="text" class="form-control" name="age" id="age" placeholder="Age" >
                               <span id="validation_age"></span>
                           </div>
                       </div>
                       <div class="col-md-4">
                           <div class="form-group">
                               <label for="contact">City <span class="field-required">*</span></label>
                               <input type="text" class="form-control" name="city" id="city" placeholder="City" >
                               <span id="validation_city"></span>
                           </div>
                       </div>
                         <div class="col-md-4">
                           <div class="form-group">
                               <label for="contact">State <span class="field-required">*</span></label>
                               <input type="text" class="form-control" name="state" id="state" placeholder="State" >
                           <span id="validation_state"></span>
                           </div>
                       </div>
                        <div class="col-md-4">
                           <div class="form-group">
                               <label for="contact">Country <span class="field-required">*</span></label>
                               <input type="text" class="form-control" name="country" id="country" placeholder="Country" >
                           <span id="validation_country"></span>
                           </div>
                       </div>
                        <div class="col-md-4">
                           <div class="form-group">
                               <label for="contact">Date of Birth <span class="field-required">*</span></label>
                               <input type="date" class="form-control" name="date_of_birth" id="date_of_birth" placeholder="Date of Birth" >
                           <span id="validation_date_of_birth"></span>
                           </div>
                       </div>
                        <div class="col-md-4">
                           <div class="form-group">
                               <label for="contact">Blood Group<span class="field-required">*</span></label>
                               <input type="text" class="form-control" name="blood_group" id="blood_group" placeholder="Blood Group" >
                           <span id="validation_blood_group"></span>
                           </div>
                       </div>
                   </div>
                    <div class="row">
                        <div class="col-md-4">
           <input type="hidden" name="editId" id="editId" value="" />
                        </div>
                    </div>
                </form>
      </div>
      <div class="modal-footer">
         <button type="button" class="btn btn-primary" onclick="submitpatientform()">Save</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>
</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script>
$( document ).ready(function() {
    getAllData();
});
function open_modal()
{
    $('#crudForm')[0].reset();
     $('#crudModal').modal('show');
}
    function submitpatientform() {
       event.preventDefault();
        $("#validation_name").fadeOut(1000);
        $("#validation_age").fadeOut(1000);
        $("#validation_city").fadeOut(1000);
        $("#validation_state").fadeOut(1000);
        $("#validation_country").fadeOut(1000);
        $("#validation_date_of_birth").fadeOut(1000);
        $("#validation_blood_group").fadeOut(1000);

       var name=$("#name").val();
       var age=$("#age").val();
       var city=$("#city").val();
       var state=$("#state").val();
       var country=$("#country").val();
       var date_of_birth=$("#date_of_birth").val();
       var blood_group=$("#blood_group").val();
       var checkValidation=0;
       if (name=="") {
        $("#validation_name").fadeIn(1000);
        $("#validation_name").html("Enter Name");
        $("#validation_name").css("color","red");
        checkValidation=1;
       }
        if (age=="") {
        $("#validation_age").fadeIn(1000);
        $("#validation_age").html("Enter Age");
        $("#validation_age").css("color","red");
        checkValidation=1;
       }
       if (city=="") {
        $("#validation_city").fadeIn(1000);
        $("#validation_city").html("Enter City");
        $("#validation_city").css("color","red");
        checkValidation=1;
       }
       if (state=="") {
        $("#validation_state").fadeIn(1000);
        $("#validation_state").html("Enter State");
        $("#validation_state").css("color","red");
        checkValidation=1;
       }
       if (country=="") {
        $("#validation_country").fadeIn(1000);
        $("#validation_country").html("Enter Country");
        $("#validation_country").css("color","red");
        checkValidation=1;
       }
       if (date_of_birth=="") {
        $("#validation_date_of_birth").fadeIn(1000);
        $("#validation_date_of_birth").html("Enter Date Of Birth");
        $("#validation_date_of_birth").css("color","red");
        checkValidation=1;
       }
       if (blood_group=="") {
        $("#validation_blood_group").fadeIn(1000);
        $("#validation_blood_group").html("Enter Blood Group");
        $("#validation_blood_group").css("color","red");
        checkValidation=1;
       }
       var formData = new FormData($('#crudForm')[0]);
            formData.append('crudOperation','insertUpdate');
       if (checkValidation==0) {
        $.ajax({
            
            url:'Patient_operation.php',
            type: 'POST',
            data:formData, 
            processData: false,                          
            contentType:false,
            success: function (data) {
                 $("#error_div").show().delay(2500).fadeOut();
                if(data=='saved'){
                     
                $('#crudForm')[0].reset();
                $("#error_div").html('<div class="alert alert-success catalrt"><button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>Data Save Succesfully.</div>');
                $('#crudModal').modal('hide');
                getAllData();
             }else{
                $("#error_div").html('<div class="alert alert-danger catalrt"><button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>Error While Data saving.</div>');
             }
           
            }
        });
       }

    }
function editData(editId,name,age,city,state,country,date_of_birth,blood_group) {
    $("#editId").val(editId);
    $("#name").val(name);
    $("#age").val(age);
    $("#city").val(city);
    $("#state").val(state);
    $("#country").val(country);
    $("#date_of_birth").val(date_of_birth);
    $("#blood_group").val(blood_group);
    $("#crudModal").modal('show');
}
    function getAllData() {
    $.post("Patient_operation.php",{crudOperation:"getData"},function (allData) {
        $("#AjaxData").html(allData);
    });
}
function deleteData(deleteId)
{
        if(confirm("Are you sure to delete this ?")){

     $.post('Patient_operation.php',{"crudOperation":"deleteData","deleteId":deleteId},
            function (data) {
                $("#error_div").show().delay(2500).fadeOut();
                if(data=='deleted'){
                    $("#error_div").html('<div class="alert alert-success catalrt"><button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>Data Deleted Succesfully.</div>');
                getAllData();
                }else{
                    $("#error_div").html('<div class="alert alert-danger catalrt"><button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>Error while Data Deletion.</div>');
                }
               
            }
        );
 }
}
</script>
</html> 