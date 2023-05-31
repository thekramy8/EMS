<?php 

    include '../db_connection.php';  

    //SAVING USER INTO DATABASE 

    if(isset($_POST['save_user']))
    {
        $lastName = $_POST['lastName']; 
        $firstName = $_POST['firstName']; 
        $middleName = $_POST['middleName']; 
        $gender = $_POST['gender']; 
        $emailone = $_POST['emailOne']; 
        $emailtwo = $_POST['emailTwo']; 
        $contactONE = $_POST['contactOne'];
        $contactTWO = $_POST['contactTwo'];
        $addOne =$_POST['address_one'];
        $addTwo =$_POST['address_two'];
    

    if (empty($lastName) || empty($firstName) || empty($middleName) ||empty($emailone) || empty($contactONE) || empty($addOne)) {
        $response = [
            'status' => 422,
            'message' => 'Please fill all fields.'
        ];
        echo json_encode($response);
        return false;
    } 

    $stmt = $conn->prepare("INSERT INTO tbl_client_list (firstname , middlename , lastname , gender , first_email, second_email, first_contact,
    second_contact, first_address, second_address) VALUES (?,?,?,?,?,?,?,?,?,?)");
    
    $stmt->bind_param("ssssssssss", $firstName, $middleName, $lastName, $gender, $emailone, $emailtwo, $contactONE,$contactTWO,$addOne,$addTwo); 


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
//SAVING USER INTO DATABASE  



//DELETING USER IN DATABASE 
    
    if(isset($_POST['delete_user']))
    { 
        $user_id = $_POST['user_id']; 
        $query_delete = "DELETE FROM  tbl_client_list WHERE id=?"; 
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


//SAVING USER INTO DATABASE 
if(isset($_GET['view_user'])) 
{ 
    $userId = mysqli_real_escape_string($conn,$_GET['view_user']); 

    $selectID = "SELECT * FROM tbl_client_list WHERE id='$userId' "; 
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


 //UPDATE LIST IN DATABASE

    if(isset($_POST['update_user']))
    {   
        //// Validate and sanitize inputs 
        $user_id = $_POST['user_id'];    

        $firstName = $_POST['editfirstName'];
        $middleName = $_POST['editmiddleName'];
        $lastName = $_POST['editlastName'];  
        $gender = $_POST['editgender'];  
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
    
    ?>