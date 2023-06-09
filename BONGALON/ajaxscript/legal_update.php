<?php
include '../db_connection.php';

if($_POST['legal_update_users']){
       
    $user_id = $_POST['legal_user_id_edit']; 
    $company_name =$_POST['company_name_edit']; 
    $company_address =$_POST['company_address_edit']; 
    $firstname =$_POST['legal_firstname_edit']; 
    $middlename =$_POST['legal_middlename_edit'];   
    $lastname =$_POST['legal_lastname_edit']; 
    $email_One =$_POST['legal_email_one_edit']; 
    $email_Two =$_POST['legal_email_two_edit']; 
    $contactOne = $_POST['legal_contact_one_edit'];
    $contactTwo = $_POST['legal_contact_two_edit']; 


    

    $validEmails = true;
    if (!filter_var($email_One,FILTER_VALIDATE_EMAIL)) {
        $response = [
            'status' => 423,
            'message' => 'Email not valid.'
        ];
        echo json_encode($response);
        return false;
        $validEmails =false;
    }  


    $editAccount = $conn->prepare("UPDATE tbl_entity_list SET company_name = ?, company_address = ?, firstname = ? , middlename = ?, lastname = ? , first_email = ?,
    second_email = ?,first_contact = ?, second_contact = ? WHERE  id=?"); 
    $editAccount->bind_param("sssssssssi",$company_name,$company_address,$firstname,$middlename,$lastname,$email_One,$email_Two, $contactOne,$contactTwo,$user_id);
    $result = $editAccount->execute();

   
        if ($result) {
            $res = [
                'status' => 200,
                'message' => 'Update successfully.'
            ];
        } else {
            $res = [
                'status' => 500,
                'message' => 'Error not updated.'
            ];
        }
    
        echo json_encode($res);
        return false;
    


}

?>