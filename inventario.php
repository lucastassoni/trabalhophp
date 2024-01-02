<?php
session_start();

if (!isset($_SESSION["nome_usuario"])) {
    header("Location: login.php?msg=not_logged_in");
    exit();
}

include "conexao.php";
$userID = $_SESSION["id_usuario"];

$db = mysqli_select_db($conexao, $banco);
if (!$db) {
    die("Erro ao selecionar o banco de dados: " . mysqli_error($conexao));
}

$consulta = mysqli_query($conexao, "SELECT skins.idskin, skins.preco, skins.imagem FROM skins INNER JOIN inventario ON skins.idskin = inventario.id_item WHERE inventario.id_usuario = $userID");

if ($consulta === false) {
    die("Erro na consulta SQL: " . mysqli_error($conexao));
}

// Adicionando debug
if ($consulta === null) {
    die("Consulta retornou nulo. Verifique a query ou a conexão com o banco de dados.");
}

?>

<!DOCTYPE html>
<html>

<head>
    <link type="image/jpg" rel="icon" href="img/hextech_chest.png">
    <link rel="stylesheet" href="./css/style.css" type="text/css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <title>Inventário de Skins</title>
</head>

<body class="bg-inv">
    <button class="back-btn" type="button" id="meuBotao">
        <p class="p-login-cadastro">Voltar</p><img class="arrow-login" src="img/arrow_left.png" alt="">
    </button>

    <div class="main-editar-inv">
        <h1 class="editar-msg">Inventário de Skins</h1>
        <div class="skin-gallery">
            <?php
// Exibir as imagens das skins
while ($row = mysqli_fetch_assoc($consulta)) {
    echo '<div class="skin-container">';
    echo '<img src="' . $row['imagem'] . '" class="skin-image" alt="Skin">';
    echo '<button class="sell-button" onclick="venderSkin(' . $row['idskin'] . ', ' . $row['preco'] . ')">Vender</button>';
    echo '</div>';
}

// Se não houver imagens, exibir mensagem
if (mysqli_num_rows($consulta) === 0) {
    echo '<p class="editar-msg-bugado">O usuário não possui skins no inventário.</p>';
}
?>
        </div>
    </div>
    <script>
        var meuBotao = document.getElementById('meuBotao');

        meuBotao.addEventListener('click', function () {
            window.location.href = 'principal.php';
        });

        function venderSkin(idskin, preco) {
            // Confirme se o usuário realmente deseja vender a skin
            Swal.fire({
                title: 'Você tem certeza?',
                text: 'Esta ação não pode ser revertida!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sim, vender!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Faça uma solicitação AJAX para processar a venda
                    $.ajax({
                        url: 'processar_venda.php',
                        type: 'POST',
                        data: { idskin: idskin, preco: preco },
                        dataType: 'json',
                        success: function (response) {
                            if (response.success) {
                                // Atualize a página ou realize ações necessárias
                                location.reload();
                            } else {
                                // Exiba mensagem de erro
                                Swal.fire({
                                    title: 'Erro!',
                                    text: response.message,
                                    icon: 'error'
                                });
                            }
                        },
                        error: function () {
                            // Exiba mensagem de erro em caso de falha na requisição AJAX
                            console.error('Erro na requisição AJAX.');
                        }
                    });
                }
            });
        }
    </script>
</body>

</html>

<?php
mysqli_close($conexao);
?>
