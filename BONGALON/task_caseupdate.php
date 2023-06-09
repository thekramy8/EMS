<div class="row">
    <div class="col-3">
        <div class="card">
            <div class="card-header "style="border-bottom: 5px solid #C6A984">CASE UPDATE </div>
            <div class="card-body">
       
             <div class="table-reponsive" style="height:500px;overflow: auto;">
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
                                INNER JOIN tbl_user_list as lawyer on cases.lawyer_user_id > 0 GROUP BY cases.case_number";
                                $query = $conn->query($client_list);
                                $i = 1; 
                                while($row= $query->fetch_assoc()):           
				
					?>   <tr>    
                            <td id="case_modal"class="text-center"><button class="btn btn-sm btn-primary" name="assign_lawyer_Btn" id="assign_lawyer_Btn"  value="<?php echo $row['id']?>" >
                         <?php  $_SESSION['lawyer_id_session'] = $row['id']?>
                            <?php echo $row['case_number']?></button></td>
                            </tr>
                            <?php endwhile;?>
					</tbody>
					</table>
             </div>
            </div>
        </div>
    </div> 
    <div class="col-9 ">
    <div class="container-fluid">
  <div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header"style="border-bottom:5px solid #C6A984;">Case Informtion</div>
            <div class="card-body">
            <form action="">
                <fieldset disabled>
                    <div class="row">
                        <div class="col">
                        <label for="clientName" class="form-label">Client Name:</label>
                         <input type="text" class="form-control" id="clientName" aria-describedby="emailHelp">
                        </div>
                        <div class="col">
                        <label for="clientNo" class="form-label">Case Number:</label>
                         <input type="text" class="form-control" id="clientNo" aria-describedby="emailHelp">
                        </div>
                    </div>
                </fieldset>
            </form>

            </div>
        </div>                         
    </div>
  </div>
  <div class="row">
    <div class="col">
      <!-- Content for Row 2 -->
      <h2>Row 2</h2>
      <p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
    </div>
  </div>
</div>

       
    </div>
</div>