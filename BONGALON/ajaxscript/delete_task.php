<?php
 include '../db_connection.php'; 
 if(isset($_POST['delete_task']))
 { 
     $user_id = $_POST['user_id']; 
     $query_delete = "DELETE FROM  tbl_case_list WHERE id=?"; 
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

?>