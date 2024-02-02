<?php

use App\Models\User;


it('testa conexão com banco de dados', function () {
    $db = new \PDO(DBDRIVE.":host=".DBHOST.";dbname=".DBNAME, DBUSER, DBPASS);
    $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

    $this->assertInstanceOf(PDO::class, $db);

})->skip(!('DB_CONNECTION')); // Pule o teste se a conexão com o banco de dados não estiver configurada

it('teste metodo de buscar usuario', function(){
    //Arange
    $id = 123;

    //Act
    $user = new User();
    $userId = $user::getUser($id);

    // Assert
    expect($user)->toBeArray(); 
    expect($user)->toHaveKey('id'); 
    expect($user['id'])->toBe($userId); 
})->skip(!('DB_CONNECTION'));