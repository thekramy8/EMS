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
        <input type="hidden" name="case_status_input" id="case_status_input">
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


<div class="modal fade" id="addTask_Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Task</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form action="" id="add_task_Form">
        <input type="hidden" name="task_id_input" id="task_id_input">
          <div class="row">
            <div class="col">

            <label for="exampleInputEmail1" class="form-label">Start Date:</label>
           <input type="date" class="form-control mb-1" id="start_task_date" name="start_task_date" placeholder="Start Date">
           
           <label for="exampleInputEmail1" class="form-label">End Date:</label>
           <input type="date" class="form-control mb-4" id="end_task_date" name="end_task_date" placeholder="Start Date">
           

           <div class="form-floating">
          <textarea class="form-control" name="add_task_remarks" id="add_task_remarks" style="height: 100px"></textarea>
          <label for="add_task_remarks">Remarks</label>
        </div>
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



<div class="modal fade" id="view_task_Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Case Information</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <form action="" id="assign_lawyer_Form"> 
            <div class="col">
                <p id="view_task_information"></p>
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
                                    <!-- <th class="text-center" style="width:100px;">Case</th>
                                    <th class="text-center" style="width:100px;">Case Sub Type</th> -->
                                    <th class="text-center">Lawyer</th>
                                    <th class="text-center" style="width:100px;">Case Status</th>
                                    <th class="text-center" >ACTION</th>
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
                                    <!-- <td class="text-center"><?php  echo $row['case_type']?></td>
                                    <td class="text-center"><?php  echo $row['case_sub_type']?></td> -->
                                    <td class="text-center"><?php if( $row['lawyer_user_id']== 0){
                                         echo  $row['lawyer_user_id'] = 'none';
                                    }else echo $row['user_fullname'];
                                    ?>
                                    </td>
                         
                                    <td class="text-center"><?php echo $row['case_status'];?></td>
                                    <td>                                
                                    <div class="container d-flex justify-content-end" >                             
                                   <!-- <div class="col "><button class="btn btn-sm btn-secondary" id="addtask_progressbtn" value="<?php echo $row['id'];?>"><img src="./src/img/time-management.png" alt=""> 
                                   </button></div> -->
                                 
                                   <div class="col d-flex justify-content-center"><button class="btn btn-sm btn-primary" id="viewtask_progressbtn" value="<?php echo $row['id'];?>"><img src="./src/img/view (1).png" alt=""> 
                                   </button></div>
                                    
                                   <!-- <div class="col"><button class="btn btn-sm btn-danger" id="deletetask_progressbtn" value="<?php echo $row['id'];?>"><img src="./src/img/trash-can.png" alt=""> 
                                   </button></div> -->

                                   <div class="col d-flex  justify-content-start"><button class="btn btn-sm btn-success" id="edit_progressbtn" value="<?php echo $row['id'];?>"><img src="./src/img/pen.png" alt=""> 
                                   </button></div>
                                  
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

  <script> 

    $(document).on('click','#addtask_progressbtn',function(e){ 
      e.preventDefault();
      var user_id = $(this).val()
      $('#task_id_input').val(user_id); 
      $("#addTask_Modal").modal("show");

    });
  </script>

  <script>
    
  $(document).on('submit',"#add_task_Form",function(e){
    e.preventDefault();
   
    var formData = new FormData(this);
    formData.append("update_add_task",true);
    $.ajax({ 
      type:"POST",url:"./ajaxscript/update_task.php",data:formData,
      processData:false,contentType:false,
    
      success:function(response)
      {
          var result = jQuery.parseJSON(response); 
         
          if(result.status == 200)
          {
         
           $('#addTask_Modal').modal('hide');
           $('#add_task_Form')[0].reset();
  
              alertify.set('notifier','positions','top-right'); 
              alertify.success(result.message); 
  
            //  $('#userList').load(location.href+ " #userList");;
             
            } 
          loadContent('task_progress'); 
         // abortController.abort();
       $(document).off('submit', "#add_task_Form");
      } 
  
  
    });
  //  xhr.abort(); 
  });
  </script> 

<script>
  $(document).on('click','#viewtask_progressbtn',function(){ 

var user_id = $(this).val();
console.log(user_id);
$.ajax({
    type:'GET', 
    url:"./ajaxscript/case_informatio.php?view_task_information="+user_id,
    success:function(response){ 
        var result = jQuery.parseJSON(response);
        if(result.status == 404)
        {
            Swal.Fire(result.message);
       
        }else if(result.status == 200){  
            var startDate = result.data.start_date;
            var date = new Date(startDate);
            var start_date = date.toLocaleDateString();
            
            var endDate = result.data.end_date;
            var dates = new Date(endDate);
            var end = dates.toLocaleDateString();

            // $('#viewlastname').text("Name: "+  result.data.firstname+ " "+ result.data.middlename+ " "+  result.data.lastname);
            $('#view_task_information').html("Name: <span class='name'>" + result.data.firstname + " "+ result.data.middlename +" "+ result.data.lastname
                +"</span><br>" +"Status: <span class='name'>" + result.data.case_status+"</span><br>"
                +"Casetype: <span class='name'>" + result.data.case_type +"</span><br>"
                +"Sub Type: <span class='name'>" + result.data.case_sub_type+"</span><br>"
                +"Case number: <span class='name'>" + result.data.case_number+"</span><br>"
                +"Start Date: <span class='name'>" + start_date +"</span><br>"
                +"End Date: <span class='name'>" +end+"</span><br>"
                +"Remarks: <span class='name'>" + result.data.remarks+"</span><br>"
                ) 

            $('#view_task_Modal').modal('show');  
           
        } 

    }


});

});   
</script



