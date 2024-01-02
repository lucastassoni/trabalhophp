<?php
include_once 'conexao.php';
$idSkin = $_GET['id']; // Recebe o ID da skin a ser removida

$query = "DELETE FROM skins WHERE idskin = ?";
$stmt = mysqli_prepare($conexao, $query);

if (!$stmt) {
    die(json_encode(['success' => false, 'message' => 'Erro na preparação da remoção: ' . mysqli_error($conexao)]));
}

mysqli_stmt_bind_param($stmt, 'i', $idSkin);
mysqli_stmt_execute($stmt);

// Feche a conexão com o banco de dados
mysqli_close($conexao);

// Responda com JSON indicando sucesso
echo json_encode(['success' => true, 'message' => 'Skin removida com sucesso']);
?>