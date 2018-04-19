<?php

include_once 'conexao.php';

$pdo = conectar();

if (!empty($_GET["Email"])) {


//Prepara o cadastro
$email = addslashes(trim($_GET["email"]));
    $email = $_GET["email"];
    $cadastro = $pdo->prepare("insert into usuarios (email) values (:email)");
    $cadastro->bindValue(":email", $email);

//Procura no banco registro com o mesmo nome
    $validar = $pdo->prepare("select * from usuarios where email = :email");
    $validar->bindValue(":email", $email);
    $validar->execute();

//Inclui registro se o mesmo não existir
    if ($validar->rowCount() == 0) {
        //Gravando registro no banco
        $cadastro->execute();
        echo "Email " . $email . " cadastrado com sucesso!";
    } else {
        echo "Já existe este email cadastrado!";
    }
} else {    
    echo "Para funcinar passar na URL paramentros ex.: http://localhost/Conexao/insert.php?email=teste@teste<br/>";
}



