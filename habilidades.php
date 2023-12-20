<?php
// Inicia a sessão (caso não tenha sido iniciada)
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION["nome_usuario"])) {
    // Se não estiver logado, redireciona para a página de login
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Habilidades</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css" type="text/css">
    <script src="./js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link type="image/png" rel="icon" href="img/Doomed_Minion_profileicon.png">
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
            </div>
        </nav>
    </header>

    <video autoplay loop muted id="video-background">
        <source src="img/habilidades-fundo.mkv" type="video/mp4">
    </video>

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
                                <button type="button" class="icon icon-yone skills" id="back-yone-p"
                                    data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                </button>
                                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Passiva
                                                </h1>
                                                ESTILO DO CAÇADOR
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body" id="modalyone1">
                                                <video id="video-explicativo-p" class="video-overlay" autoplay loop
                                                    muted>
                                                    <source src="img/ability-p-yone.mp4" type="video/webm">
                                                </video>
                                                <p>Yone causa Dano Mágico a cada segundo Ataque. Além disso, sua Chance
                                                    de Acerto Crítico é aumentada.</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">FECHAR</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row coluninha">
                            <div class="col-md-12 linha-test">
                                <button type="button" class="icon icon-yone skills" id="back-yone-q"
                                    data-bs-toggle="modal" data-bs-target="#staticBackdrop1">
                                </button>
                                <div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Q</h1>
                                                AÇO MORTAL
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body" id="modalyone2">
                                                <video id="video-explicativo-p" class="video-overlay" autoplay loop
                                                    muted>
                                                    <source src="img/ability-q-yone.mp4" type="video/webm">
                                                </video>
                                                <p class="testando123">Golpeia à frente, causando dano a todos os inimigos em linha reta. Ao
                                                    contato, ganha um acúmulo de Tempestade Crescente por alguns
                                                    segundos. Com 2 acúmulos, Aço Mortal faz com que Yone avance com o
                                                    vento, arremessando ao ar os inimigos. Aço Mortal é tratada como
                                                    ataque básico e escala da mesma forma.</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">FECHAR</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row coluninha">
                            <div class="col-md-12 linha-test">
                                <button type="button" class="icon icon-yone skills" id="back-yone-w"
                                    data-bs-toggle="modal" data-bs-target="#staticBackdrop2">
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">W</h1>
                                                FENDA ESPIRITUAL
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body" id="modalyone3">
                                                <video id="video-explicativo-p" class="video-overlay" autoplay loop
                                                    muted>
                                                    <source src="img/ability-w-yone.mp4" type="video/webm">
                                                </video>
                                                <p>Ataca à frente, causando dano a todos os inimigos em uma área de
                                                    cone. Concede um escudo a Yone. O valor do escudo aumenta com base
                                                    no número de Campeões atingidos pelo golpe. O Tempo de Recarga e o
                                                    tempo de conjuração de Fenda Espiritual escalam com Velocidade de
                                                    Ataque.</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">FECHAR</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row coluninha">
                            <div class="col-md-12 linha-test">
                                <button type="button" class="icon icon-yone skills" id="back-yone-e"
                                    data-bs-toggle="modal" data-bs-target="#staticBackdrop3">
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="staticBackdrop3" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">E</h1>
                                                DESATAR DA ALMA
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body" id="modalyone4">
                                                <video id="video-explicativo-p" class="video-overlay" autoplay loop
                                                    muted>
                                                    <source src="img/ability-e-yone.mp4" type="video/webm">
                                                </video>
                                                <p>O espírito de Yone deixa seu corpo para trás e recebe Velocidade de
                                                    Movimento. Quando essa habilidade termina, o espírito de Yone volta
                                                    ao corpo e ele repete parte do dano causado na forma espiritual.</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">FECHAR</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row coluninha">
                            <div class="col-md-12 linha-test">
                                <button type="button" class="icon icon-yone skills" id="back-yone-r"
                                    data-bs-toggle="modal" data-bs-target="#staticBackdrop4">
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="staticBackdrop4" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">R</h1>
                                                DESTINO SELADO
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body" id="modalyone5">
                                                <video id="video-explicativo-p" class="video-overlay" autoplay loop
                                                    muted>
                                                    <source src="img/ability-R-yone.mp4" type="video/webm">
                                                </video>
                                                <p>Yone teleporta-se para trás do último Campeão em uma linha,
                                                    desferindo um golpe tão poderoso que puxa na direção dele todos os
                                                    inimigos atingidos.</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">FECHAR</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="video-container-p col-md-10 linha-test-video">
                        <video id="video-explicativo-p" class="video-overlay" autoplay loop muted>
                            <source src="img/yone-video-alt.mp4" type="video/mp4">
                        </video>
                    </div>
                </div>
            </div>
            <div class="col-md-6 linha-test">
                <div class="row hb-yone-yasuo">
                    <div class="video-container-p col-md-10 linha-test-video">
                        <video id="video-explicativo-p" class="video-overlay" autoplay loop muted>
                            <source src="img/yasuo-video.mp4" type="video/mp4">
                        </video>
                    </div>
                    <div class="col-md-2 linha-test">
                        <div class="row coluninha">
                            <div class="col-md-12 linha-test pad-yasuo">
                                <img class="icon icon-yasuo" src="img/yasuoicon.jpg" alt="yone">
                            </div>
                        </div>
                        <div class="row coluninha">
                            <div class="col-md-12 linha-test pad-yasuo">
                                <button type="button" class="icon icon-yone skills" id="back-yasuo-p"
                                    data-bs-toggle="modal" data-bs-target="#staticBackdrop5">
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="staticBackdrop5" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Passiva</h1>
                                                ESTILO DO ERRANTE
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body" id="modalyasuo1">
                                                <video id="video-explicativo-yasuo-p" class="video-overlay" autoplay
                                                    loop muted>
                                                    <source src="img/ability-p-yasuo.webm" type="video/webm">
                                                </video>
                                                <p>A Chance de Acerto Crítico do Yasuo é aumentada. Além disso, Yasuo
                                                    vai gerando um Escudo sempre que se movimenta. O Escudo é ativado
                                                    quando Yasuo sofre dano de um Campeão ou monstro.</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">FECHAR</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row coluninha">
                            <div class="col-md-12 linha-test pad-yasuo">
                                <button type="button" class="icon icon-yone skills" id="back-yasuo-q"
                                    data-bs-toggle="modal" data-bs-target="#staticBackdrop6">
                                </button>
                                <div class="modal fade" id="staticBackdrop6" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Q</h1>
                                                TEMPESTADE DE AÇO
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body" id="modalyasuo2">
                                                <video id="video-explicativo-yasuo-p" class="video-overlay" autoplay
                                                    loop muted>
                                                    <source src="img/ability-q-yasuo.webm" type="video/webm">
                                                </video>
                                                <p>Golpeia à frente, causando dano a todos os inimigos em linha reta. Ao
                                                    contato, Tempestade de Aço concede um acúmulo de Tempestade
                                                    Crescente por alguns segundos. Com 2 acúmulos, Tempestade de Aço
                                                    desfere um tornado que arremessa inimigos ao ar. Tempestade de Aço é
                                                    tratada como ataque básico e escala com as mesmas coisas.</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">FECHAR</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row coluninha">
                            <div class="col-md-12 linha-test pad-yasuo">
                                <button type="button" class="icon icon-yone skills" id="back-yasuo-w"
                                    data-bs-toggle="modal" data-bs-target="#staticBackdrop7">
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="staticBackdrop7" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">W</h1>
                                                PAREDE DE VENTO
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body" id="modalyasuo3">
                                                <video id="video-explicativo-yasuo-p" class="video-overlay" autoplay
                                                    loop muted>
                                                    <source src="img/ability-w-yasuo.webm" type="video/webm">
                                                </video>
                                                <p>Cria uma parede movediça que bloqueia todos os projéteis inimigos por
                                                    4 segundos.</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">FECHAR</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row coluninha">
                            <div class="col-md-12 linha-test pad-yasuo">
                                <button type="button" class="icon icon-yone skills" id="back-yasuo-e"
                                    data-bs-toggle="modal" data-bs-target="#staticBackdrop8">
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="staticBackdrop8" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">E</h1>
                                                ESPADA ÁGIL
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body" id="modalyasuo4">
                                                <video id="video-explicativo-yasuo-p" class="video-overlay" autoplay
                                                    loop muted>
                                                    <source src="img/ability-e-yasuo.webm" type="video/webm">
                                                </video>
                                                <p>Avança e atravessa o inimigo-alvo, causando Dano Mágico. Cada
                                                    conjuração aumenta o dano do próximo avanço, até um limite máximo.
                                                    Não pode ser conjurada novamente no mesmo inimigo por alguns
                                                    segundos. Se Tempestade de Aço for conjurada durante o avanço, o
                                                    Ataque será circular.</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">FECHAR</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row coluninha">
                            <div class="col-md-12 linha-test pad-yasuo">
                                <button type="button" class="icon icon-yone skills" id="back-yasuo-r"
                                    data-bs-toggle="modal" data-bs-target="#staticBackdrop9">
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="staticBackdrop9" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">R</h1>
                                                ÚLTIMO SUSPIRO
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body" id="modalyasuo5">

                                                <video id="video-explicativo-yasuo-p" class="video-overlay" autoplay
                                                    loop muted>
                                                    <source src="img/ability-r-yasuo.webm" type="video/webm">
                                                </video>
                                                <p>Teletransporta-se para um Campeão inimigo arremessado ao ar, causando
                                                    Dano Físico e mantendo no ar todos os inimigos da área que foram
                                                    arremessados ao ar. Concede o máximo de Fluxo, mas zera todos os
                                                    acúmulos de Tempestade Crescente Por um período moderado a seguir,
                                                    os Acertos Críticos de Yasuo recebem Penetração de Armadura
                                                    adicional significativa.</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">FECHAR</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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