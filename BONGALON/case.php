<?php  include './db_connection.php';  ?>

<!--MODAL START HERE-->


<script> 
$(document).ready(function()
{ 
 // Destroy the existing DataTable instance (if it exists)
if ($.fn.DataTable.isDataTable('#caseList')) {
    $('#caseList').DataTable().destroy();
}

// Reinitialize the DataTable
$('#caseList').DataTable({});

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





<!-- ASSIGN LAWYER MODAL HERE --> 
<div class="modal fade" id="assign_lawyer_Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Assign Lawyer</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <form action="" id="assign_lawyer_Form"> 
            <div class="col">
                <p id="view_case_information"></p>
            </div>
            <div class="row mb-3">
            <?php   
                    include './db_connection.php';
                    $query = "SELECT * from tbl_user_list"; 
                    $result = mysqli_query($conn,$query); 
        ?> 
            
            <div class="col">
          
                 <select class="form-select" aria-label="Default select example" id="select_lawyer_id" name="select_lawyer_id">
                 <option >Select Lawyer Name</option>
                 <?php   while($row = mysqli_fetch_array($result)):;?>
                <option name="lawyer_id" id="lawyer_id"value="<?php echo $row['id']?>"><?php  echo $row['user_fullname'] ?>
                </option>  
            
             
                <?php   endwhile; ?>
            </select>
          
            </div> 
           
            </div>
          
            <div class="row">
            <div class="input-group">
            <span class="input-group-text">Remarks</span>
            <textarea class="form-control" name="lawyer_remarks" id="lawyer_remarks" aria-label="With textarea"></textarea>
            </div>
    
    
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-warning">Save changes</button>
            </div> 
       
        </div>

            </form>
      </div>
    </div>
  </div>
</div>

<!-- MODAL END HERE -->


<div class="row">

    <div class="col-3">
        <div class="card p-1">
            <div class="card-header bg-transparent text-center"style="border-bottom:5px solid #C6A984 ">UNASSIGNED CASES</div>  
            <div class="card">
                <div class="card-body" >
                    <div class="table-responsive"style="height:500px;overflow: auto;">
                    <table class="table">
                    <thead>
                        <tr>
                       
                        <th class="text-center" style="width:100px;">Case Number</th>
                        </tr>
                    </thead>
 					<tbody class="table-warning">
                    
					 <?php
                                require './db_connection.php'; 
                                $client_list = "SELECT  cases.id,cases.lawyer_user_id,lawyer.user_fullname,cases.case_number,cases.case_type,cases.case_sub_type,cases.client_type,client.firstname,client.middlename,client.lastname
                                FROM tbl_case_list as cases 
                                INNER JOIN tbl_client_list as client ON client.id = cases.client_user_id
                                INNER JOIN tbl_user_list as lawyer on cases.lawyer_user_id = 0 GROUP BY cases.case_number";
                                $query = $conn->query($client_list);
                                $i = 1; 
                                while($row= $query->fetch_assoc()):           
				
					?>      

                            <tr>    
                         
                            <td id="case_modal"class="text-center"><button class="btn btn-sm btn-primary" name="assign_lawyer_Btn" id="assign_lawyer_Btn"  value="<?php echo $row['id']?>" >
                         <?php  $_SESSION['lawyer_id_session'] = $row['id']?>
                            <?php echo $row['case_number']?></button>
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
                                   
    <div class="col-9">
        

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
           TEAM MEMBER LIST
            </span>
                <div class="row mt-2 m-4">
                    <div class="table-responsive">
                        <table id="caseList" class="table table-hover" style="width:100%;font-size:13px;">
                                  <thead>
                                    <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Lawyer Name</th>
                                    <th class="text-center">No.of Cases</th>
                                  
                            
                            
                                     </tr>
                                  </thead> 
                              <tbody class="table-warning">
                              <?php
                                require './db_connection.php';
                                $client_list = "SELECT COUNT(*) AS user_count, user.user_fullname, lawyer.id,lawyer.case_status,lawyer.case_details
                                FROM tbl_case_list AS lawyer
                                INNER JOIN tbl_user_list AS user ON user.id = lawyer.lawyer_user_id WHERE lawyer.case_status ='Ongoing' GROUP BY lawyer.lawyer_user_id
                                ";
                                $query = $conn->query($client_list);
                                $i = 1; 
                                while($row= $query->fetch_assoc()):
                                ?>
                                <tr>
                                    <td class="text-center"><b><?php echo $i++?></b></td>  
                                    <td class="text-center"><?php echo $row['user_fullname']?></td> 
                                    <td class="text-center"><b><?php echo $row['user_count']?></b></td> 
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
  $(document).on('click','#assign_lawyer_Btn',function(){ 

var user_id = $(this).val();
console.log(user_id);
$.ajax({
    type:'GET', 
    url:"./ajaxscript/case_informatio.php?view_case_information="+user_id,
    success:function(response){ 
        var result = jQuery.parseJSON(response);
        if(result.status == 404)
        {
            Swal.Fire(result.message);
       
        }else if(result.status == 200){ 
            // $('#viewlastname').text("Name: "+  result.data.firstname+ " "+ result.data.middlename+ " "+  result.data.lastname);
            $('#view_case_information').html("Name: <span class='name'>" + result.data.firstname + " "+ result.data.middlename +" "+ result.data.lastname
                +"</span><br>"
                +"Casetype: <span class='name'>" + result.data.case_type +"</span><br>"
                +"Sub Type: <span class='name'>" + result.data.case_sub_type+"</span><br>"
                +"Case number: <span class='name'>" + result.data.case_number+"</span><br>"
                ) 

            $('#assign_lawyer_Modal').modal('show');  
           
        } 

    }


});

});   
</script>

<script src="./src/js/routing.js"></script>
<script src="./ajaxscript/js/controller_case.js"></script>
<script src="./ajaxscript/js/case_update.js"></script>

<script>
     $(document).ready(function() {
    $('#cases_btn').addClass('selected');
});

</script>
<script>
    $(document).on('click','#assign_lawyer_Btn',function(e){
        e.preventDefault(); 
         var id =  $(this).val(); 
       $("#assign_lawyer_Modal").modal('show');
    });
</script>  



