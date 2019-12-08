<?php
    require_once('dbConnection.php');

    
    //Connect to the database
    $db = Database::getConnection();

    //End the program if there was a connection error
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }

    echo "Connected successfully</br>";

    //Fetch the user information
    $first_name = $_POST["first_name"];
    $last_name  = $_POST["last_name"];
    $email      = $_POST["email"];
    $password1  = $_POST["password1"];
    $password2  = $_POST["password2"];


    if(!isset($middle_name)) {
        $middle_name = "";
    }

    //Check if every field was passed by the user
    if(!isset($first_name, $last_name, $email, $password1, $password2)) {
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
        echo "length" . strlen($pwd_hash) . "</br>";
    }
    //Query fields
    $fields  = "first_name, last_name, email, hash, salt";
    //Query values
    $values = "'$first_name', '$last_name', '$email', '$pwd_hash', '$salt'";

    $sql = " INSERT INTO entity ($fields) VALUES ($values) ";

    //Query the db
    if($db->query($sql) === TRUE) {
        
        $id = $db->insert_id;
        $db->query(" INSERT INTO user VALUES ('$id', '0', '0') ");
        session_start();    

        //Generate session CSRF token
        if (empty($_SESSION["token"])) {
            $_SESSION["token"] = bin2hex(random_bytes(32));                         //Set session token
        }
        $_SESSION["id"] = $id;  
        $_SESSION["is_user"] = true;    
                                             
        header("Location: ../frontend/site/dashboard/newIndex.html");

    } else {
        echo "Error: " . $sql . "<br>" . $db->error;
    }

                                                                                 
?>