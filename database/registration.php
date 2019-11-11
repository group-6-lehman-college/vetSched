<?php
    //Database information
    $servername = "localhost";
    $username   = "root";
    $pwd        = "";
    $db         = "mydb";

    //Connect to the database at localhost
    $conn = new mysqli($servername,
                       $username,
                       $pwd,
                       $db);

    //End the program if there was a connection error
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    echo "Connected successfully</br>";

    //Fetch the user information
    $first_name = $_POST["first_name"];
    $last_name  = $_POST["last_name"];
    $username   = $_POST["username"];
    $email      = $_POST["email"];
    $password1  = $_POST["password1"];
    $password2  = $_POST["password2"];

    //Check if every field was passed by the user
    if(!isset($first_name, $last_name, $username, $email, $password1, $password2)) {
        echo "Missing information</br>";
    }

    //Validate user email
    if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Email is valid</br>";
    }

    //Compare submitted passwords (TEMPORARY)
    if($password1 == $password1) {
        $hash = password_hash($password1, PASSWORD_ARGON2ID);
        $hash_array = explode('$', $hash);
        $salt = $hash_array[4];
        $pwd_hash = $hash_array[5];
    }

    $sql = " INSERT INTO user (first_name, last_name, username, hashed_password, salt) VALUES ('$first_name', '$last_name', '$username', '$hash', '$salt') ";

    //Query the db
    if($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
?>