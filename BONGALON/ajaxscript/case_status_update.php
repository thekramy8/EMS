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



?>