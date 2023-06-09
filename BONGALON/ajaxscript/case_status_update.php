<?php   
include '../db_connection.php';

if($_POST['update_case_status']){
       
    $case_status_id = $_POST['case_status_input'];
    $case_status_select = $_POST['case_status_select'];   
   

    $editAccount = $conn->prepare("UPDATE tbl_case_list AS cases SET cases.case_status= ? WHERE cases.id =?"); 
    $editAccount->bind_param("si",$case_status_select,$case_status_id);
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





//view case infomation to assign lawyer

if($_POST['update_add_task']){
        
    $userId =  $_GETT['task_id_input'];
    
    $startDate = $_GET['start_task_date'];
    $endtDate = $_GET['end_task_date']; 
    $remarks = $_GET['add_task_remarks']; 
 
     $editAccount = $conn->prepare("UPDATE tbl_case_list SET start_date = ?,end_date = ?,remarks =?  WHERE cases.id =?"); 
     $editAccount->bind_param("sssi",$startDate,$endtDate,$remarks,$userId);
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

