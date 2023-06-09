<?php

    include '../db_connection.php';  
    if(isset($_POST['save_case']))
    {
        $prefix= "CN";
        $id = uniqid();
        $numericId = preg_replace("/[^0-9]/", "", $id);
        $shortUniqueIs = substr($numericId, 0, 8);
       
        $caseId = $prefix . '-' . $shortUniqueIs; //case_number

        $client_user_id = $_POST['select_client_list']; //client_user_id int
        $clientType = $_POST['clientType'];  
        $caseType =  $_POST['case_type_list']; 
        $caseSubType =  $_POST['case_type_sublist']; 
        


        $insertQuery = $conn->prepare("INSERT INTO tbl_case_list(case_number,client_user_id,case_type,case_sub_type,client_type)
        VALUES (?,?,?,?,?)");
        $insertQuery->bind_param("sisss",$caseId,$client_user_id,$caseType,$caseSubType,$clientType); 
    
            if ($insertQuery->execute()) {
                $response = [
                    'status' => 200,
                    'message' => 'User created successfully.'
                ];
            } else {
                $response = [
                    'status' => 500,
                    'message' => 'Failed to create user.'
                ];
            }

            echo json_encode($response);
            return false;
}
    


//UPDATE CASE LIST

if($_POST['update_case']){
       
    $lawyer_id = $_POST['select_lawyer_id'];
    $remarks =$_POST['lawyer_remarks'];   
   $case_id = $_SESSION['lawyer_id_session'];
    $editAccount = $conn->prepare("UPDATE tbl_case_list AS cases SET cases.lawyer_user_id = ? ,cases.remarks =? WHERE cases.id =?"); 
    $editAccount->bind_param("isi",$lawyer_id,$remarks,$case_id);
    $result = $editAccount->execute();
        if ($result) {
            $res = [
                'status' => 200,
                'message' => 'Assign lawyer successfully.'
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
 //case status update



?>