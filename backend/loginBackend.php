<?php
    require_once("dbConnection.php");

    $db = Database::getConnection();
    //Fetch the user information
    $email = $_POST['email'];           
    $password = $_POST['password'];  

    //Validate user email
    if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Email format is valid</br>";
    }

    $result = $db->query("SELECT id, hash, salt FROM entity WHERE email = '$email'");       //Get the user's hash and salt

    //echo var_dump($result);
    //FIXME verify hash and authenticate
    if($result) {
        $row  = MySQLi_fetch_row($result);                                          //Get the selected row from the result query
        $id   = $row[0];                                                            //Get the user id
        $hash = "\$argon2id\$v=19\$m=65536,t=4,p=1\$$row[2]\$$row[1]";              //Get the hash from the result query

        //Verify if the password matches the hash
        if(password_verify($password, $hash)) {
            session_start();                                //Start the session
            //Generate session CSRF token
            if (empty($_SESSION["token"])) {
                $_SESSION["token"] = bin2hex(random_bytes(32));                         //Set session token
            }
            $token = $_SESSION["token"];  
            $_SESSION["status"] = "Active";   
                                             
            header("Location: ../frontend/site/dashboard/index.html");
        } else {
            header("Location: ../frontend/site/login.php");
        }
    } else {
        echo "User does not exist</br>";    
    }
?>