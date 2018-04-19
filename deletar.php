<?php
 require_once 'conexao.php';

$pdo = conectar();

//Verifica id para deleção
if(!empty($_GET["id"])){
    //Recebendo parâmetros do navegador
    $id = addslashes(trim($_GET["id"]));
    echo "Parâmetros recebidos:<br/>";
    echo $id . "<br/>";
    $delecaoUsuario = $pdo->prepare("delete from usuarios where id = :id");
    $delecaoUsuario->bindValue(":id",$id);
    $delecaoUsuario->execute();
    if ($delecaoUsuario->rowCount() > 0) {
        echo "<h3>Usuário de id ".$id." deletado com sucesso!</h3>";
    } else {
        echo "<h3>Usuário não deletado!</h3>";
    }
} else{
    echo "Parâmetros de ID não foi fornecido!<br/>";
    echo "Para funcioar coloque na URL http://localhost/Conexao/deletar.php?id=3 br/>";
}