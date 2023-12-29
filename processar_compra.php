<?php
session_start();

include_once 'conexao.php';

// Verifica se o usuário está logado
if (!isset($_SESSION["nome_usuario"])) {
    header("Location: login.php");
    exit();
}

// Obtém o item a ser comprado a partir do parâmetro na URL
$item = isset($_GET['item']) ? $_GET['item'] : '';

// Consulta ao banco de dados para obter o preço do item
$query = "SELECT idskin, preco FROM skins WHERE nome = ?";
$stmt = mysqli_prepare($conexao, $query);

if (!$stmt) {
    die("Erro na preparação da consulta: " . mysqli_error($conexao));
}

mysqli_stmt_bind_param($stmt, 's', $item);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

if (!$result) {
    die("Erro na consulta ao banco de dados: " . mysqli_error($conexao));
}

$row = mysqli_fetch_assoc($result);
$idItem = $row['idskin'];  // Adiciona esta linha para obter o ID do item
$precoItem = $row['preco'];

// Obtém o ID do usuário
$userID = $_SESSION["id_usuario"];

// Consulta ao banco de dados para obter o dinheiro do usuário
$query = "SELECT dinheiro FROM usuario WHERE idusuario = ?";
$stmt = mysqli_prepare($conexao, $query);

if (!$stmt) {
    die("Erro na preparação da consulta: " . mysqli_error($conexao));
}

mysqli_stmt_bind_param($stmt, 'i', $userID);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

if (!$result) {
    die("Erro na consulta ao banco de dados: " . mysqli_error($conexao));
}

$row = mysqli_fetch_assoc($result);
$dinheiroUsuario = $row['dinheiro'];

// Verifica se o usuário tem dinheiro suficiente para comprar o item
if ($dinheiroUsuario >= $precoItem) {
    // Atualiza o dinheiro do usuário e realiza a compra
    $novoDinheiro = $dinheiroUsuario - $precoItem;
    $atualizaQuery = "UPDATE usuario SET dinheiro = ? WHERE idusuario = ?";
    $stmt = mysqli_prepare($conexao, $atualizaQuery);

    if (!$stmt) {
        die("Erro na preparação da atualização: " . mysqli_error($conexao));
    }

    mysqli_stmt_bind_param($stmt, 'ii', $novoDinheiro, $userID);
    mysqli_stmt_execute($stmt);

    // Insere o item no inventário do usuário
    $inserirQuery = "INSERT INTO inventario (id_usuario, id_item, quantidade) VALUES (?, ?, 1) ON DUPLICATE KEY UPDATE quantidade = quantidade + 1";
    $stmt = mysqli_prepare($conexao, $inserirQuery);

    if (!$stmt) {
        die("Erro na preparação da inserção no inventário: " . mysqli_error($conexao));
    }

    mysqli_stmt_bind_param($stmt, 'ii', $userID, $idItem);
    mysqli_stmt_execute($stmt);

    // Adicione aqui qualquer lógica adicional relacionada à compra do item

    // Redireciona de volta à página do carrossel

    echo '<script>';
    echo 'alert("Skin adqurida com sucesso, verifique seu inventário! Sua página vai recarregar após sua confirmação.");';
    echo 'window.location.href = "skins.php";'; // Redireciona após clicar em OK
    echo '</script>';
    exit();
} else {
    // Se o usuário não tiver dinheiro suficiente, redireciona para alguma página de aviso
    echo '<script>';
    echo 'alert("Você não possui dinheiro para adquirir esta skin! Verifique seu saldo.");';
    echo 'window.location.href = "skins.php";'; // Redireciona após clicar em OK
    echo '</script>';
    exit();
}

// Feche a conexão com o banco de dados
mysqli_close($conexao);
?>