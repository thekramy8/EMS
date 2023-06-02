<?php  

include '../db_connection.php'; 


if (isset($_GET['user_id'])) {
    $userId = $_GET['user_id'];
    
    $selectID = "SELECT * FROM tbl_client_list WHERE id=?";
    $stmt = $conn->prepare($selectID);
    $stmt->bind_param("s", $userId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user_record = $result->fetch_assoc();
        
        $res = [    
            'status' =>  200,
            'message' => 'Record Found.',
            'data' => $user_record
        ];
        echo json_encode($res);
        return false;
    } else {
        $res = [    
            'status' =>  404,
            'message' => 'No record found.'
        ];
        echo json_encode($res);
        return false;
    }
}





//UPDATE LIST IN DATABASE

    if(isset($_POST['update_user']))
    {   
        //// Validate and sanitize inputs 
        $user_id = $_POST['user_id'];    

        $firstName = $_POST['editfirstName'];
        $middleName = $_POST['editmiddleName'];
        $lastName = $_POST['editlastName'];  
        $gender = $_POST['editGender'];  
        $emailOne = $_POST['editemailOne'];  
        $emailTwo = $_POST['editemailTwo'];        
        $contactOne = $_POST['editcontactOne']; 
        $contactTwo = $_POST['editcontactTwo']; 
        $addressOne = $_POST['editaddress_one']; 
        $addressTwo = $_POST['editaddress_two']; 

      


     $editUser = $conn->prepare("UPDATE tbl_client_list SET
         firstname =?,
         middlename=?,
         lastname=?,
         gender=?,
         first_email=?,
         second_email=?,
         first_contact=?,
         second_contact=?, 
         first_address=?,
         second_address=? WHERE id = ?"); 

         $editUser->bind_param("ssssssssssi",

         $firstName,
         $middleName,
         $lastName,
         $gender, 
         $emailOne,
         $emailTwo,
         $contactOne,
         $contactTwo,
         $addressOne,
         $addressTwo,
         $user_id); 

         $result = $editUser->execute();

         if ($result) {
            $res = [
                'status' => 200,
                'message' => 'Update successfully.'
            ];
        } else {
            $res = [
                'status' => 500,
                'message' => 'Not updated successfully.'
            ];
        }
    
        echo json_encode($res);
        return false;
    } 




   if($_POST['update_account']){
       
        $user_id = $_POST['edit_entity_id'];
        $fullname =$_POST['edit_entity_fullname'];   
        $email =$_POST['edit_entity_email']; 
        $role = $_POST['edit_entity_role'];


        $validEmails = true;
        if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
            $response = [
                'status' => 423,
                'message' => 'Email not valid.'
            ];
            echo json_encode($response);
            return false;
            $validEmails =false;
        }  

        $editAccount = $conn->prepare("UPDATE tbl_user_list SET user_fullname =? , user_email=? , user_role=? WHERE id=?"); 
        $editAccount->bind_param("sssi",$fullname,$email,$role,$user_id);
        $result = $editAccount->execute();

       
            if ($result) {
                $res = [
                    'status' => 200,
                    'message' => 'Update successfully.'
                ];
            } else {
                $res = [
                    'status' => 500,
                    'message' => 'Not updated successfully.'
                ];
            }
        
            echo json_encode($res);
            return false;
        


    }




?>

