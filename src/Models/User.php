<?php 

namespace App\Models;

use App\Services\Connection;



class User 
{
    private static $table = 'user';

    public static function getUser($id)
    {
        $db = Connection::connect();
    
        if ($db instanceof \PDOException) {
            echo $db;
        } 
      
        $sql = 'SELECT * FROM '.self::$table.' WHERE id = :id';
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
        $stmt->execute();
    
        if ($stmt->rowCount() > 0) {
            return $stmt->fetch(\PDO::FETCH_ASSOC);
        } else {
            throw new \Exception('Nenhum usuário encontrado');
        }
    }

    public static function getUserAll()
    {
        $db = Connection::connect();

        if ($db instanceof \PDOException) {
            echo $db;
        }

        $sql = 'SELECT * FROM '.self::$table;
        $stmt = $db->prepare($sql);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } else {
            throw new \Exception('Nenhum usuário encontrado');
        }
    }
}