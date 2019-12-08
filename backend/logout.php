<?php
    session_start();
    if(isset($_SESSION["id"])) {
        session_destroy();
        header("Location: ../frontend/site/index.html");
    }
?>