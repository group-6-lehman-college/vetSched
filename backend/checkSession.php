<?php
    include_once("config.php");
    session_start();
    
    if(!isset($_SESSION['id'])) {
        header("Location: ../login.php");
    }


    //Check if developer mode is ON
    //If so, display user inforamtion, such as privileges, id, etc.
    if($development_mode) {

        echo "<script>alert('debug mode');</script>";

        if(isset($_SESSION['is_user'])) {

            echo "<script>alert('this is a user');</script>";
        }

        if(isset($_SESSION['is_admin'])) {

            echo "<script>alert('this is an admin');</script>";
        }

        if(isset($_SESSION['is_veterinarian'])) {

            echo "<script>alert('this is a veterinarian');</script>";
        }
    }
?>