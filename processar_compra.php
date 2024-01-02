<?php
header('Content-Type: application/json');
session_start();
include_once 'conexao.php';

// Verifica se o usuário está logado
if (!isset($_SESSION["nome_usuario"])) {
    echo json_encode(['success' => false, 'title' => 'Erro!', 'message' => 'Você não está logado. Faça login para continuar.', 'icon' => 'error']);
    exit();
}

// Obtém o ID da skin a ser comprada a partir do parâmetro na URL
$idSkin = isset($_GET['id']) ? $_GET['id'] : '';

// Consulta ao banco de dados para obter o preço do item
$query = "SELECT idskin, preco FROM skins WHERE idskin = ?";
$stmt = mysqli_prepare($conexao, $query);

if (!$stmt) {
    echo json_encode(['success' => false, 'title' => 'Erro!', 'message' => 'Erro na preparação da consulta.', 'icon' => 'error']);
    exit();
}

mysqli_stmt_bind_param($stmt, 'i', $idSkin);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

if (!$result) {
    echo json_encode(['success' => false, 'title' => 'Erro!', 'message' => 'Erro na consulta ao banco de dados.', 'icon' => 'error']);
    exit();
}

$row = mysqli_fetch_assoc($result);

if (!$row) {
    echo json_encode(['success' => false, 'title' => 'Erro!', 'message' => 'Skin não encontrada.', 'icon' => 'error']);
    exit();
}

$precoSkin = $row['preco'];

// Obtém o ID do usuário
$userID = $_SESSION["id_usuario"];

// Consulta ao banco de dados para obter o dinheiro do usuário
$query = "SELECT dinheiro FROM usuario WHERE idusuario = ?";
$stmt = mysqli_prepare($conexao, $query);

if (!$stmt) {
    echo json_encode(['success' => false, 'title' => 'Erro!', 'message' => 'Erro na preparação da consulta.', 'icon' => 'error']);
    exit();
}

mysqli_stmt_bind_param($stmt, 'i', $userID);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

if (!$result) {
    echo json_encode(['success' => false, 'title' => 'Erro!', 'message' => 'Erro na consulta ao banco de dados.', 'icon' => 'error']);
    exit();
}

$row = mysqli_fetch_assoc($result);
$dinheiroUsuario = $row['dinheiro'];

// Verifica se o usuário tem dinheiro suficiente para comprar a skin
if ($dinheiroUsuario >= $precoSkin) {
    // Atualiza o dinheiro do usuário e realiza a compra
    $novoDinheiro = $dinheiroUsuario - $precoSkin;
    $atualizaQuery = "UPDATE usuario SET dinheiro = ? WHERE idusuario = ?";
    $stmt = mysqli_prepare($conexao, $atualizaQuery);

    if (!$stmt) {
        echo json_encode(['success' => false, 'title' => 'Erro!', 'message' => 'Erro na preparação da atualização.', 'icon' => 'error']);
        exit();
    }

    mysqli_stmt_bind_param($stmt, 'ii', $novoDinheiro, $userID);
    mysqli_stmt_execute($stmt);

    // Insere a skin no inventário do usuário
    $inserirQuery = "INSERT INTO inventario (id_usuario, id_item, quantidade) VALUES (?, ?, 1) ON DUPLICATE KEY UPDATE quantidade = quantidade + 1";
    $stmt = mysqli_prepare($conexao, $inserirQuery);

    if (!$stmt) {
        echo json_encode(['success' => false, 'title' => 'Erro!', 'message' => 'Erro na preparação da inserção no inventário.', 'icon' => 'error']);
        exit();
    }

    mysqli_stmt_bind_param($stmt, 'ii', $userID, $idSkin);
    mysqli_stmt_execute($stmt);

    // Responda com um JSON indicando o sucesso
    echo json_encode(['success' => true, 'title' => 'Sucesso!', 'message' => 'Skin adquirida com sucesso. Verifique seu inventário!', 'icon' => 'success']);
    exit();
} else {
    // Se o usuário não tiver dinheiro suficiente, responda com um JSON indicando o erro
    echo json_encode(['success' => false, 'title' => 'Erro!', 'message' => 'Você não possui dinheiro para adquirir esta skin. Verifique seu saldo.', 'icon' => 'error']);
    exit();
}

// Feche a conexão com o banco de dados
mysqli_close($conexao);
?>
