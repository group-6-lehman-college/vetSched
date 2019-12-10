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

    $result = $db->query("SELECT id, hash, salt, first_name, last_name FROM entity WHERE email = '$email'");       //Get the user's hash and salt

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
            $_SESSION["id"] = $id;    

            $_SESSION["first_name"] = $row[3];    
            $_SESSION["last_name"] = $row[4];

            //User privilege level
            $result = $db->query(" SELECT facility_id, is_admin, is_veterinarian FROM employee WHERE entity_id = '$id' "); 
            
            if(mysqli_num_rows($result) > 0) {
                $row  = MySQLi_fetch_row($result);  

                if($row[0] != null) {
                    $_SESSION["facility_id"] = $row[0];
                }
                if($row[1] == '1') {
                    $_SESSION["is_admin"] = true;
                } 
                if($row[2] == '1') {
                    $_SESSION["is_veterinarian"] = true;
                }
            } else {
                $_SESSION["is_user"] = true;   
            }
            
            header("Location: ../frontend/site/dashboard/index.php");

        } else {
            header("Location: ../frontend/site/login.php");
            echo "<script>alert('Invalid user/password');</script>";

        }
    } else {
        echo "<script>alert('Invalid user/password');</script>";

        header("Location: ../frontend/site/login.php");  
    }
?>