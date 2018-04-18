<?php
include_once 'conexao.php';
$pdo=conectar();

$buscarUsuario = $pdo->prepare("select * from usuarios");
$buscarUsuario->execute();

$linha = $buscarUsuario->fetchAll(PDO::FETCH_ASSOC);
foreach($linha as $listar){
    echo "Email: ".$listar["email"]." <br/>";
}