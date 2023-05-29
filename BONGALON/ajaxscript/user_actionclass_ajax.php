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


?>