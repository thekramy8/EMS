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
<div class="modal fade" id="case_update_Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title" id="exampleModalLabel">Case Update</h6>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="" id="update_case_status_Form"> 
        <input type="text" name="case_status_input" id="case_status_input">
      <label for="">Status:</label>
      <select class="form-select form-select-sm" aria-label=".form-select-sm example"id="case_status_select" name="case_status_select">
      <option selected>Open this select menu</option>
    
      <option value="Ongoing">Ongoing</option>
      <option value="Completed">Completed</option>
      <option value="On-Hold">On-Hold</option>
    </select>

     <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-warning">Save changes</button>
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
                <div class="col-3 fw-bold mt-1">
              OVERALL CASE PROGRESS
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
                                    <th class="text-center" style="width:20px;">#</th>
                                    <th class="text-center " >Case Number</th>
                                    <th class="text-center">Client Name</th>
                                    <th class="text-center" style="width:100px;">Case</th>
                                    <th class="text-center" style="width:100px;">Case Sub Type</th>
                                    <th class="text-center">Lawyer</th>
                                    <th class="text-center" style="width:100px;">Case Status</th>
                                    <th class="text-center" style="width:100px;">ACTION</th>
                                     </tr>
                                  </thead> 
                              <tbody class="table-warning">
                              <?php
                                require './db_connection.php'; 
                                $client_list = "SELECT cases.id,cases.lawyer_user_id,user.user_fullname,client.firstname,client.middlename,client.lastname,cases.case_status,cases.case_number,cases.case_sub_type,cases.case_type
                              
                                FROM tbl_case_list as cases
                                INNER JOIN tbl_user_list AS user ON cases.lawyer_user_id = user.id
                                INNER JOIN tbl_client_list AS client WHERE  cases.client_user_id = client.id;";
                                $query = $conn->query($client_list);
                                $i = 1; 
                                while($row= $query->fetch_assoc()):           
				                    ?>
                                <tr>
                                    <td class="text-center"><?php echo $i++?></td>
                                    <td class="text-center" ><b><?php echo $row['case_number'];?></b></td>
                                    <td class="text-center"><?php echo $row['firstname'].' '.$row['middlename'] .' '. $row['lastname']?></td>
                                    <td class="text-center"><?php  echo $row['case_type']?></td>
                                    <td class="text-center"><?php  echo $row['case_sub_type']?></td>
                                    <td class="text-center"><?php if( $row['lawyer_user_id']== 0){
                                         echo  $row['lawyer_user_id'] = 'none';
                                    }else echo $row['user_fullname'];
                                    ?>
                                    </td>
                         
                                    <td class="text-center"><?php echo $row['case_status'];?></td>
                                    <td>                                
                                    <div class="text-center"><button class="btn btn-sm btn-success" id="edit_progressbtn" value="<?php echo $row['id'];?>"><img src="./src/img/pen.png" alt=""> 
                                  
                                  </button></div>
                                   
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
<script src="./src/js/routing.js"></script>
<script src="./ajaxscript/js/case_update.js"></script> 

<script>
     $(document).ready(function() {
    $('#manage_task').addClass('selected'); 
});
</script>

<script> 
  $(document).on('click','#edit_progressbtn',function(e){
  e.preventDefault();
  var id = $(this).val();
   $('#case_status_input').val(id); 
  $("#case_update_Modal").modal('show'); 

  });
</script> 



