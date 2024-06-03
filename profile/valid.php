<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "userdb";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = $_POST['username'];
$old_password = $_POST['old_password'];
$new_password = $_POST['new_password'];

$sql = "SELECT * FROM user WHERE name =?";
$stmt = $conn->prepare($sql);

$stmt->bind_param("s", $username);


$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    $pass = $user['password'];

    // Check if the submitted old password matches the user's password
    if (strcmp($old_password,$pass)==0) {
        // The old passwords match, so update the user's password
        // $new_hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
        $sql = "UPDATE user SET password =? WHERE name =?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $new_password, $username);
        $stmt->execute();

        // Display a success message
        echo "Password updated successfully";
    } else {
        // The old passwords do not match, so display an error message
        echo "Invalid old password";
    }
} else {
    // No user with the given username exists, so display an error message
    echo "User not found";
}

// Close the database connection
$conn->close();
