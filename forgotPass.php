<?php
session_start();
include 'DAO.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

// if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['sub'])) {
    // include 'database.php';
    $host = "localhost";
    $user = "root";
    $password = "";
    $dbname = "userdb";

    $conn = new mysqli($host, $user, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get the submitted username, email, and password
    $username = $_POST['username'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    // Prepare a SQL statement to insert the user data into the database
    $sql = "INSERT INTO user (name, email, password) VALUES ( '$username', '$email', '$pass')";
    $res = mysqli_query($conn, $sql);
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

    if ($result && mysqli_num_rows($result) > 0) {

        echo "<center><font color='red'><h3>Error: Email not found.</h3></font></center>";
    } else {
        $_SESSION['otp'] = rand(100000, 999999);
        $msg = "The OTP for password reset is " . $_SESSION['otp'];
        sendmail($email, "Reset OTP", $msg);
        header("Location: otp.php");
        exit();
    }

mysqli_close($conn);
?>

<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Email</title>
    <link rel="stylesheet" href="loginstyle.css">
</head>

<body>
    <div class="wrapper">
        <h1>Verify Email</h1>
        <form id="changepass-form" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <div class="inputbox">
                <input type="email" name="email" id="email" placeholder="Email" required value="<?php echo $email ;?>" />
            </div>
            <div class="inputbox">
                <input type="password" name="pass" id="email" placeholder="password" required value="<?php echo $pass; ?>" />
            </div>
            <div class="inputbox">
                <input type="text" name="username" id="email" placeholder="username" required value="<?php echo $username ;?>" />
            </div>
            <input type="submit" class="btn" name="sub" value="Get OTP" />
        </form>
    </div>
</body>
</html> -->