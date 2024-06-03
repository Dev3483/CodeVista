<?php
        // check_credentials.php

        // Connect to the database
        $host = "localhost";
        $user = "root";
        $password = "";
        $dbname = "userdb";

        $conn = new mysqli($host, $user, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Get the submitted username and password
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Prepare a SQL statement to select the user with the given username
        $sql = "SELECT * FROM user WHERE name =?";
        $stmt = $conn->prepare($sql);

        // Bind the submitted username to the SQL statement
        $stmt->bind_param("s", $username);

        // Execute the SQL statement
        $stmt->execute();

        // Bind the result to a variable
        $result = $stmt->get_result();

        // Check if a user with the given username exists
        if ($result->num_rows > 0) {
            // Fetch the user data
            $user = $result->fetch_assoc();
            $pass = $user['password'];
        

            // Check if the submitted password matches the user's password
            if (strcmp($password, $pass)==0) {
        // The passwords match, so redirect the user to the home page
                   header("Location: http://localhost/codevista/profile/profile.html");
                   exit;
            } else {
                // The passwords do not match, so display an error message
                echo "Invalid password";
            }
        } else {
            // No user with the given username exists, so display an error message
            echo "User not found";
        }

        // Close the database connection
        $conn->close();
        ?>
