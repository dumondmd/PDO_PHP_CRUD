<?php

include_once 'conexao.php';
$pdo = conectar();

$buscarUsuario = $pdo->prepare("select * from usuarios");
$buscarUsuario->execute();

$linha = $buscarUsuario->fetchAll(PDO::FETCH_ASSOC);
foreach ($linha as $listar) {
    echo "ID: " . $listar["id"] . " <br/>";
    echo "Nome: " . $listar["nome"] . " <br/>";
    echo "Endereço: " . $listar["end"] . " <br/>";
    echo "Senha: " . $listar["senha"] . " <br/>";
    echo "Email: " . $listar["email"] . " <br/>";
    echo "Nível: " . $listar["nivel"] . " <br/>";
    echo "Status: " . $listar["status"] . " <br/>";
    echo "<h3>=======================</h3><br/>";
}