

<!--MODAL START HERE-->



<div class="modal fade" id="addLegal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title" id="exampleModalLabel">Add Legal Entity</h6>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <form action="">
                <div class="row mb-2 ">
                  <div class="col">
                  <label class="form-label">Lastname:</label>
                 <input type="text" class="form-control" id="lastName"  placeholder="LastName">
                   </div>
   
                  <div class="col">
                  <label class="form-label">FirstName:</label>
                 <input type="text" class="form-control" id=firstName" placeholder="Firstname">
                   </div>
                       
                  <div class="col">
                  <label class="form-label">Middlename:</label>
                 <input type="text" class="form-control" id="middleName" placeholder="MiddleName">
                   </div>
                </div>

                <div class="row"> 
                    <div class="col">
                    <label class="form-label">Gender:</label>
                    <select class="form-select form-select-md mb-2" aria-label=".form-select-lg example">
                    <option value="0">SELECT</option>
                    <option value="1">Male</option>
                    <option value="2">Female</option>
                    </select>
                  </div>
              
                  <div class="col">
                  <label for="exampleInputEmail1" class="form-label">Email address</label>
                 <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                  </div>

                  <div class="col">
                  <label for="exampleInputEmail1" class="form-label">ALternate Email</label>
                 <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                  </div>
                </div>  

                <div class="row mb-2">
                        <div class="col">
                    <label class="form-label">Contact No:</label>
                    <input type="text" class="form-control" id="contact" placeholder="Contact no">
                    
                    </div>

                    <div class="col">
                    <label class="form-label">Alternate No:</label>
                    <input type="text" class="form-control" id="altername" placeholder="Altername no">
                    </div>
                </div>

                
                <div class="row">
                        <div class="col">
                    <label class="form-label">Address 1:</label>
                    <input type="text" class="form-control" id="address_one" placeholder="Address 1">
                    
                    </div>

                    <div class="col">
                    <label class="form-label">Address 2:</label>
                    <input type="text" class="form-control" id="address_two" placeholder="Address 2">
                    </div>
                </div>
                        
            </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-warning">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->

<div class="row">

<div class="col">
       <div class="card ">
            <div class="card-header fw-bold"style="border-bottom:5px solid #C6A984;">
                <div class="row">
                    <div class="col-2 mt-2" style="width:100px;">
                        CLIENT
                    </div>  
                    <div class="col">
                    <div class="dropdown">
                    <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"style="font-size:14px;background:#ADA06D;">
                        ADD 
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item"  data-toggle="modal" data-target="#exampleModal">Individual</a></li>
                        <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#addLegal">Legal Entity</a></li>
                       
                    </ul> 
                    </div>
                    </div>
                </div>
            </div>
            <div class="card-body p-3">
            <span class="text-center">
            <img src="./vendor/img/bullet-list.png" alt="Logo" width="30" height="30" >
              CLIENT LIST
            </span> 
            <div class="row mt-2 p-3" style="overflow:auto;"> 
                <div class="table-responsive border-danger" >
      
                <table id="clientList" class="table  table-hover"style="width: 100% ;font-size:12px;">
        <thead>
            <tr>
                <th>LastName</th>
                <th>FirstName</th>
                <th>MiddleName</th>
                <th>Gender</th>
                <th>Email 1</th>
                <th>Email 2</th>
                <th>Contact 1</th>
                <th>Contact 2</th>
                <th>Address 1</th>
                <th>Address 2</th>
            </tr>
        </thead>
      
        <tbody class="table-warning">
            <tr>
                <td>Dela Cruz</td>
                <td>Juan</td>
                <td>Demagiba</td>
                <td>Male</td>
                <td>Juandelacruz@gmail.com</td>
                <td>Juandelacruz2@gmail.com</td>
                <td>09876543211</td>
                <td>09876543211</td>
                <td>Cupang Muntinlupa City</td>
                <td>Cupang Muntinlupa City</td>
                
            </tr>
            <tr>
            <td>Dela Cruz</td>
                <td>Juan</td>
                <td>Demagiba</td>
                <td>Male</td>
                <td>Juandelacruz@gmail.com</td>
                <td>Juandelacruz2@gmail.com</td>
                <td>09876543211</td>
                <td>09876543211</td>
                <td>Cupang Muntinlupa City</td>
                <td>Cupang Muntinlupa City</td>
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
   $(document).ready(function () {
    $('#clientList').DataTable({
       
    });
});    
   </script>
