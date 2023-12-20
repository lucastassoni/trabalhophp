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
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Irmãos da lâmina manchada</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css" type="text/css">
    <script src="./js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link type="image/png" rel="icon" href="img/LoL_icon.svg.png">
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
                            <a class="nav-link btn btn-primary botao" aria-current="page" href="yasuo.php"
                                role="button">Yasuo</a>
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
                    <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdownMenuLink" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Opções
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
            </div>
        </nav>
    </header>
    <video autoplay loop muted id="video-background">
        <source src="img/yasuo-yone.mkv" type="video/mp4">
        <!-- Caso o formato MP4 não seja suportado, você pode adicionar outras extensões de vídeo aqui -->
    </video>

    <div class="container-fluid" id="main">
        <div class="row section-editar">
            <div class="col-md-3 bg bg-yasuo">
                <div class="row yasuo-header">
                    <div class="col-md-12 bg">
                        <h5>O IMPERDOÁVEL</h5>
                    </div>
                </div>
                <div class="row yasuo-div">
                    <div class="col-md-12">
                        <article class="yasuo-text">
                            Yasuo, um ioniano extremamente determinado, é também um ágil
                            espadachim que usa o próprio ar como arma para enfrentar seus inimigos.
                            Quando jovem, ele teve seu orgulho ferido ao ser acusado injustamente do assassinato de seu
                            mestre —
                            sem conseguir provar sua inocência, ele foi forçado a matar o próprio irmão para se
                            defender.
                            Até hoje, mesmo depois do verdadeiro assassino do seu mestre ter sido revelado,
                            Yasuo ainda não consegue se perdoar e vaga por sua terra natal com apenas o vento para guiar
                            sua espada.
                        </article>

                        <div class="row yasuo-div-function">
                            <div class="col-md-12">
                                <div class="img-lutador">
                                    <img id="fighter" src="img/lutador.png" alt="lutador-ico">
                                    <p style="color: white; margin: 0;"> Função </p>
                                    <p>Lutador</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 video-home iframe-overlay">
                <div>
                    <iframe style="border-radius: 20px; padding-right: 1%; padding-left: 1%;" width="650px"
                        height="419px" src="https://www.youtube.com/embed/4eNjKhwXIWg" title="YouTube video player"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
                </div>
            </div>

            <div class="col-md-3 bg bg-yasuo">
                <div class="row yasuo-header">
                    <div class="col-md-12 bg">
                        <h5>O INESQUECIDO</h5>
                    </div>
                </div>
                <div class="row yasuo-div">
                    <div class="col-md-12">
                        <article class="yasuo-text">
                            Em vida, ele foi Yone; meio-irmão de Yasuo e um respeitado aluno da escola de espadachins de
                            seu vilarejo. Mas, ao morrer pelas mãos do irmão, ele se viu perseguido por uma entidade
                            maligna do reino espiritual e foi forçado a exterminá-la com sua própria espada. Agora,
                            condenado a usar uma máscara demoníaca com o rosto da entidade, Yone busca incansavelmente
                            essas criaturas para tentar entender o que ele mesmo se tornou.
                        </article>
                        <div class="row yasuo-div-function">
                            <div class="col-md-12">
                                <div class="img-lutador">
                                    <img id="fighter" src="img/assassino.png" alt="assassino-ico">
                                    <p style="color: white; margin: 0;"> Função </p>
                                    <p>Assassino</p>
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

</body>

</html>