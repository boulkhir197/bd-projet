<?php
class Database{
    private static $db;
    private $connection;

    private function __construct() {
        $this->connection= pg_connect("host=houplin user=sbenni password=postgres dbname=upheaven") 
            or die('Erreur de Connection !<br />'.pg_last_error()) ;
    }
    
    function __destruct() {
        pg_close($this->connection);
    }

    public static function getConnection() {
        if (self::$db == null) {
            self::$db = new Database();
        }
        return self::$db->connection;
    }
}

?>
