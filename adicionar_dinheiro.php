<?php
session_start();
include "conexao.php";


if (!isset($_SESSION["id_usuario"])) {

    echo json_encode(array("success" => false, "message" => "Usuário não autenticado."));
    exit();
}

$userID = $_SESSION["id_usuario"];
$valorAdicional = 10;
$queryAtualizaDinheiro = "UPDATE usuario SET dinheiro = dinheiro + $valorAdicional WHERE idusuario = $userID";
$resultadoAtualizaDinheiro = mysqli_query($conexao, $queryAtualizaDinheiro);

if ($resultadoAtualizaDinheiro) {

    echo json_encode(array("success" => true, "message" => "Dinheiro adicionado com sucesso!"));
} else {

    echo json_encode(array("success" => false, "message" => "Falha ao adicionar dinheiro."));
}

mysqli_close($conexao);
?>
