<?php

include_once "conexao.php";
$pdo = conectar();
//Verifica os dados necessarios para a atualização
if (!empty($_GET["nome"]) && !empty($_GET["email"]) && !empty($_GET["id"])) {


//Recebendo dados do navegador
    $nome = addslashes(trim($_GET["nome"]));
    $email = addslashes(trim($_GET["email"]));
    $id = addslashes(trim($_GET["id"]));
    echo "Parâmetros recebidos:<br/>";
    echo "<br/>Nome: " . $nome . "<br/>Email: " . $email . "<br/>Id.: " . $id . "<br/>";
    $buscadeUsuario = $pdo->prepare("update usuarios set nome = :nome, email = :email where id = :id");
    $buscadeUsuario->bindValue(":nome", $nome);
    $buscadeUsuario->bindValue(":email", $email);
    $buscadeUsuario->bindValue(":id", $id);
    $buscadeUsuario->execute();
    if ($buscadeUsuario->rowCount() > 0) {
        echo "<h3>Atualizado com sucesso no Banco de Dados!</h3>";
    } else {
        echo "<h3>Usuário não atulizado!</h3>";
    }


    $usuarioAtualizado = $pdo->prepare("select * from usuarios where id = :id");
    $usuarioAtualizado->bindValue(":id", $id);
    $usuarioAtualizado->execute();

    $linha = $usuarioAtualizado->fetchAll(PDO::FETCH_ASSOC);
    echo "Consulta do banco de dados: <br/>";
    foreach ($linha as $listar) {
        echo "ID: " . $listar["id"] . " <br/>";
        echo "Nome: " . $listar["nome"] . " <br/>";
        echo "Email: " . $listar["email"] . " <br/>";
    }
} else {
    echo "Parâmetros vazios!<br/>";
    echo "Para funcionar coloque na URL http://localhost/Conexao/update.php?nome=rodrigo&email=rodrigo@ti.com&id=3<br/>";
}