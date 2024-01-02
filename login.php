<?php

session_start();
unset($_SESSION["loginError"]);
if (isset($_SESSION["nome_usuario"])) {
    header("Location: principal.php");
    exit();
}

include "conexao.php";

// Função para buscar o email do usuário no banco de dados
function buscarEmailDoBanco($nome_usuario)
{
    global $conexao;

    $consulta = mysqli_query($conexao, "SELECT email FROM usuario WHERE nome='$nome_usuario'");
    $row = mysqli_fetch_assoc($consulta);

    return $row["email"];
}

// Função para buscar a senha do usuário no banco de dados
function buscarSenhaDoBanco($nome_usuario)
{
    global $conexao;

    $consulta = mysqli_query($conexao, "SELECT senha FROM usuario WHERE nome='$nome_usuario'");
    $row = mysqli_fetch_assoc($consulta);

    return $row["senha"];
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["nome_usuario"]) && !empty($_POST["senha"])) {
    $nome_usuario = $_POST["nome_usuario"];
    $senha = $_POST["senha"];

    $consulta = mysqli_query($conexao, "SELECT idusuario, foto FROM usuario WHERE nome='$nome_usuario' AND senha='$senha'");

    if (mysqli_num_rows($consulta) == 1) {
        $row = mysqli_fetch_assoc($consulta);
        $_SESSION["nome_usuario"] = $nome_usuario;
        $_SESSION["id_usuario"] = $row["idusuario"];
        $_SESSION["fotoPath"] = $row["foto"];
        $_SESSION["email"] = buscarEmailDoBanco($nome_usuario); // Adicione esta linha
        $_SESSION["senha_usuario"] = buscarSenhaDoBanco($nome_usuario); // Ajuste aqui

        // Remove o indicador de mensagem exibida na $_SESSION
        unset($_SESSION['welcome_message_displayed']);

        header("Location: principal.php");
        exit();
    } else {
        $_SESSION["loginError"] = true;
    }

    mysqli_close($conexao);
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php if (isset($_SESSION["loginError"]) && $_SESSION["loginError"]): ?>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            icon: "error",
            title: "Erro",
            text: "Credenciais inválidas. Tente novamente."
        });
    });
    </script>
    <?php /* unset($_SESSION["loginError"]); */endif;?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css" type="text/css">
    <script src="./js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Login</title>
</head>

<body>
    <form action="login.php" method="POST">
        <div class="container-fluid">
            <div class="row main-login">
                <div class="col-md-4 login-area">
                    <div class="row login-logo">
                        <div class="col-md-12 login-col">
                            <img class="home hover-image lol-center-icon lol-logo-login2-icon"
                                src="img/LoL_icon.svg.png" alt="Logo">
                            <img class="home hover-image lol-center-icon2 lol-logo-login2" src="img/lol-logo.png"
                                alt="Logo">
                        </div>

                    </div>
                    <div class="row text-row">
                        <div class="col-md-12 login-text-col">
                            <p id="login-text">Fazer Login</p>
                        </div>
                    </div>
                    <div class="row user-input">
                        <div class="col-md-12 login-input-col">
                            <input class="login-input" type="text" placeholder="Nome de usuário" name="nome_usuario"
                                value="<?php echo isset($_POST['nome_usuario']) ? htmlspecialchars($_POST['nome_usuario']) : ''; ?>"
                                required>
                        </div>
                    </div>
                    <div class="row user-input">
                        <div class="col-md-12 login-input-col">
                            <input class="login-input" type="password" placeholder="Senha" name="senha"
                                value="<?php echo isset($_POST['senha']) ? htmlspecialchars($_POST['senha']) : ''; ?>"
                                required>

                        </div>
                    </div>
                    <div class="row submit-area">
                        <div class="col-md-6 submit-col">
                            <button style="color: #292929;" class="submit-btn" type="submit">
                                <p class="p-login-cadastro">Acessar</p><img class="arrow-login"
                                    src="img/—Pngtree—right arrow_4421150.png" alt="">
                            </button>
                        </div>

                        <div class="col-md-6 submit-col">
                            <button class="submit-btn" type="button" id="meuBotao">
                                <p class="p-login-cadastro">Registrar</p><img class="arrow-login"
                                    src="img/—Pngtree—right arrow_4421150.png" alt="">
                            </button>
                        </div>
                    </div>



                </div>
                <div class="col-md-8 image-area">
                    <video autoplay loop muted playsinline id="background-video-login"
                        src="img/SnapInsta.io-Season 2019 _ Login Screen - League of Legends-(1080p).mp4"
                        type="video/mp4"></video>
                </div>
            </div>
        </div>
    </form>

    <script>
    // Obtém o elemento do botão pelo ID
    var meuBotao = document.getElementById('meuBotao');

    // Adiciona um ouvinte de evento para o clique no botão
    meuBotao.addEventListener('click', function() {
        // Redireciona para a URL desejada
        window.location.href = 'cadastro.php';
    });
    </script>
</body>

</html>