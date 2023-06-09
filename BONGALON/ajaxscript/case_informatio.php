<?php   
include '../db_connection.php';
if(isset($_GET['view_case_information'])) { 
    $userId = mysqli_real_escape_string($conn,$_GET['view_case_information']); 

    $selectID = "SELECT  cases.id,cases.lawyer_user_id,lawyer.user_fullname,cases.case_number,cases.case_type,cases.case_sub_type,cases.client_type,client.firstname,client.middlename,client.lastname
    FROM tbl_case_list as cases 
    INNER JOIN tbl_client_list as client ON client.id = cases.client_user_id
    INNER JOIN tbl_user_list as lawyer on cases.lawyer_user_id = 0 WHERE cases.id ='$userId' GROUP BY cases.case_number" ; 
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



if(isset($_GET['view_task_information'])) { 
    $userId = mysqli_real_escape_string($conn,$_GET['view_task_information']); 

    $selectID = "SELECT  cases.id,cases.lawyer_user_id,lawyer.user_fullname,cases.case_number,cases.case_type,cases.case_sub_type,cases.client_type,client.firstname,client.middlename,client.lastname,
    cases.start_date,cases.end_date,cases.remarks,cases.case_status
    FROM tbl_case_list as cases 
    INNER JOIN tbl_client_list as client ON client.id = cases.client_user_id
    INNER JOIN tbl_user_list as lawyer  WHERE cases.id ='$userId' GROUP BY cases.case_number" ; 
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