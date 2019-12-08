<?php
    session_start();
    
    if(!isset($_SESSION['token'])) {
        header("Location: ../login.php");
    }
    
    if(isset($_SESSION['is_user'])) {

        echo "<script>alert('this is a user');</script>";
    }

    if(isset($_SESSION['is_admin'])) {

        echo "<script>alert('this is an admin');</script>";
    }

    if(isset($_SESSION['is_veterinarian'])) {

        echo "<script>alert('this is a veterinarian');</script>";
    }
?>