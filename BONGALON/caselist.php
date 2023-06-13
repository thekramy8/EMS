<?php  include './db_connection.php';  ?>

<!--MODAL START HERE-->


<script> 
$(document).ready(function()
{ 
 // Destroy the existing DataTable instance (if it exists)
if ($.fn.DataTable.isDataTable('#caseLists')) {
    $('#caseLists').DataTable().destroy();
}

// Reinitialize the DataTable
$('#caseLists').DataTable({});

});
</script> 
<!-- MODAL START HERE  -->
<div class="modal fade" id="addCaseModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title " id="exampleModalLabel">Add Case</h6>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            
      <form action="" id="save_case_Form">

      <div class="row mb-3">
        <?php   
                include './db_connection.php';
                $query = "SELECT id,firstname,middlename,lastname from tbl_client_list"; 
                $result = mysqli_query($conn,$query); 
       ?> 
         
            <div class="col">
                Client name:
                 <select class="form-select" aria-label="Default select example" id="select_client_list" name="select_client_list">
                 <option >Select Client Name</option>
                 <?php   while($row = mysqli_fetch_array($result)):;?>
                  <option id="caseId"value="<?php echo $row[0]?>"><?php  echo $row[1] ?>
                 <?php  echo $row[2]?>   <?php  echo $row[3]?>
                </option> 
                <?php   endwhile; ?>
            </select>
            </div>

            <div class="col mt-4">
            <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="clientType" id="flexRadioDefault1" value="Petitioner">
            <label class="form-check-label" for="flexRadioDefault1">
              Petitioner
            </label>
            </div>
            <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="clientType" id="flexRadioDefault2" value="Respondents">
            <label class="form-check-label" for="flexRadioDefault2">
              Repondents
            </label>
            </div>

            </div>
            </div>
              <h6 class="text-center text-primary">CASE DETAILS</h6>
            <div class="row mt-2"> 
              
                <div class="col">
             
                <select class="form-select" aria-label="Default select example"id="case_type_list" name="case_type_list">
                <option selected>Case Type</option>
                <option value="Corporate">Corporate</option>
                <option value="Litigation">Litigation</option>
                <option value="Special Project">Special Project</option>
                </select>
                </div>

                <div class="col">
            
                <select class="form-select" aria-label="Default select example" id="case_type_sublist" name="case_type_sublist">
                <option selected>Case Sub type</option>
                <option value="Criminal">Criminal</option>
                <option value="Family">Family</option>
                <option value="Property">Property</option>
                <option value="Labor">Labor</option>
                <option value="Administrative">Administrative</option>
                <option value="Injury">Injury</option>
                <option value="Collection">Collection</option>
                <option value="Special Proceedings">Special Proceedings</option>
                </select>
                </div>
            </div>


      <div class="modal-footer mt-1">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" id="save_case_btn" class="btn btn-warning">Save changes</button>
      </div>

      </form>
   
   
    </div>
    </div>
  </div>
</div>



<!--  MODAL VIEW USER --> 

<div class="modal fade" id="viewClientModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title fs-5" id="staticBackdropLabel">View Client Information</h6>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p id="viewClientInfo"></p>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div> 

<!-- MODAL EDIT CLIENT INFORMATION -->
<div class="modal fade" id="editClientModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Case Information</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body ">
      
      <form action="" id="client_edit_Form">
        <div class="row">
                       <?php   
                          include './db_connection.php';
                          $query = "SELECT id,firstname,middlename,lastname from tbl_client_list"; 
                          $result = mysqli_query($conn,$query); 
                       ?>   
              <div class="col-12">
             <p id="edit_client_case_number"></p>
              </div>
              <div class="col mb-2"> 
                 <input type="hidden" id="legal_user_id_edit"name="legal_user_id_edit">
                Client name:
                 <select class="form-select" aria-label="Default select example" id="edit_select_client_list" name="edit_select_client_list">
                 <option >Select Client Name</option>
                 <?php   while($row = mysqli_fetch_array($result)):;?>
                 <option id="caseId"value="<?php echo $row[0]?>"><?php  echo $row[1] ?>
                 <?php  echo $row[2]?>   <?php  echo $row[3]?>
                </option> 
                <?php   endwhile; ?>
                </select>
                </div> 

                <div class="col-12 mb-2"> 
                  Client Type:
                <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="clientType" id="flexRadioDefault1" value="Petitioner">
                <label class="form-check-label" for="flexRadioDefault1">
                  Petitioner
                </label>
                </div>
                <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="clientType" id="flexRadioDefault2" value="Respondents">
                <label class="form-check-label" for="flexRadioDefault2">
                  Repondents
                </label>
                </div>
                </div> 
                <div class="col mb-2">
                <select class="form-select" aria-label="Default select example"id="case_type_list" name="case_type_list">
                <option selected>Case Type</option>
                <option value="Corporate">Corporate</option>
                <option value="Litigation">Litigation</option>
                <option value="Special Project">Special Project</option>
                </select>
                </div>

                <div class="col-12 mb-2">
                <select class="form-select" aria-label="Default select example" id="case_type_sublist" name="case_type_sublist">
                <option selected>Case Sub type</option>
                <option value="Criminal">Criminal</option>
                <option value="Family">Family</option>
                <option value="Property">Property</option>
                <option value="Labor">Labor</option>
                <option value="Administrative">Administrative</option>
                <option value="Injury">Injury</option>
                <option value="Collection">Collection</option>
                <option value="Special Proceedings">Special Proceedings</option>
                </select>
                </div> 

                <?php   
                    include './db_connection.php';
                    $query = "SELECT * from tbl_user_list"; 
                    $result = mysqli_query($conn,$query); 
                  ?> 
            
            <div class="col mb-2">

                 <select class="form-select" aria-label="Default select example" id="select_lawyer_id" name="select_lawyer_id">
                 <option >Select Lawyer Name</option>
                 <?php   while($row = mysqli_fetch_array($result)):;?>
                <option name="lawyer_id" id="lawyer_id"value="<?php echo $row['id']?>"><?php  echo $row['user_fullname'] ?>
                </option>  
            
             
                <?php   endwhile; ?>
            </select>
          
            </div> 



        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-warning">Save changes</button>
      </div>
      </form>
      </div>
    
    </div>
  </div>
</div>
<!-- MODAL END HERE -->


<div class="row">
 <div class="col">
        <div class="card">
            <div class="card-header" style="border-bottom:5px solid #C6A984 ">
               <div class="row">
                <div class="col-1 fw-bold mt-1">
                    CASE
                </div>
                <div class="col d-flex justify-content-start">
                    <button class="btn btn-sm btn-dark "data-bs-toggle="modal" data-bs-target="#addCaseModal" style="font-size:14px;background:#ADA06D;">
                        Add
                    </button>
                    
                </div>
               </div>
            </div> 
            <div class="card-body p-1">
            <span class="text-center">
            <img src="./vendor/img/bullet-list.png" alt="Logo" width="30" height="30" >
             CASE LIST
            </span>
                <div class="row mt-2 m-4">
                    <div class="table-responsive">
                        <table id="caseLists" class="table table-hover" style="width:100%;font-size:13px;">
                                  <thead>
                                    <tr>
                                    <th class="text-center">No.</th>
                                    <th class="text-center">Case Number</th>
                                    <th class="text-center">Client Name</th>
                                    <th class="text-center">Case Type</th>
                                    <th class="text-center">Case Sub type</th>
                                    <th class="text-center">Lawyer</th>
                                    <th class="text-center">Client Type</th>
                                    <th class="text-center">ACTION</th>
                                     </tr>
                                  </thead> 
                              <tbody class="table-warning">
                              <?php
                                require './db_connection.php';
                                $client_list = "SELECT lawyer.user_fullname,cases.id,cases.lawyer_user_id,cases.case_number,cases.case_type,cases.case_sub_type,cases.client_type,client.firstname,client.middlename,client.lastname
                                FROM tbl_case_list as cases 
                                INNER JOIN tbl_client_list as client ON client.id = cases.client_user_id
                                INNER JOIN tbl_user_list as lawyer ON cases.lawyer_user_id = lawyer.id ORDER BY cases.id ASC  ";
                                $query = $conn->query($client_list);
                                $i = 1; 
                                while($row= $query->fetch_assoc()):
                                ?>
                                <tr>
                                    <td class="text-center"><?php echo $i++?></td>
                                    <td class="text-center"><b><?php echo $row['case_number'];?></b></td>
                                    <td class="text-center"><?php echo $row['firstname'].' '.$row['middlename'] .' '. $row['lastname']?></td>
                                    <td class="text-center"><?php echo $row['case_type'];?></td>
                                    <td class="text-center"><?php echo $row['case_sub_type'];?></td>
                                    <td class="text-center"><?php if( $row['lawyer_user_id']== 0){
                                         echo  $row['lawyer_user_id'] = 'none';
                                    }else echo $row['user_fullname'];
                                    ?>
                                    </td>
                                    <td class="text-center"><?php echo $row['client_type']?></td> 

                                    <td> 
                   
                                    <div class="d-flex justify-content-end ">
                            
                                    <div class="col"><button class="btn btn-sm btn-primary" id="view_client_info"  value=<?php echo $row['id']?>><img src="./src/img/view (1).png"alt=""></button></div>   
                                    <div class="col"><button class="btn btn-sm btn-danger"id="delete_client_info"  value="<?php echo $row['id']?>"><img src="./src/img/trash-can.png" alt=""></button></div>
                                    <!-- <div class="col"><button class="btn btn-sm btn-success" id="edit_userbtn"  value="<?php echo $row['id']?>"><img src="./src/img/pen.png" alt=""></button></div>    -->
                                    <div class="col"><button class="btn btn-sm btn-success"id="edit_client_info"  value="<?php echo $row['id']?>"><img src="./src/img/pen.png" alt=""></button></div>
                                    </div>
                                </td>

                                </tr>
                            <?php endwhile;?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
  // EDIT CLIENT INFORMATION
$(document).on('click','#view_client_info',function(e){
    e.preventDefault();
    
      var view_entity_info = $(this).val();
      console.log(view_entity_info);
   
       $.ajax({
   
           type:'GET',url:'./ajaxscript/client_information.php?view_id_info='+view_entity_info,
           success:function(response)
           { 
               var result = jQuery.parseJSON(response);
               if(result.status == 404)
               {
                alertify.set('notifier', 'position', 'top-right');
                alertify.set('notifier', 'delay', 1); 
                alertify.success(result.message);
               }else if(result.status == 200)
               { 
                   $('#viewClientInfo').html("Client Name: <span class='name'>" + result.data.firstname +" "+ result.data.middlename  +" "+  result.data.lastname+ "</span><br>" 
                   +"Case Number: <span class='name'>" + result.data.case_number+"</span><br>"
                   +"Case Type: <span class='name'>" + result.data.case_type+"</span><br>" 
                   +"Case Sub Type: <span class='name'>" + result.data.case_sub_type+"</span><br>" 
                   +"Case Number: <span class='name'>" + result.data.user_fullname+"</span><br>" 
                   +"Client Type: <span class='name'>" + result.data.client_type+"</span><br>"); 
                   $('#viewClientModal').modal('show');
               }
           }
   
       });
    });
  //END EDIT CLIENT DATA



    //DELETING CLIENT DATA
$(document).on('click','#delete_client_info',function(e){
    e.preventDefault();

    var legal_id_user = $(this).val();

    Swal.fire({
        title: 'Are you sure to delete this user?',
        icon: 'warning', 
        width:'500px' ,  
        showCancelButton: true,
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      
      
     }).then((result) => {
        if (result['isConfirmed']){
   
            $.ajax({
                type:"POST", 
                url:"./ajaxscript/client_information.php",
                data:{'delete_client':true,'delete_client_id':legal_id_user},
   
                success: function(response)
                {
                    var result = jQuery.parseJSON(response); 
                    if(result.status == 500)
                    {
                        Swal.fire(result.message);
   
                    }else if(result.status ==200)
                    {  
                        alertify.set('notifier', 'delay', 1);
                        alertify.set('notifier','positions','top-right'); 
                        alertify.success(result.message); 
                        loadContent('caselist');
                    }
                   
                }
            });
        }
   });
});
  //END DELETING CLIENT DATA
$(document).on('click','#edit_client_info',function(e){ 
  e.preventDefault();
  var clientId =  $(this).val(); 
  
  $.ajax({
    type:"GET",url:"./ajaxscript/client_information.php?view_id_info="+clientId,
      success:function(response)
      {
        var result = jQuery.parseJSON(response);
            if(result.status == 404)
            {
                alertify.set('notifier', 'position', 'top-right');
                alertify.set('notifier', 'delay', 1);
                alertify.success(result.message); 
            }else if(result.status ==200)
            {
                $("#legal_user_id_edit").val(result.data.id);  
            
                var client = result.data.client_user_id;
                $("#edit_select_client_list option").each(function() {
                  if ($(this).val() == client) {
                    $(this).prop("selected", true);
                    return false; // exit the loop if found
                  }
                });

                $('#edit_client_case_number').html("Case Number: <span class='name'>" + result.data.case_number+"</span><br>"
                );
                
               

                $("#editClientModal").modal("show"); 
           
            }
      }

  });
}); 




</script>
<script src="./src/js/routing.js"></script>
<script src="./ajaxscript/js/controller_case.js"></script>

<script>
     $(document).ready(function() {
    $('#cases_btn').addClass('selected');
});
</script>   


