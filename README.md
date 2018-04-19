<?php

PDO_PHP_CRUD

try {
$pdo = new PDO("mysql:host=localhost;dbname=sistemahx", "dumon", "dumon");
} catch (PDOException $ex) {
echo $ex-getMessage();
}

//Select Vinculo*********** 
$buscasegura = $pdo->prepare("select * from usuarios where id = :id and email = :email");
$buscasegura->bindValue(":id", $id);
$buscasegura->bindValue(":email", "dumon.dmd@hotmail.com");
$buscasegura->execute();
echo $buscasegura->rowCount();

//Insert Vinculo 
$email = $_GET["email"];
//Passado no navegador ?email=teste@teste.com 
$insertseguro = $pdo->prepare("insert into usuarios (email) values (:email)");
$insertseguro->bindValue(":email", $email);
$insertseguro->execute();
*/
//Cadastro com verificação de preexistencia de campos********

//Prepara o cadastro
$email = $_GET["email"];
$cadastro = $pdo->prepare("insert into usuarios (email) values (:email)");
$cadastro->bindValue(":email", $email);

//Procura no banco registro com o mesmo nome $validar = $pdo->prepare("select * from usuarios where email = :email");
$validar->bindValue(":email", $email);
$validar->execute();

//Inclui registro se o mesmo não existir if($validar->rowCount() == 0){ 
Gravando registro no banco $cadastro->execute();
echo "Email ".$email." cadastrado com sucesso!";
}else { echo "Já existe este email cadastrado!"; 
} 

Criação do banco de dados do exemplo:
CREATE TABLE usuarios ( id int(11) NOT NULL AUTO_INCREMENT,
 nome varchar(45) DEFAULT NULL,
 end varchar(45) DEFAULT NULL,
 email varchar(45) DEFAULT NULL,
 senha varchar(45) DEFAULT NULL,
 nivel int(11) DEFAULT NULL,
 status int(11) DEFAULT NULL,
 PRIMARY KEY (id) ) ENGINE = InnoDB AUTO_INCREMENT = 3 DEFAULT CHARSET = utf8;
