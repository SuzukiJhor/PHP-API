# PHP-API-USER

Api desenvolvida em PHP utilizando Mysql como banco de dados!; 
 - Listagem de usuários;
 - Criação de usuários;
 - Alteração de usuários;
 - Exclusão de usuários;


### ⠀🛡️ Api desenvolvida em Node.js utilizando Mysql como banco de dados!; 


### 🎯 BUSCAR TODOS OS USUARIOS.
  
### ```GET``` 
```URL
http://localhost:3000/api/user
```
  
```JSON
{
    "status": "success",
    "data": [
        {
            "id": 2,
            "name": "Ciclano",
            "email": "ciclano@example.com"
        },
        {
            "id": 3,
            "name": "Fulano",
            "email": "fulano@example.com"
        }
      ]
}
```
  
<br /> 

### 🎯BUSCAR USUARIO ATRAVÉS DO ID.
  
### ```GET``` 
```URL
http://localhost:3000/api/user/ID 
```
  
```JSON
{
    "status": "success",
    "data": {
        "id": 2,
        "name": "Ciclano",
        "email": "ciclano@example.com"
    }
}
```
  
<br /> 

### 🎯 INSERÇÃO DE UM USUARIO NO BANCO DE DADOS.
  
### ```POST``` 

```URL

http://localhost:8070/api/user
```

### ```Payload``` 
```body
{
    "name": "novoUsuario222",
    "email": "newUser@example.com"
}
 
```
  
```JSON
{
    "status": "success",
    "data": "Usuário inserido com sucesso!"
}

```

> Em caso de inserção duplicada;

```JSON
{
   "status": "error",
    "data": "Email já existe."
}

```
<br /> 
