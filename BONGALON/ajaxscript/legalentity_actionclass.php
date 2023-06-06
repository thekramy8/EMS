<?php   
include '../db_connection.php';

    if(isset($_POST['save_legal_information']))
    {
       
        $companyName =$_POST['company_name'];
        $companyAddress =$_POST['company_address'];
        $lastName = $_POST['legal_lastname']; 
        $firstName = $_POST['legal_firstname']; 
        $middleName = $_POST['legal_middlename'];    
        $emailone = $_POST['legal_email_one']; 
        $emailtwo = $_POST['legal_email_two']; 
        $contactONE = $_POST['legal_contact_one'];
        $contactTWO = $_POST['legal_contact_two'];


        if (empty($lastName) || empty($firstName) || empty($middleName) ||empty($emailone) || empty($contactONE) || empty($companyName) || empty($companyAddress)) {
            $response = [
                'status' => 422,
                'message' => 'Please fill all fields.'
            ];
            echo json_encode($response);
            return false;
        } 
       
        
        $validEmails = true;
        
        if (!filter_var($emailone, FILTER_VALIDATE_EMAIL)) {
            $response = [
                'status' => 423,
                'message' => 'Email not valid.'
            ];
            echo json_encode($response);
            return false;
            $validEmails =false;
        }
        
        if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $response = [
                'status' => 423,
                'message' => 'Email not valid.'
            ];
            echo json_encode($response);
            return false;
            $validEmails =false;
        } 


        $stmt = $conn->prepare("INSERT INTO tbl_entity_list (firstname , middlename , lastname , first_email, second_email, first_contact,
        second_contact,company_name,company_address) VALUES (?,?,?,?,?,?,?,?,?)");
        
        $stmt->bind_param("sssssssss", $firstName, $middleName, $lastName, $emailone, $emailtwo, $contactONE,$contactTWO,$companyName,$companyAddress); 
    
    
        if ($stmt->execute()) {
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