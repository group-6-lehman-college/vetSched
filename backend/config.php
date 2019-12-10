<?php 

    define('DEBUG', 1);
    define('PRODUCTION', 0);
    
    $development_mode = DEBUG;            //Development_mode : DEBUG / PRODUCTION

    $app_path = "../";
    
    //Database variables
    class DatabaseConfig {
        static $host = "localhost";
        static $username = "alix";
        static $password = "toor";
        static $db_name = "site_database";
    }
?>