<?php

include_once "conexao.php";
$pdo = conectar();

$buscadeUsuario = $pdo->prepare("update usuarios set nome = :nome");
$buscarUsuario->execute();
