<?php
    require_once("dbConnection.php");
    
    $db = Database::getConnection();
    session_start();

    $id = $_SESSION["id"];
    $result = $db->query(" SELECT first_name, last_name FROM entity WHERE id = '$id' ");

    $row  = MySQLi_fetch_row($result); 
    $first_name = $row[0];
    $last_name = $row[1];
    echo "Logged in as: $first_name $last_name</br>";
    
    $name        = $_POST['name'];
    $sex         = $_POST['sex'];
    $type        = $_POST['type'];
    $description = $_POST['description'];
    
    echo $id . "</br>" . $name . "</br>" . $type . "</br>" . $sex
    . "</br>" . $description;

    $fields = "user_entity_id, name, sex, type, description";
    $values = " '$name', '$sex', '$type', '$description' ";
    $query = " INSERT INTO pet ($fields) VALUES ($values) ";

    $result = $db->query($query);
    if(!$result) {
        echo "Error adding new pet :(</br>" . $db->error;
    } else {
        echo "Pet added successfully! :)";
    }
?>