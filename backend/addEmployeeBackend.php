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
    $location_id = $_POST["location_id"];
    $is_admin = 0;
    $is_veterinarian = 0;
    echo  $location_id, $is_admin, $is_veterinarian;
    //Check if every field was passed by the user
    if(!isset($first_name, $last_name, $email, $password1, $password2,
     $location_id)) {
        echo "Missing information</br>";
    }

    if(isset($_POST["is_admin"])) {
        $is_admin = $_POST["is_admin"];
    }

    if(isset($_POST["is_veterinarian"])) {
        $is_veterinarian = $_POST["is_veterinarian"];
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
        $result = $db->query(" INSERT INTO employee VALUES ('$id', '$location_id', '$is_admin', '$is_veterinarian', 0) ");
        if($result) {
            echo "employee added succesfully";
        }
        session_start();    
    

                                             
        header("Location: ../frontend/site/dashboard/addEmployee.php");

    } else {
        echo "Error: " . $sql . "<br>" . $db->error;
    }

                                                                                 
?>