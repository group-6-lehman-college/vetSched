<?php
    require_once("config.php");
    
    class Database {
        private static $db;
        private $connection;

        //Create the connection
        function __construct() {
            $this->connection = new MySQLi(DatabaseConfig::$host,
                                           DatabaseConfig::$username,
                                           DatabaseConfig::$password,
                                           DatabaseConfig::$db_name
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