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
    <title>Yone</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css" type="text/css">
    <script src="./js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link type="image" rel="icon" href="img/yone-icon.jpg">
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
                    <li class="nav-item">
                        <a href="logout.php" class="nav-link btn btn-danger logout"><span class="sair-text">Sair</span></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <video autoplay loop muted id="video-background">
        <source src="img/yone-video-alt.mp4" type="video/mp4">
        <!-- Caso o formato MP4 não seja suportado, você pode adicionar outras extensões de vídeo aqui -->
    </video>

    <div class="container-fluid" id="main-yone">
        <div class="row section">
            <div class="col-md-8">
                <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0"
                            class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3"
                            aria-label="Slide 4"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4"
                            aria-label="Slide 5"></button>
                    </div>

                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="img/yone-florescer.jpg" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>YONE FLORESCER ESPIRITUAL</h5>
                                <p>Há muito tempo, dois irmãos se confrontam em uma guerra impiedosa espalhada por toda
                                    Ionia. Yone, o mais velho, era um comandante conhecido por seu implacável senso de
                                    honra e dever.
                                    Ambos os irmãos estavam fadados a um duelo final, desta vez no reino espiritual.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="img/yone-academia.jpg" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>YONE ACADEMIA DE BATALHA</h5>
                                <p>Yone é um membro quieto e ameaçador ao Clube dos Assassinos, e sua personalidade
                                    séria e taciturna mascara o imenso rancor que carrega nas costas. A rixa entre ele e
                                    o irmão é muito famosa, e todos sabem que a fúria dele é desperta ao mencioná-lo.
                                </p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="img/yone-emissario.jpg" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>YONE EMISSÁRIO DA LUZ</h5>
                                <p>Segundo as profecias, os deuses acabarão destruindo uns aos outros, como prenúncio do
                                    fim da própia criação... Mas Yone está determinado a desafiar o destino. Nascido
                                    metade humano, metade deus, em meio ao conflito entre o caos e a ordem, ele detém o
                                    poder tanto da noite quanto da alvorada. Yone deve se unir ao seu irmão ou todos
                                    sucumbirão.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="img/yone-cancao.jpg" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>YONE CANÇÃO DO OCEANO</h5>
                                <p>Yone está nervoso. Como DJ ele é calmo, focado e improvisa bastante, mas o Festival
                                    Canção do Oceano é seu primeiro show como DJ e letrista. Depois de encontrar seu
                                    estoque secreto de letras, sua amiga Nidalee se ofereceu para cantá-las quando ele
                                    recusou. Ele pode não estar pronta para cantar, mas eles ainda ouvirão sua voz.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="img/yone-tinta.jpg" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>YONE TINTA SOMBRIA</h5>
                                <p>Dois irmãos perderam sua casa e se tornaram Guerreiros da Tinta Sombria. Um abriu mão
                                    da liberdade; o outro, da própria identidade. Yone pagou um preço exorbitante por
                                    sua tatuagem: ninguém se lembra que ele existiu. Hoje, ele é apenas um estranho sem
                                    rosto, conhecido como o "Mascarado".</p>
                            </div>
                        </div>
                    </div>

                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>

            </div>
            <div class="col-md-4 bg bg-yasuo">
                <div class="row yasuo-header">
                    <div class="col-md-12 bg">
                        <h5>BIOGRAFIA</h5>
                    </div>
                </div>
                <div class="row yasuo-div">
                    <div class="col-md-12">
                        <div class="yasuo-text">
                            <p> Em vida, Yone seguia um rigoroso código de dever e honra.
                                Ainda criança, motivado pela morte de seu pai, seu amor pela família o levou a
                                assumir o papel de protetor. Sempre paciente e disciplinado, Yone era o oposto de
                                seu meio-irmão Yasuo, que era impetuoso e imprudente. </p>

                            <p> Mesmo assim, os dois eram inseparáveis, e quando Yone começou seus estudos em uma
                                renomada escola de espadachins perto de sua aldeia, Yasuo veio atrás. </p>

                            <p> O Durante o treinamento, muitas vezes Yone era forçado a controlar a impulsividade de
                                seu irmão mais novo. No entanto, quando Yasuo recusou a tutela pessoal do Ancião
                                Souma, mestre da lendária técnica do vento, Yone lhe deu uma semente de bordo — um
                                símbolo de humildade — em sinal de apoio e incentivo. </p>


                            <p>
                                Yone estava orgulhoso do irmão, mas tinha dúvidas sobre a decisão do sábio mestre e
                                temia que a natureza impulsiva de Yasuo o prejudicasse como aluno. Mas o Ancião
                                Souma era muito respeitado, e nunca tomava decisões impensadas. </p>

                            <p> Colocando as preocupações de lado, Yone continuou seus treinos com lâminas duplas e
                                sua destreza rapidamente conquistou a admiração e o respeito de seus colegas. Embora
                                a habilidade de Yone fosse incomparável, a forma como Yasuo usava a técnica do vento
                                tornava os treinos dos dois um espetáculo à parte e uma alegria para os próprios
                                irmãos. </p>

                            <p> Mas essa alegria não durou muito. A guerra chegou a Ionia. Yone, com vários outros
                                discípulos, saiu para combater as forças noxianas que se aproximavam, enquanto
                                Yasuo, relutantemente, ficou para proteger seu mestre. No entanto, certa noite, o
                                Ancião Souma foi encontrado morto; morto pela própria técnica do vento que ele
                                ensinava.</p>

                            <p> Quando Yone voltou, descobriu que Yasuo tinha fugido. Isso abalou Yone
                                profundamente. Seus medos tinham se concretizado. O Ancião Souma estava errado. Yone
                                se sentiu culpado. Se Yasuo tivesse mesmo matado Souma, então Yone não tinha sido
                                capaz de ensinar-lhe o caminho da justiça. Se Yasuo tivesse simplesmente abandonado
                                seu posto permitindo a morte de seu mestre, então Yone não tinha sido capaz de
                                ensinar-lhe sobre disciplina. De uma forma ou de outra, Yasuo já tinha matado vários
                                dos que tinham ido atrás dele. E, para Yone, aquelas mortes também eram
                                responsabilidade dele. </p>

                            <p> Então, encontrou Yasuo. Quando as duas espadas finalmente se cruzaram, a lâmina de
                                Yone era superior, mas a técnica do vento de Yasuo abateu seu irmão. No entanto, a
                                morte não era o fim. Quando Yone acordou no reino espiritual, o peso do seu fracasso
                                o esmagava. Ele explodiu em fúria e esmurrou o chão com raiva.</p>

                            <p> AUma risada retumbante invadiu seus pensamentos. Ele se virou e viu um espírito
                                monstruoso segurando uma lâmina cor de sangue. Era um poderoso azakana, uma entidade
                                predatória que há muito tempo perseguia Yone por trás do véu. Antes que Yone pudesse
                                falar, ele atacou. </p>

                            <p> Yone sacou os ecos espirituais de suas lâminas bem a tempo de bloquear o ataque.
                                Mais uma vez, se viu em um duelo em que suas habilidades eram superiores, mas a
                                magia o oprimia. </p>

                            <p> Ele foi consumido pela raiva. Uma vida inteira de honra e deveres se quebrou. Em um
                                momento de fúria, Yone tomou a lâmina do azakana e perfurou a criatura. A última
                                coisa que ouviu antes que uma nova escuridão o levasse foi a mesma risada
                                retumbante… </p>

                            <p> Quando voltou a si, Yone se viu novamente no reino material, mas agora ele era
                                apenas uma mera sombra do que tinha sido. Ele se levantou com dificuldade, com o
                                reino espiritual embaçado na mente e uma espada cheia de sangue na mão. Sobre seu
                                rosto, havia uma máscara com a feição do azakana; ele não conseguia removê-la, mas
                                agora podia ver outros azakana através dela. Eles ainda não eram demônios de
                                verdade; só queriam se alimentar de negatividade antes de devorarem seus
                                hospedeiros. Mas, como Yone viria a descobrir, se o nome de quaisquer azakana fosse
                                revelado, eles seriam reduzidos a máscaras inertes de emoção personificada. </p>

                            <p> Mesmo assim, ele não sabia dizer se, e nem quando, o azakana que ele usava
                                despertaria para consumi-lo. Em vida, Yone havia usado a máscara de protetor, irmão
                                e discípulo por tanto tempo que aquela tinha se tornado sua identidade. Mas, hoje,
                                em momentos de calmaria, ele jura sentir a máscara se mexendo em seu rosto; seu
                                passado e os conflitos mal resolvidos com Yasuo agora diminuem diante dessa nova
                                ameaça. </p>

                            <p> Na tentativa de entender o que ele se tornou, Yone caça essas criaturas traiçoeiras
                                e, a cada nome descoberto, ele chega mais perto da risada que ainda o assombra.
                                Nada mais importa. Agora só existe a busca pela verdade. </p>
                            </article>
                        </div>
                    </div>
                    <div class="row yasuo-div-function-ionia">
                        <div class="col-md-12 ionia-bg">
                            <img class="ionia-icon" src="img/ionia-icon-removebg-preview.png" alt="">
                            <p>IONIA</p>
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