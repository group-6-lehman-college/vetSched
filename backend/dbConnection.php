<?php
    class Database {
        private static $db;
        private $connection;

        private $servername = "localhost";
        private $username   = "alix";
        private $pwd        = "toor";
        private $db_name    = "site_database";

        //Create the connection
        function __construct() {
            $this->connection = new MySQLi($this->servername,
                                           $this->username,
                                           $this->pwd,
                                           $this->db_name
                                        );
        }
        
        //Close the connection
        function __destruct() {
            $this->connection->close();
        }
    
        //Get the connection
        public static function getConnection() {
            if (self::$db == null) {
                self::$db = new Database();
            }
            return self::$db->connection;
        }
    }
?>