<?php
session_start();

$username = isset($_POST['usuario']) ? $_POST['usuario'] : null;
$email = isset($_POST['email']) ? $_POST['email'] : null;
$usersenha = isset($_POST['senha']) ? $_POST['senha'] : null;


include "conexao.php";

$fotoPath = null;
if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
    $uploadDir = 'uploads/';
    $uploadFileName = uniqid() . '_' . basename($_FILES['foto']['name']); 
    $uploadFile = $uploadDir . $uploadFileName;
    move_uploaded_file($_FILES['foto']['tmp_name'], $uploadFile);
    $fotoPath = $uploadFile;
}

if (isset($_POST['Incluir']) && !empty($_POST['usuario'])) {
    $db = mysqli_select_db($conexao, $banco);
    $grava = mysqli_query($conexao, "INSERT INTO usuario (nome, email, senha, dinheiro, foto) VALUES ('$username', '$email', '$usersenha', 100.00, '$fotoPath')");

    if ($grava == true) {
        
        $idDoUsuario = mysqli_insert_id($conexao);


        $_SESSION["id_usuario"] = $idDoUsuario;


        $cadastroSuccess = true;
    } else {
        die("Conexão falhou: " . mysqli_connect_error());
    }
}

mysqli_close($conexao);
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php if (isset($cadastroSuccess) && $cadastroSuccess): ?>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            icon: "success",
            title: "Cadastro efetuado com sucesso!",
            text: "Parabéns!",
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "login.php";
            }
        });
    });
    </script>
    <?php endif;?>
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

    <title>Cadastro</title>
</head>

<body>
    <form action="cadastro.php" method="POST" enctype="multipart/form-data">
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
                            <p id="login-text">Fazer Cadastro</p>
                        </div>
                    </div>
                    <div class="row user-input">
                        <div class="col-md-12 login-input-col">
                            <input class="login-input" type="text" placeholder="Nome de usuário" name="usuario"
                                required>
                        </div>
                    </div>
                    <div class="row user-input">
                        <div class="col-md-12 login-input-col">
                            <input class="login-input" type="email" placeholder="E-mail" name="email" required>
                        </div>
                    </div>
                    <div class="row user-input">
                        <div class="col-md-12 login-input-col">
                            <input class="login-input" type="password" placeholder="Senha" name="senha" required>
                        </div>
                    </div>
                    <div class="row user-input" style="display: flex;
    justify-content: center;
    align-items: center;
    height: 5%;
    width: 100%;">
                        <div class="col-md-12" style="display: flex;
    justify-content: center;
    align-items: center;
    height: 100%;
    width: 100%;">
                            <label style="color: white; margin-bottom: -10%; font-size: 18px" for="foto">Selecione uma
                                foto
                                de
                                perfil:</label>
                        </div>
                    </div>
                    <div class="row user-input">
                        <div class="col-md-12 login-input-col">
                            <input class="login-input" type="file" name="foto" accept="image/*">
                        </div>
                    </div>
                    <div class="row submit-area">
                        <div class="col-md-12 submit-col">
                            <button name="Incluir" class="submit-btn" type="submit"><img class="arrow-login"
                                    src="img/—Pngtree—right arrow_4421150.png" alt=""></button>
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