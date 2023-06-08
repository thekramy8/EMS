<?php

    include '../db_connection.php';  
    if(isset($_POST['save_case']))
    {
        $prefix= "CN";
        $id = uniqid();
        $numericId = preg_replace("/[^0-9]/", "", $id);
        $shortUniqueIs = substr($numericId, 0, 8);
       
        $caseId = $prefix . '-' . $shortUniqueIs; 

        $client_user_id = $_POST['select_client_list"'];
        $clientType = $_POST['clientType'];  
        $caseType =  $_POST['case_type_list']; 
        $caseSubType =  $_POST['case_type_sublist']; 
        


        $insertQuery = $conn->prepare("INSERT INTO tbl_case_list(case_number,client_user_id,case_type,case_sub_type,client_type)
        VALUES (?,?,?,?,?)");
        $insertQuery->bind_param($caseId,$client_user_id,$clientType,$caseType,$caseSubType); 
    
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
    

?>