<?php
session_start();

if (isset($_SESSION["nome_usuario"])) {
    header("Location: principal.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $valid_username = "lucas";
    $valid_password = "123123";

    $nome_usuario = $_POST["nome_usuario"];
    $senha = $_POST["senha"];

    if ($nome_usuario == $valid_username && $senha == $valid_password) {
        $_SESSION["nome_usuario"] = $nome_usuario;
        header("Location: principal.php");
        exit();
    } else {
        echo '<script>alert("Credenciais inválidas. Tente novamente.");</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css" type="text/css">
    <script src="./js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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
                                required>
                        </div>
                    </div>
                    <div class="row user-input">
                        <div class="col-md-12 login-input-col">
                            <input class="login-input" type="password" placeholder="Senha" name="senha" required>
                        </div>
                    </div>
                    <div class="row submit-area">
                        <div class="col-md-6 submit-col">
                            <button class="submit-btn" type="submit"><img class="arrow-login"
                                    src="img/—Pngtree—right arrow_4421150.png" alt=""></button>
                        </div>
                        <div class="col-md-6 submit-col-cadastro">
                            <button class="submit-btn-cadastro" type="button"><p id="Cadastro-text meuBotao">Cadastre-se</p></button>
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
</body>

</html>