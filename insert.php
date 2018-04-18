<?php
include_once 'conexao.php';
$pdo = conectar();
//Cadastro com verificação de preexistencia de campos********

//Prepara o cadastro

$email = $_GET["email"];
$cadastro = $pdo->prepare("insert into usuarios (email) values (:email)");
$cadastro->bindValue(":email", $email);

//Procura no banco registro com o mesmo nome
$validar = $pdo->prepare("select * from usuarios where email = :email");
$validar->bindValue(":email", $email);
$validar->execute();

//Inclui registro se o mesmo não existir
if($validar->rowCount() == 0){
    //Gravando registro no banco
    $cadastro->execute();
    echo "Email ".$email." cadastrado com sucesso!";
}else {
    echo "Já existe este email cadastrado!";
}



