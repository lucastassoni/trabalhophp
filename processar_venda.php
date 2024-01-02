<?php
session_start();

if (!isset($_SESSION["nome_usuario"])) {
    header("Location: login.php?msg=not_logged_in");
    exit();
}

include "conexao.php";
$userID = $_SESSION["id_usuario"];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['idskin']) && isset($_POST['preco'])) {
    $idskin = $_POST['idskin'];
    $preco = $_POST['preco'];

    // Verifique se o usuário possui dinheiro suficiente para vender a skin
    $queryDinheiro = "SELECT dinheiro FROM usuario WHERE idusuario = $userID";
    $resultDinheiro = mysqli_query($conexao, $queryDinheiro);

    if ($resultDinheiro) {
        $rowDinheiro = mysqli_fetch_assoc($resultDinheiro);

        if ($rowDinheiro) {
            $dinheiroAtual = $rowDinheiro['dinheiro'];

            // Adicione o valor da skin ao dinheiro do usuário
            $novoDinheiro = $dinheiroAtual + $preco;

            // Atualize o dinheiro do usuário
            $queryAtualizarDinheiro = "UPDATE usuario SET dinheiro = $novoDinheiro WHERE idusuario = $userID";
            $resultAtualizarDinheiro = mysqli_query($conexao, $queryAtualizarDinheiro);

            if ($resultAtualizarDinheiro) {
                // Lógica para remover a skin do inventário (vender)
                $queryRemoverSkin = "DELETE FROM inventario WHERE id_usuario = $userID AND id_item = $idskin";
                $resultRemoverSkin = mysqli_query($conexao, $queryRemoverSkin);

                if ($resultRemoverSkin) {
                    // Resposta JSON indicando o sucesso da venda
                    $response = array('success' => true, 'message' => 'Skin vendida com sucesso.');
                    echo json_encode($response);
                    exit();
                }
            }
        }
    }

    // Resposta JSON em caso de falha na lógica de venda
    $response = array('success' => false, 'message' => 'Falha ao vender a skin.');
    echo json_encode($response);
    exit();
}

// Resposta JSON em caso de requisição inválida
$response = array('success' => false, 'message' => 'Requisição inválida.');
echo json_encode($response);
exit();
?>
