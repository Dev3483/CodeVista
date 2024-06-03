
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="favicon-16x16.png" type="image/x-icon">
    <script src="https://kit.fontawesome.com/6d37cf477d.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="profile.css">

    <title>My Profile</title>

</head>

<body>
    <section>
        <div class="container">
            <div class="card">
                <div class="child1">
                    <div class="profile">
                        <img src="OIP.jpeg" alt="">
                        <h3 id="title_name">user name</h3>
                        <hr>
                        <div class="option">
                            <div class="op first">
                                <i class="icon fa-solid fa-gear"></i>
                                <h4>Account</h4>

                            </div>
                            <div class="op second">
                                <i class="icon fa-solid fa-lock"></i>
                                <h4>Change Password </h4>

                            </div>
                            <div class="op forth">
                                <i class="icon fa-regular fa-user"></i>
                                <h4 id="log_out">Log Out</h4>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="vl"></div>
                <div class="child2">
                    <div class="container1" id="first">
                        <div class="personelinfo">
                            <h3>Edit Your Profile</h3>
                            <h5>This information can be edited from your profile page</h5>

                        </div>
                        <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
                            <div class="name">
                                <div class="fname">
                                    <label for="fname">First Name</label><br>
                                    <input type="text" id="fname" name="fname" autofocus="false">
                                </div>
                                <div class="lname">
                                    <label for="lname">Last Name</label><br>
                                    <input type="text" id="lname" name="lname" autofocus="false">
                                </div>
                            </div>
                            <div class="emailandphone">
                                <div class="email">
                                    <label for="email">Email Address</label><br>
                                    <input type="email" id="email" name="email" autofocus="false">
                                </div>
                                <div class="phone">
                                    <label for="phone">Phone Number</label><br>
                                    <input type="tel" id="phone" name="phone" autofocus="false">
                                </div>
                            </div>
                            <div class="countryandcity">
                                <div class="country">
                                    <label for="country">Country</label><br>
                                    <input type="text" id="country" name="country" autofocus="false">
                                </div>
                                <div class="city">
                                    <label for="city">City</label><br>
                                    <input type="text" id="city" name="city" autofocus="false">
                                </div>
                            </div>
                            <div class="user">
                                <div class="username">
                                    <label for="username">Username</label><br>
                                    <input type="text" id="username" name="username" autofocus="false">
                                </div>
                            </div>
                            <hr>
                            <button id="btn">Save Changes</button>
                        </form>
                    </div>

                    <div class="changepass" id="second">
                        <div class="info">
                            <h3>Change Your Password</h3>

                        </div>
                        <div class="pass">
                            <form action="valid.php" method="post">
                                <div class="user">
                                    <div class="username">
                                        <label for="username">Username</label><br>
                                        <input type="text" id="user" name="username" autofocus="false">
                                    </div>
                                </div>
                                <div class="pa old">
                                    <label for="password">Enter Current Password</label><br>
                                    <input type="password" id="password" name="old_password">

                                </div>
                                <div class="pa new">
                                    <label for="new password">Enter New Password</label><br>
                                    <input type="password" id="new password" name="new_password">

                                </div>
                                <div class="pa confirm">

                                    <label for=" new password">Confirm New Password</label><br>
                                    <input type="password" id=" new password" name="password">
                                </div>

                                <hr>
                                <button>Save Changes</button>



                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <script>
        let option1 = document.querySelector(".first")

        option1.addEventListener("click", function() {
            document.getElementById("first").style.display = "block";
            document.getElementById("second").style.display = "none";
        });

        let option2 = document.querySelector(".second")

        option2.addEventListener("click", function() {
            document.getElementById("second").style.display = "block";
            document.getElementById("first").style.display = "none";
        });
        let btn = document.querySelector("#btn")

        btn.addEventListener('click', (e) => {
            e.preventDefault();
            let txt = document.getElementById("title_name");
            txt.innerHTML = "";
            let fname = document.getElementById("fname").value;
            console.log(fname);
            let lname = document.getElementById("lname").value;
            let fullname = fname + " " + lname;
            txt.innerText += fullname;
        })

        let logout = document.getElementById("log_out");
        logout.addEventListener("click", () => {
            location.href = "http://localhost/codevista/homepage/homepage.html";
        })
    </script>
</body>

</html>


<?php

$db_server = 'localhost';
$db_user = "root";
$db_pass = "";
$db_name = "userdb";
$conn = "";

$conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);

if ($conn) {
    echo "you are connect";
} else {
    echo "not connect";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $country = $_POST['country'];
    $city = $_POST['city'];
    $username = $_POST['username'];
    if (empty($username)) {
        echo "Please enter text";
    } else {
        $sql = "INSERT INTO profile (username,fname,lname,email,phone,country,city) VALUES('$username','$fname','$lname','$email','$phone','$country','$city')";
        mysqli_query($conn, $sql);
        echo "register";
    }
}
mysqli_close($conn);
?>