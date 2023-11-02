<?php 

namespace App\Models;

use Exception;

class User 
{
    private static $table = 'user';

    public static function getUser(Int $id)
    {
        try {
            $db = new \PDO(DBDRIVE.":host=".DBHOST.";dbname=".DBNAME, DBUSER, DBPASS);
            $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $err) {
            echo $err->getMessage();
        }

        $sql = 'SELECT * FROM '.self::$table. 'WHERE id = :id';
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return $stmt->fetch(\PDO::FETCH_ASSOC);
        } else {
            throw new \Exception('Nenhum usuário encontrado');
        }
    }
}