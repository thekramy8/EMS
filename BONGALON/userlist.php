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
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
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
                <div class="col-2 mt-2 fw-bold" style="width:100px;">USERS</div>
                <div class="col"> <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"style="font-size:14px;background:#ADA06D;">
                        ADD
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#addIndividual">Chief Laywer</a></li>
                    <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#addIndividual">Associate Lawyer</a></li>
                    <li><a class="dropdown-item"  data-toggle="modal" data-target="#exampleModal">Legal Secretary</a></li>
                    </ul>
                </div>
            </div>
            
        </div>
        <div class="card-body p-2">
            
            <span class="text-center">
            <img src="./vendor/img/bullet-list.png" alt="Logo" width="30" height="30" >
              USERS LIST
            </span> 

            <div class="row mt-3" style="overflow:auto;"> 
                <div class="table-responsive p-3">
            
                <table id="userLists" class="table  table-hover "style="width: 100%; font-size:11px;">
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
                  <div class="container">

                  <div class="row justify-content-center">
                 <div class="col-1 text-center"><button class="btn btn-sm btn-primary" id="view_user"  value=<?php echo $row['id']?>'><img src="./src/img/view (1).png"alt=""></button></div> 
                 <div class="col-1 text-center"><button class="btn btn-sm btn-danger" id="delete_user"  value=<?php echo $row['id']?>'><img src="./src/img/trash-can.png"alt=""></button></div> 
                 <div class="col-1 text-center"><button class="btn btn-sm btn-success" id="edit_user"  value=<?php echo $row['id']?>'><img src="./src/img/view (1).png"alt=""></button></div> 
                </div>

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


