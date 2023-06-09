<?php
 include '../db_connection.php'; 

if($_POST['update_add_task']){
        
    $userId = $_POST['task_id_input'];
    
    $startDate = $_POST['start_task_date'];
    $endtDate = $_POST['end_task_date']; 
    $remarks = $_POST['add_task_remarks']; 
    $task= $_POST['add_task_text']; 
 
     $editAccount = $conn->prepare("UPDATE tbl_case_list AS cases SET cases.start_date = ? , cases.end_date = ?, cases.remarks =? ,cases.task =? WHERE cases.id =?"); 
     $editAccount->bind_param("ssssi",$startDate,$endtDate,$remarks,$task,$userId);
     $result = $editAccount->execute();
         if ($result) {
             $res = [
                 'status' => 200,
                 'message' => 'Case Status Update successfully.'
             ];
         } else {
             $res = [
                 'status' => 500,
                 'message' => 'Not Assign successfully.'
             ];
         }
         echo json_encode($res);
         return false;
 }  

 ?>