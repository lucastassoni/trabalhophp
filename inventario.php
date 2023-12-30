<?php
session_start();

if (!isset($_SESSION["nome_usuario"])) {
    header("Location: login.php?msg=not_logged_in");
    exit();
}

include("conexao.php");
$userID = $_SESSION["id_usuario"];


$db = mysqli_select_db($conexao, $banco);
if (!$db) {
    die("Erro ao selecionar o banco de dados: " . mysqli_error($conexao));
}

$consulta = mysqli_query($conexao, "SELECT skins.imagem FROM skins INNER JOIN inventario ON skins.idskin = inventario.id_item WHERE inventario.id_usuario = $userID");

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
    <title>Inventário de Skins</title>
    <style>
    /* Estilos para exibir as imagens */
    .skin-image {
        width: 150px;
        height: 150px;
        object-fit: contain;
        margin: 5px;
        box-shadow: 0px 0px 15px 0px rgba(0, 0, 0, 0.75);
        border-radius: 5px;
    }
    </style>
</head>

<body style="background-image: url('./img/bg-inv_auto_x2.jpg');
    height: 100vh;
    width: 100vw;
    background-size: 100% 100%;
    background-repeat: no-repeat; overflow: hidden  ">
    <button class="back-btn" type="button" id="meuBotao">
        <p class="p-login-cadastro">Voltar</p><img class="arrow-login" src="img/arrow_left.png" alt="">
    </button>
    <h1>Inventário de Skins</h1>

    <div class="skin-gallery">
        <?php
        // Exibir as imagens das skins
        while ($row = mysqli_fetch_assoc($consulta)) {
            echo '<img src="' . $row['imagem'] . '" class="skin-image" alt="Skin">';
        }
        
        // Se não houver imagens, exibir mensagem
        if (mysqli_num_rows($consulta) === 0) {
            echo "O usuário não possui skins no inventário.";
        }
        ?>
    </div>

    <script>
    var meuBotao = document.getElementById('meuBotao');

    meuBotao.addEventListener('click', function() {

        window.location.href = 'principal.php';
    });
    </script>
</body>

</html>

<?php
mysqli_close($conexao);
?>