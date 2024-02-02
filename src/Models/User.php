<?php 

namespace App\Models;

use App\Services\Connection;

class User 
{
    private static $table = 'user';

    public static function getUser(int $id)
    {
        $db = Connection::connect();
    
        if ($db instanceof \PDOException) {
            throw new \Exception('Problemas conexão banco de dados.');
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
            throw new \Exception('Problemas conexão banco de dados.');
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

    public static function insert($data)
    {
        $db = Connection::connect();
    
        if ($db instanceof \PDOException) {
            new \Exception('Problemas conexão banco de dados.');
        }

        if (!isset($data['name']) || empty($data['name'])) {
           throw new \Exception('Campo nome está vazio ou indefinido');
        }

        if (!isset($data['email']) || empty($data['email'])) {
            throw new \Exception('Campo email está vazio ou indefinido');
        } 
        
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            throw new \Exception('Campo email não é válido.');
        }

        $sql = 'SELECT id FROM ' . self::$table . ' WHERE email = :email';
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':email', $data['email'], \PDO::PARAM_STR);
        $stmt->execute();
        
        if ($stmt->rowCount() > 0) {
            throw new \Exception('Email já existe.');
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
            throw new \Exception('Falha ao inserir usuário');
        }
    }

    public static function delete($id)
    {
        $db = Connection::connect();
    
        if ($db instanceof \PDOException) {
            throw new \Exception('Problemas conexão banco de dados.');
        }
    
        $user = self::getUser($id);

        if (!$user) {
            throw new \Exception('Usuário não encontrado');
        }
        
        $sql = 'DELETE FROM '.self::$table.' WHERE id = :id';
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return 'Usuário deletado com sucesso!';
        } else {
            throw new \Exception('Falha ao deletar usuário.');
        }
    }

    public static function update($data, $id)
    {
        $db = Connection::connect();
    
        if ($db instanceof \PDOException) {
            throw new \Exception('Problemas conexão banco de dados.');
        }
        
        $user = self::getUser($id);

        if (!$user) {
            throw new \Exception('Usuário não encontrado');
        }

        if (!isset($data['name']) || empty($data['name'])) {
            throw new \Exception('Campo nome está vazio ou indefinido.');
        }

        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            throw new \Exception('Campo email não é válido.');
        }

        $name = $data['name'];
        $email = $data['email'];

        $sql = 'UPDATE '.self::$table.' SET name = :name, email = :email WHERE id = :id';
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':name', $name, \PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, \PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return 'Usuário alerado com sucesso!';
        } else {
            throw new \Exception('Falha ao alterar usuário.');
        }
    }
}