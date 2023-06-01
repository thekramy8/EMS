<?php
    include './db_connection.php';
?> 

<script> 
$(document).ready(function()
{ 
 // Destroy the existing DataTable instance (if it exists)
if ($.fn.DataTable.isDataTable('#userLists')) {
    $('#usersLists').DataTable().destroy();
}

// Reinitialize the DataTable
$('#userLists').DataTable({});

});
</script> 

<!-- MODAL START HERE -->  

<div class="modal fade" id="addEntityModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title " id="exampleModalLabel">Add New User</h6>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form action=""id="add_entity_form">
                <label for="add_entity_lastname"class="form-label">LastName:</label>
                <input type="text" id="add_entity_lastname" name="add_entity_lastname" class="form-control" required>
              
                <label for="add_entity_firstname"class="form-label">FirstName:</label>
                <input type="text" id="add_entity_firstname" name="add_entity_firstname" class="form-control" required>

                <label for="add_entity_firstname"class="form-label">User Role:</label>
                <select class="form-select form-select-md mb-2" aria-label=".form-select-lg example" name="add_entity_gender" id="add_entity_gender" name="add_entity_gender">
                    <option value="Chief Lawyer">Chief Lawyer</option>
                    <option value="Associate Lawyer">Associate Lawyer</option>
                    <option value="Legal Secretary">Legal Secretary</option>
               </select> 

               <label for="add_entity_email" class="form-label">Email</label>
               <input type="email"  class="form-control" id="add_entity_email" name="add_entity_email" required>
                
               <label for="add_entity_password" class="form-label">Password</label>
               <input type="text" id="add_entity_password" name="add_entity_password" class="form-control">

        </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-warning">Save changes</button>
      </div>
    </div>
  </div>
</div>


<!-- MODAL END HERE --> 
<div class="row">
   <div class="col">
   <div class="card">
        <div class="card-header" style="border-bottom: 5px solid #C6A984;">
            <div class="row"> 
                <div class="col-2  mt-1 fw-bold p-2" style="width:100px;">USERS</div>
                <div class="col-2 p-2"><button id="add_entity_btn" class="btn-sm btn btn-dark" style="background:#ADA06D;">Add</button></div>
            </div>
            
        </div>
        <div class="card-body p-2">
            
            <span class="text-center">
            <img src="./vendor/img/bullet-list.png" alt="Logo" width="30" height="30" >
              USERS LIST
            </span> 

            <div class="row mt-3 m-3" style="overflow:auto;"> 
                <div class="table-responsive  p-3">
                <table id="userLists" class="table  table-hover "style="width:100%;font-size:12px;">
                  <thead> 
                    <tr>    
                        <th class="text-center">No.</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Role</th>
                        <!-- <th class="text-center">Access Level</th> -->
                        <th class="text-center">Action</th>
                    </tr>
                     </thead>   
                      <?php
                        require './db_connection.php';
                        $user_list = "SELECT *  FROM tbl_user_list ORDER BY user_fullname ASC";
                        $query = $conn->query($user_list);
                        $i = 1; 
                        while($row= $query->fetch_assoc()):
                        ?>

                        <tbody class="table-warning">
                            <tr>
                                <td class="text-center"><b><?php echo $i++;?></b></td> 
                                <td class="text-center"><?php echo $row['user_fullname']?></td>
                                <td class="text-center"><?php echo $row['user_email']?></td>
                                <td class="text-center"><?php echo $row['user_role']?></td>      
                 <center>
                  <td> 
                 

                <div class="d-flex justify-content-center">
                 <div class="col-2 text-center"><button class="btn btn-sm btn-primary" id="view_user_ent"  value=<?php echo $row['id']?>'><img src="./src/img/view (1).png"alt=""></button></div> 
                 <div class="col-2 text-center"><button class="btn btn-sm btn-danger" id="delete_user"  value=<?php echo $row['id']?>'><img src="./src/img/trash-can.png"alt=""></button></div> 
                 <div class="col-2 text-center"><button class="btn btn-sm btn-success" id="edit_user"  value=<?php echo $row['id']?>'><img src="./src/img/view (1).png"alt=""></button></div> 
               
                 </div>           
                  </td>
                 </center>  
                            <?php endwhile?>
                            </tr>                     
                        </tbody>     
                  </table>  

                </div>
            </div> 
        </div>
    </div>
   </div>
</div>  

<!-- SCRIPT HERE -->

<script>

    $(document).on('click','#view_user_ent',function(e){
        e.preventDefault(); 
        console.log('CLICK'); 
        $('#addEntityModal').modal('show');
    });
</script> 

<script>
    $(document).on('click','#add_entity_btn',function(e){
        e.preventDefault();
        $('#addEntityModal').modal('show');
    });
</script>

