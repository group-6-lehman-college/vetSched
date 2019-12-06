<?php
    require_once("dbConnection.php");

    $db = Database::getConnection();

    $name = $_POST['name'];
    $type = $_POST['type'];
    $sex  = $_POST['sex'];

    echo $name . "</br>" . $type . "</br>" . $sex;
?>