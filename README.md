# PHP-API-USER

### 🛡️ Api desenvolvida em PHP utilizando Mysql como banco de dados!; 
 - Listagem de usuários;
 - Criação de usuários;
 - Alteração de usuários;
 - Exclusão de usuários;

<br/>

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

### 🎯 ALTERAÇÃO DE UM USUARIO.
  
### ```PUT``` 

```URL

http://localhost:8070/api/user/ID
```

### ```Payload``` 
```body
{
    "name": "usuarioAlterado",
    "email": "EmailAlterado@example.com"
}
 
```
  
```JSON
{
   "status": "success",
   "data": "Usuário alerado com sucesso!"
}

```
<br /> 


### 🎯 EXCLUSÃO DE UM USUARIO ATRAVÉS DO ID.
  
### ```DELETE``` 

```URL

http://localhost:8070/api/user/ID
```

```JSON
{
    "status": "success",
    "data": "Usuário deletado com sucesso!"
}

```
<br /> 

## 🧪 Dependências
> Requisitos para rodar o codigo..

 ###  💻 PRÉ-REQUISITOS

> Antes de começar, certifique-se de ter os seguintes requisitos instalados no seu ambiente de desenvolvimento:

- PHP
- Composer (para instalação de dependências)
- MySQL Server

  

> Caso tenha Git basta da git clone, caso não tenha baixe o projeto completo em dowload.

```BASH
git clone https://github.com/SuzukiJhor/PHP-API.git
```
> Navegue até o diretório do projeto.

```BASH
cd PHP-API
```
<br /> 

> Caso já tenha o composer em sua maquina basta instalar o projeto com composer i:

```BASH
composer install
```

## > Para usar o Mysql utilizando variáveis de ambiente

> Crie um arquivo .env na raiz do projeto e configure as variáveis de ambiente:

```
DB_HOST=seu-host
DB_USER=seu-usuario
DB_PASSWORD=sua-senha
DB_DATABASE=seu-banco-de-dados

```

### > Para subir um servidor usando o PHP 8

```
php -S localhost:8070 
```

<br /> 

## `📖 Scripts` 

```JSON
  "scripts": {
    "start": "nodemon ./src/server.js",
    "test": "echo \"Error: no test specified\" && exit 1"
  }

```

<br/>

## `📖 Dependencies` 

```JSON
  "require": {
        "symfony/http-foundation": "^6.3"
    }

```
