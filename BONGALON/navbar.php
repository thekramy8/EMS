<!-- CALLING THE SSION WHO LOG IN -->
<?php 
      include('db_connection.php');

      $sql = "SELECT user_fullname,user_role FROM tbl_user_list  WHERE id = ?";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param('i', $_SESSION['id']);
      $stmt->execute();
      $result = $stmt->get_result();

      if ($result->num_rows > 0) {
          // output data of each row
          while ($row = $result->fetch_assoc()) {
              $user_fullname = $row["user_fullname"]; 
              $user_role = $row["user_role"];
            
          }
      }
      $stmt->close();

				?> 
        
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
  <a class="navbar-brand" href="#">
      <img src="./vendor/img/logo-transparent.png" alt="Logo" width="100%" height="45" class="d-inline-block align-text-top">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item " >
          <a class="nav-link " aria-current="page" href="dashboard" data-page="home" style="color:#ADA06D;">DASHBOARD</a>
        </li>
        <li class="nav-item" >
          <a class="nav-link active" aria-current="page" href="client" data-page="client" style="color:#ADA06D;">CLIENTS</a>
        </li>
       
        <li class="nav-item " >
          <a class="nav-link" aria-current="page" style="color:#ADA06D;">CASES</a>
        </li>

        <!-- <li class="nav-item " >
          <a class="nav-link " aria-current="page" href="userlist" data-page="userlist"  style="color:#ADA06D;">USERS</a>
        </li> -->

        <li class="nav-item" >
          <a class="nav-link active" aria-current="page" href="userlist" data-page="userlist" style="color:#ADA06D;">CLIENTS</a>
        </li>

        <li class="nav-item " >
          <a class="nav-link" aria-current="page" href="#" style="color:#ADA06D;">TASK</a>
        </li>

        <li class="nav-item " >
          <a class="nav-link" aria-current="page" href="#" style="color:#ADA06D;">REPORTS</a>
        </li>

      </ul>
       <div class="row " style="width:33%; ">
        <div class="col d-flex justify-content-center">
        <img src="./vendor/img/users.jpg" alt="Logo" width="45" height="45" class="d-inline-block align-text-top " style="border-radius:50%;margin-right:10px; margin-top:5px;">

      <div class="dropdown" style="width:10px;">
        <a class="btn btn-dark dropdown-toggle mt-1 " href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false" style="font-size:12px;margin-right:15px;background:#ADA06D;">
           <?php echo $user_fullname ?> <br> <?php echo $user_role?>
        </a>

        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li><a class="dropdown-item" href="#">Change Password</a></li>
            <li><a class="dropdown-item" href="#" onclick="confirmLogout()">Log-out</a>
          </li>
        </ul>
        </div>
       
        </div>
       </div>
    </div>
  </div>
</nav>