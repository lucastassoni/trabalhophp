<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION["nome_usuario"])) {
    // Se não estiver logado, redireciona para a página de login
    header("Location: login.php?msg=not_logged_in");
    exit();
}

// Recupera o nome do usuário da sessão
$nome_usuario = $_SESSION["nome_usuario"];

// Configurações do banco de dados
$servidor = "localhost";
$usuario_bd = "root";
$senha_bd = "root";
$banco = "bdoflegends";

$conn = mysqli_connect($servidor, $usuario_bd, $senha_bd, $banco);

// Verifica a conexão com o banco de dados
if (!$conn) {
    die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
}

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Processa os dados do formulário (excluir conta)
    $sql = "DELETE FROM usuario WHERE name = '$nome_usuario'";

    if (mysqli_query($conn, $sql)) {
        // Limpa os dados da sessão
        session_unset();
        session_destroy();
        header("Location: login.php"); // Redireciona para a página de login
        exit();
    } else {
        echo "Erro ao excluir a conta: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="pt-br">
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exclusão de perfil</title>
    <link rel="stylesheet" href="./css/style.css" type="text/css">
    <script src="./js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link type="image/png" rel="icon" href="img/LoL_icon.svg.png">
<body class="bg-edit">
<form class="main-editar" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

                    <h1 class="editar-msg">Excluir conta</h1>
                    <p class="editar-msg">Tem certeza de que deseja excluir sua conta?</p>
                    <input class="back-button" type="submit" value="Sim, Excluir Conta">

    </form>



</body>
</html>
