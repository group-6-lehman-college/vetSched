<?php
    require_once('dbConnection.php');

    
    //Connect to the database
    $db = Database::getConnection();

    //End the program if there was a connection error
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }

    $doctor = $_POST["doctor"];
    $location_id = $_POST["location_id"];
    $date = $_POST["date"];
    $time = $_POST["time"];
    
    $datetime = $date . " " . $time;

    $result = $db->query("INSERT INTO appointment 
    VALUES (1, $doctor, '$location_id', '$datetime') ");

    if($result) {
        header("Location: ../frontend/site/dashboard/addAppointment.php");

    } else {
        echo $db->error;
    }
?>