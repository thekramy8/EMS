if (isset($_POST['update_user'])) {
    // Validate and sanitize inputs
    $user_id = $_POST['user_id'];
    $username = $_POST['username'];
    $firstName = $_POST['firstName'];
    $middleName = $_POST['middleName'];
    $lastName = $_POST['lastName'];
    $password = $_POST['password'];
    $role = $_POST['editrole'];
    $status = $_POST['editstatus'];
    $archive = $_POST['uparchive'];

    // Perform input validation and error handling

    // Update the user in the database using prepared statements
    $stmt = $conn->prepare("UPDATE tbl_users SET 
        username = ?, 
        firstname = ?, 
        middlename = ?, 
        lastname = ?, 
        password = ?, 
        role = ?, 
        status = ?, 
        archive = ? 
        WHERE id = ?");
    $stmt->bind_param("ssssssssi", $username, $firstName, $middleName, $lastName, $password, $role, $status, $archive, $user_id);
    $result = $stmt->execute();

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
