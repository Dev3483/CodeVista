<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="login.css">
    <link rel="shortcut icon" href="favicon-16x16.png" type="image/x-icon">
    <title>signin-signup</title>
</head>

<body>
    <div class="container">
        <div class="signin-signup">
            <form action="check.php" method="post" class="sign-in-form">
                <h2 class="title">Sign in</h2>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" name="email" placeholder="Email" id="user">
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password" placeholder="Password" id="pass">
                </div>
                <input type="submit" value="Login" class="btn">
                <!-- <p class="social-text">Or Sign in with social platform</p> -->
                <!-- <div class="social-media">
                    <a href="#" class="social-icon">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a href="" class="social-icon">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="" class="social-icon">
                        <i class="fab fa-google"></i>
                    </a>
                    <a href="" class="social-icon">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div> -->
                <p class="account-text">Don't have an account? <a href="#" id="sign-up-btn2">Sign up</a></p>
            </form>
            <form method="POST" action="forgotPass.php" class=" sign-up-form">
                <h2 class="title">Sign up</h2>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" placeholder="Username" name="username" id="user">
                </div>
                <div class="input-field">
                    <i class="fas fa-envelope"></i>
                    <input type="text" placeholder="Email" name="email" id="email">
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Password" name="pass" id="pass">
                </div>

                <input type="submit" name="submit" value="Sign Up" id="submit" class="btn">

                <p class="social-text">Or Sign in with social platform</p>
                <div class="social-media">
                   
                    <a href="http://localhost/codevista/container/google-login-php/login.php" class="social-icon">
                        <i class="fab fa-google"></i>
                    </a>
                    
                </div>
                <p class="account-text">Already have an account? <a href="#" id="sign-in-btn2">Sign in</a></p>
            </form>
        </div>
        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>Welcome to CodeVista</h3>
                    <img src="9200_1_2_01_1.png" alt="img" height="350px">
                    <button class="btn" id="sign-in-btn">Sign in</button>
                </div>
            </div>
            <div class="panel right-panel">
                <div class="content">
                    <h3>New to Brand?</h3>
                    <img src="my-password-animate.svg" alt="photo" height="350px">
                    <button class="btn" id="sign-up-btn">Sign up</button>
                </div>

            </div>
        </div>
        <img src="programming-animate.svg" alt="" class="img1">
    </div>
    <script>
        const sign_in_btn = document.querySelector("#sign-in-btn");
        const sign_up_btn = document.querySelector("#sign-up-btn");
        const container = document.querySelector(".container");
        const sign_in_btn2 = document.querySelector("#sign-in-btn2");
        const sign_up_btn2 = document.querySelector("#sign-up-btn2");
        sign_up_btn.addEventListener("click", () => {
            container.classList.add("sign-up-mode");
        });
        sign_in_btn.addEventListener("click", () => {
            container.classList.remove("sign-up-mode");
        });
        sign_up_btn2.addEventListener("click", () => {
            container.classList.add("sign-up-mode2");
        });
        sign_in_btn2.addEventListener("click", () => {
            container.classList.remove("sign-up-mode2");
        });

        function myfunc() {
            location.href = 'http://localhost/codevista/container/forgotpass.php';
        }
    </script>
</body>

</html>


<!-- <?php
session_start();
include 'DAO.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['sub'])) {
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
        $msg = "The OTP for password is " . $_SESSION['otp'];
        sendmail($email, "Reset OTP", $msg);
        header("Location: otp.php");
        exit();
    }
}
mysqli_close($conn);
?> -->