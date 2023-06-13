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
 
        $prefix=  date('Y');
        $id = uniqid();
        $numericId = preg_replace("/[^0-9]/", "", $id);
        $shortUniqueIs = substr($numericId, 0, 8);
        
     
        $caseId = $prefix . '-' . $shortUniqueIs; //case_number
            

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
        second_contact,company_name,company_address,case_id) VALUES (?,?,?,?,?,?,?,?,?,?)");
        
        $stmt->bind_param("ssssssssss", $firstName, $middleName, $lastName, $emailone, $emailtwo, $contactONE,$contactTWO,$companyName,$companyAddress,$caseId); 
    
    
        if ($stmt->execute()) {
            $response = [
                'status' => 200,
                'message' => 'Legal Entity created successfully.'
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

    if(isset($_POST['delete_user']))
    { 
        $user_id = $_POST['legal_user_id']; 
        $query_delete = "DELETE FROM  tbl_entity_list WHERE id=?"; 
        $stmt = $conn->prepare($query_delete); 
        $stmt->bind_param('i',$user_id); 
        $query_delete = $stmt->execute(); 
        $stmt->close(); 
    
        if ($query_delete) {
            $res = [
                'status' => 200,
                'message' => 'Deleted successfully.'
            ];
        } else {
            $res = [
                'status' => 500,
                'message' => 'Not Deleted.'
            ];
        }
        echo json_encode($res);
        return false;
        
    
    }  


    if(isset($_GET['view_legal_entity']))  { 
        $userId = mysqli_real_escape_string($conn,$_GET['view_legal_entity']); 
    
        $selectID = "SELECT * FROM tbl_entity_list WHERE id='$userId' "; 
        $execute_query = mysqli_query($conn,$selectID); 
    
        //CHECK RETURNING VALUE 
        
            if(mysqli_num_rows($execute_query)== 1) 
            {   
    
                $user_record = mysqli_fetch_array($execute_query); 
    
    
                $result=[    
                    'status' =>  200,
                    'message' => 'Record Found.',
                    'data' => $user_record
                        ];
                    echo json_encode($result) ;
                    return false;
            }
            else 
            { 
                $result=[    
                    'status' =>  404,
                    'message' => 'No record found.',
                        ];
                    echo json_encode($result) ;
                    return false;
            }
    }   
    


    if(isset($_GET['legal_user_id'])) 
    { 
    $userId = mysqli_real_escape_string($conn,$_GET['legal_user_id']); 

    $selectID = "SELECT * FROM tbl_entity_list WHERE id='$userId' "; 
    $execute_query = mysqli_query($conn,$selectID); 

    //CHECK RETURNING VALUE 
    
        if(mysqli_num_rows($execute_query)== 1) 
        {   

            $user_record = mysqli_fetch_array($execute_query); 


            $result=[    
                'status' =>  200,
                'message' => 'Record Found.',
                'data' => $user_record
                    ];
                echo json_encode($result) ;
                return false;
        }
        else 
        { 
            $result=[    
                'status' =>  404,
                'message' => 'No record found.',
                    ];
                echo json_encode($result) ;
                return false;
        }
}  




//UPDATING THE LEGAL ENTITY


?>