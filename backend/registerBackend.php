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
    $address    = $_POST["address"];
    $city       = $_POST["city"];
    $zip_code   = $_POST["zip_code"];
    $state      = $_POST["state"];

    if(!isset($middle_name)) {
        $middle_name = "";
    }

    //Check if every field was passed by the user
    if(!isset($first_name, $last_name, $email, $password1, $password2,
            $address1, $city, $zip_code, $state)) {
        echo "Missing information</br>";
    }

    //Validate user email
    if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Email is valid</br>";
    }

    //Compare submitted passwords (TEMPORARY)
    if($password1 == $password1) {
        $hash = password_hash($password1, PASSWORD_ARGON2ID);
        
        $hash_array = explode('$', $hash);//b echo print_r($hash_array, true) . "</br>";
        $salt = $hash_array[4];
        $pwd_hash = $hash_array[5];
        echo "length" . strlen($pwd_hash) . "</br>";
    }
    $fields = "Pet_Owner_FirstName, Pet_Owner_LastName, Pet_Owner_Email, Pet_Owner_Phone"
    $sql = " INSERT INTO entity (first_name, last_name, email, hash, salt) 
    VALUES ('$first_name', '$middle_name', '$last_name', '$email', '$pwd_hash', '$salt') ";

    //Query the db
    if($db->query($sql) === TRUE) {
        
        $id = $db->insert_id;
        $db->query(" INSERT INTO user (entity_id, missed_appointment) VALUES ('$id', '0') ");
        session_start();    

        //Generate session CSRF token
        if (empty($_SESSION["token"])) {
            $_SESSION["token"] = bin2hex(random_bytes(32));                         //Set session token
        }
        $token = $_SESSION["token"];  
        $_SESSION["status"] = "Active";                                              
        header("Location: dashboard.php");

    } else {
        echo "Error: " . $sql . "<br>" . $db->error;
    }

                                                                                 
?>