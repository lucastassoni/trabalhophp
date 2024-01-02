<?php
session_start();
include "conexao.php";

// Verifica se o usuário está logado
if (!isset($_SESSION["id_usuario"])) {
    // Se não estiver logado, retorna um erro
    echo json_encode(array("success" => false, "message" => "Usuário não autenticado."));
    exit();
}

$userID = $_SESSION["id_usuario"];

// Valor a ser adicionado (pode ser ajustado conforme necessário)
$valorAdicional = 10;

// Atualiza o valor no banco de dados
$queryAtualizaDinheiro = "UPDATE usuario SET dinheiro = dinheiro + $valorAdicional WHERE idusuario = $userID";
$resultadoAtualizaDinheiro = mysqli_query($conexao, $queryAtualizaDinheiro);

if ($resultadoAtualizaDinheiro) {
    // Retorna sucesso para o JavaScript
    echo json_encode(array("success" => true, "message" => "Dinheiro adicionado com sucesso!"));
} else {
    // Retorna erro para o JavaScript em caso de falha na atualização do banco de dados
    echo json_encode(array("success" => false, "message" => "Falha ao adicionar dinheiro."));
}

mysqli_close($conexao);
