<?php
// Inicia a sessão (caso não tenha sido iniciada)
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION["nome_usuario"])) {
    // Se não estiver logado, redireciona para a página de login
    header("Location: login.php");
    exit();
}
$nome_usuario = $_SESSION["nome_usuario"];
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css" type="text/css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <header>
        <nav class="navbar navbar-expand-lg bg-dark header">
            <div class="container-fluid">
                <a class="navbar-brand mx-auto" href="principal.php">
                    <img class="home hover-image lol-center-icon" src="img/LoL_icon.svg.png" alt="Logo">
                    <img class="home hover-image lol-center-icon2" src="img/lol-logo.png" alt="Logo">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link btn btn-primary botao" aria-current="page" href="skins.php"
                                role="button">Skins</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-primary botao" aria aria-current="page" href="yone.php"
                                role="button">Yone</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link btn btn-primary botao" aria aria-current="page" href="habilidades.php"
                                role="button">Habilidade</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-primary botao" aria aria-current="page" href="highlights.php"
                                role="button">Highlights</a>
                        </li>
                    </ul>
                </div>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <span class="nav-link text-light">Usuário: <?php echo $nome_usuario; ?></span>
                        </li>
                        <li class="nav-item dropdown op-class">
                            <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdownMenuLink"
                                role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false"><img
                                    style="width: 1.5vw; height: 3vh" src="./img/engrenagem.png" alt="opçoes">
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="editar_perfil.php">Editar Perfil</a>
                                <a class="dropdown-item" href="excluir_conta.php">Excluir Conta</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php">Sair</a>
                            </div>
                        </li>
                    </ul>
                </div>
        </nav>
    </header>

    <iframe id="fundo-highlight" src="https://www.youtube.com/embed/yFNpO_PtTIQ"
        title="Yone &amp; Yasuo Montage #2 - Brothers Combo" frameborder="0"
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
        allowfullscreen></iframe>

    <div class="container-fluid" id="main-habilidades">
        <div class="row section-habilidades">
            <div class="col-md-6 linha-test">
                <div class="row hb-yone-yasuo">
                    <div class="col-md-2 linha-test">
                        <div class="row coluninha">
                            <div class="col-md-12 linha-test">
                                <img class="icon icon-yone" src="img/yone-icon.jpg" alt="yone">
                            </div>
                        </div>
                        <div class="row coluninha">
                            <div class="col-md-12 linha-test">
                                <img class="icon icon-yone-p" src="img/Icon_Yone_Passive.jpg" alt="yone">
                            </div>
                        </div>
                        <div class="row coluninha">
                            <div class="col-md-12 linha-test">
                                <img class="icon icon-yone-q" src="img/Icon_Yone_Q.jpg" alt="yone">
                            </div>
                        </div>
                        <div class="row coluninha">
                            <div class="col-md-12 linha-test">
                                <img class="icon icon-yone-w" src="img/Icon_Yone_W.jpg" alt="yone">
                            </div>
                        </div>
                        <div class="row coluninha">
                            <div class="col-md-12 linha-test">
                                <img class="icon icon-yone-e" src="img/Icon_Yone_E.jpg" alt="yone">
                            </div>

                        </div>
                        <div class="row coluninha">
                            <div class="col-md-12 linha-test">
                                <img class="icon icon-yone-r" src="img/Icon_Yone_R.jpg" alt="yone">
                            </div>
                        </div>
                    </div>
                    <div class="video-container-p col-md-10 linha-test-video">
                        <video id="video-explicativo-p" class="video-overlay" autoplay loop muted>
                            <source src="img/ability-p-yone.mp4" type="video/mp4">
                        </video>
                    </div>

                </div>
            </div>
            <div class="col-md-6 linha-test">
                <div class="row hb-yone-yasuo">
                    <div class="video-container-yasuo-p col-md-10 linha-test-video">
                        <video id="video-explicativo-yasuo-p" class="video-overlay" autoplay loop muted>
                            <source src="img/ability-p-yasuo.webm" type="video/webm">
                        </video>
                    </div>




                    <div class="col-md-2 linha-test">
                        <div class="row coluninha">
                            <div class="col-md-12 linha-test">
                                <img class="icon icon-yasuo" src="img/yasuoicon.jpg" alt="yasuo">
                            </div>
                        </div>
                        <div class="row coluninha">
                            <div class="col-md-12 linha-test">
                                <img class="icon icon-yasuo-p" src="img/yasuo-p.webp" alt="yasuo">
                            </div>
                        </div>

                        <div class="row coluninha">
                            <div class="col-md-12 linha-test">
                                <img class="icon icon-yasuo-q" src="img/yasuo-q.webp" alt="yasuo">
                            </div>
                        </div>
                        <div class="row coluninha">
                            <div class="col-md-12 linha-test">
                                <img class="icon icon-yasuo-w" src="img/yasuo-w.webp" alt="yasuo">
                            </div>
                        </div>
                        <div class="row coluninha">
                            <div class="col-md-12 linha-test">
                                <img class="icon icon-yasuo-e" src="img/yasuo-e.webp" alt="yasuo">
                            </div>
                        </div>
                        <div class="row coluninha">
                            <div class="col-md-12 linha-test">
                                <img class="icon icon-yasuo-r" src="img/yasuo-r.webp" alt="yasuo">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <footer>
        <a class="riot-a" href="https://www.riotgames.com/pt-br" target="_blank">
            <img class="riot-logo" style="opacity: 0.8;" src="img/riot-games.png" alt="">
        </a>
    </footer>

    <script>
    const hoverImages = document.querySelectorAll('.hover-image');

    hoverImages.forEach(image => {
        image.addEventListener('mouseover', () => {
            hoverImages.forEach(img => {
                img.classList.add('hovered');
            });
        });

        image.addEventListener('mouseout', () => {
            hoverImages.forEach(img => {
                img.classList.remove('hovered');
            });
        });
    });



    document.addEventListener('DOMContentLoaded', function() {
        var cursor = document.createElement('div');
        cursor.classList.add('custom-cursor');
        document.body.appendChild(cursor);

        document.addEventListener('mousemove', function(e) {
            cursor.style.left = e.clientX + 'px';
            cursor.style.top = e.clientY + 'px';
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        var cursor = document.querySelector('.custom-cursor');

        document.addEventListener('mouseover', function(e) {
            cursor.style.display = 'block';
        });

        document.addEventListener('mouseout', function(e) {
            if (e.toElement === null && e.relatedTarget === null) {
                cursor.style.display = 'none';
            }
        });
    });

    function reproduzirVideo() {
        var video = document.getElementById('video-explicativo-p');
        video.play();
    }

    function pausarVideo() {
        var video = document.getElementById('video-explicativo-p');
        video.pause();
    }
    </script>


</body>

</html>