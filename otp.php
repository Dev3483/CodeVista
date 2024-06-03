<?php
session_start();

if (isset($_POST['sub'])) {
    $otp = $_POST['otp'];

    // if ($otp == $_SESSION['otp']) {
        // $host = "localhost";
        // $user = "root";
        // $password = "";
        // $dbname = "userdb";

        // $conn = new mysqli($host, $user, $password, $dbname);

        // if ($conn->connect_error) {
        //     die("Connection failed: " . $conn->connect_error);
        // }

        // // $username = mysqli_real_escape_string($conn, $_POST['name']);
        // // $email = mysqli_real_escape_string($conn, $_POST['email']);
        // // $password = mysqli_real_escape_string($conn, $_POST['password']);

        // // // Hash the password
        // // $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // // // Prepare and execute the query
        // // $query = "INSERT INTO user (name, password, email) VALUES ('$username', '$hashed_password', '$email')";
        // // $res = mysqli_query($conn, $query);
        // $username = ($_POST['name']);
        // $email = ($_POST['email']);
        // $password = ($_POST['password']);

        // $query = "INSERT INTO user (name, password, email ) VALUES ('$username', '$password', '$email')";
        // $res = mysqli_query($conn, $query);

        // if (!$res) {
        //     die(mysqli_errno($conn));
        // }

// check_credentials.php

// Connect to the database
$host = "localhost";
$user = "root";
$password = "";
$dbname = "userdb";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
}

// Get the submitted username, email, and password
$username = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

// Prepare a SQL statement to insert the user data into the database
$sql = "INSERT INTO user (name, email, password) VALUES ( $username, $email, $password)";
// $stmt = $conn->prepare($sql);

// Bind the submitted username, email, and password to the SQL statement
// $stmt->bind_param("sss", $username, $email, $password);

// // Hash the password before storing it in the database
// $password = password_hash($password, PASSWORD_DEFAULT);

// Execute the SQL statement
// $stmt->execute();

// Display a success message
echo "User created successfully";

echo "<script>window.location.href = 'index.php';</script>";
// Close the database connection
$conn->close();
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Email</title>
    <link rel="stylesheet" href="loginstyle.css">
    <!-- <script src="regExpCHANGEPASS.js"></script> -->
</head>

<body>

    <div class="wrapper">
        <h1>Verify OTP</h>
            <form id="changepass-form" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">

                <div class="inputbox">

                    <input type="text" name="otp" id="otp" placeholder="Enter Otp" required />
                </div>
                <input type="submit" class="btn" name="sub" value="Verify" />
            </form>
    </div>
    <!-- <script src="regExpCHANGEPASS.js"></script> -->
</body>

</html>