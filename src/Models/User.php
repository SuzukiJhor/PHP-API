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
            return $db;
        } 
      
        $sql = 'SELECT * FROM '.self::$table.' WHERE id = :id';
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
        $stmt->execute();
    
        if ($stmt->rowCount() > 0) {
            return $stmt->fetch(\PDO::FETCH_ASSOC);
        } else {
            return throw new \Exception('Nenhum usuário encontrado');
        }
    }

    public static function getUserAll()
    {
        $db = Connection::connect();

        if ($db instanceof \PDOException) {
            return $db;
        }

        $sql = 'SELECT * FROM '.self::$table;
        $stmt = $db->prepare($sql);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } else {
            return throw new \Exception('Nenhum usuário encontrado');
        }
    }

    public static function insert($data)
    {
        $db = Connection::connect();
    
        if ($db instanceof \PDOException) {
            return $db;
        } 

        if (!isset($data['name']) || empty($data['name'])) {
            return throw new \Exception('Campo nome está vazio ou indefinido');
        }

        $idRandon = rand(1000, 9999);      
        $sql = 'INSERT INTO '.self::$table.' (id, name, email) VALUES (:id, :name, :email)';
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $idRandon, \PDO::PARAM_INT);
        $stmt->bindParam(':name', $data['name'], \PDO::PARAM_STR);
        $stmt->bindParam(':email', $data['email'], \PDO::PARAM_STR);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return 'Usuário inserido com sucesso!';
        } else {
            return throw new \Exception('Falha ao inserir usuário');
        }
    }
}