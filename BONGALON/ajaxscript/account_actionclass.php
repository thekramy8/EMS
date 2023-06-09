<?php
    include '../db_connection.php';

    //SAVING CLIENT INTO DATABASE

    if(isset($_POST['save_client']))
    {
        $lastname = $_POST['add_entity_lastname']; 
        $firstname = $_POST['add_entity_firstname'];
        $email = $_POST['add_entity_email'];
        $role = $_POST['add_entity_role'];
        $password = $_POST['add_entity_password'];

        $fullname = $firstname."  ". $lastname;

            //VALIDATING THE FIELDS
            if(empty($lastname) || empty($firstname) || empty($email) || empty($role) || empty($password))
            {
                $response = ['status' => 404,'message'=>'Please Complete the Required Fields.'];
                echo json_encode($response); 
                return false;
            } 

              
                $validEmails = true;
                
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $response = [
                        'status' => 423,
                        'message' => 'Email not valid.'
                    ];
                    echo json_encode($response);
                    return false;
                    $validEmails =false;
                }
                
        if($role == 'Chief Lawyer')  
        { 
            $accesslevel =  "Create Read Update Delete ";
        }else if($role == 'Associate Lawyer')
        {
            $accesslevel =  "Create Read Update";
        }     
    

        $hashedPassword = password_hash($password,PASSWORD_DEFAULT);
        //INSERTING USING QUERY 
        $insertClient = $conn->prepare("INSERT INTO tbl_user_list(user_fullname,user_email,user_password,user_role,user_access) 
        VALUES(?,?,?,?,?)");
        $insertClient->bind_param("sssss",$fullname,$email, $hashedPassword,$role,$accesslevel);
    
        if($insertClient->execute())
        {
            $result = ['status'=> 400, 'message'=> 'Succesfully user created.'];
        }else{
            $result = ['status'=> 500, 'message'=> 'Failed to create.'];
        }
        echo  json_encode($result);
        return false;



    }

    if(isset($_GET['view_entity'])) 
{ 
    $userId = mysqli_real_escape_string($conn,$_GET['view_entity']); 

    $selectID = "SELECT * FROM tbl_user_list WHERE id='$userId' "; 
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


if(isset($_POST['delete_user']))
{ 
    $user_id = $_POST['user_id']; 
    $query_delete = "DELETE FROM  tbl_user_list WHERE id=?"; 
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


if(isset($_GET['view_entity_user'])) 
{ 
    $userId = mysqli_real_escape_string($conn,$_GET['view_entity_user']); 

    $selectID = "SELECT * FROM tbl_user_list WHERE id='$userId' "; 
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




?>