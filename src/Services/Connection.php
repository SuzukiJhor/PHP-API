<?php 

namespace App\Services;

class Connection 
{
    public static function connect() 
    {
        try {
            $db = new \PDO(DBDRIVE.":host=".DBHOST.";dbname=".DBNAME, DBUSER, DBPASS);
            $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            return $db;
        } catch (\PDOException $err) {
            return $err->getMessage();
        }
    }

}