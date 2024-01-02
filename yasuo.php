<?php
// Inicia a sessão (caso não tenha sido iniciada)
session_start();
include("conexao.php");
$userID = $_SESSION["id_usuario"];
$nome_usuario = $_SESSION["nome_usuario"];
$fotoPath = $_SESSION["fotoPath"];

// Verifica se o usuário está logado
if (!isset($_SESSION["nome_usuario"])) {
    // Se não estiver logado, redireciona para a página de login
    header("Location: login.php");
    exit();
}

$queryDinheiro = "SELECT dinheiro FROM usuario WHERE usuario.idusuario = $userID";
$resultado = mysqli_query($conexao, $queryDinheiro);

if ($resultado) {
    $row = mysqli_fetch_assoc($resultado);

    if ($row) {
        $dinheiroTotal = $row['dinheiro'];
        $dinheiroString = strval($dinheiroTotal); // Converte para string
    } else {
        echo "Usuário não encontrado ou sem dinheiro.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yasuo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css" type="text/css">
    <script src="./js/main.js"></script>
    <link type="image/jpg" rel="icon" href="img/yasuoicon.jpg">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
                            <a class="nav-link btn btn-primary botao" aria aria-current="page" href="yasuo.php"
                                role="button">Yasuo</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-primary botao" aria aria-current="page" href="yone.php"
                                role="button">Yone</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-primary botao" aria aria-current="page" href="habilidades.php"
                                role="button">habilidades</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-primary botao" aria aria-current="page" href="inventario.php"
                                role="button">Inventário</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-primary botao" aria aria-current="page" href="add-skins.php"
                                role="button">Incluir Skins</a>
                        </li>
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 ul-foto">
                        <li>
                            <img src="<?php echo $fotoPath; ?>" alt="Foto de Perfil"
                                style="width: 45px; height: 45px; border-radius: 50%;">
                        </li>
                        <li>
                            <span class="nav-link text-light"><?php echo $nome_usuario; ?></span>
                        </li>
                        <li class="nav-item dropdown op-class">
                            <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdownMenuLink"
                                role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img
                                    style="width: 30px; height: 30px;" src="./img/engrenagem.png" alt="opçoes">
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="editar_perfil.php">Editar Perfil</a>
                                <a class="dropdown-item" href="excluir_conta.php">Excluir Conta</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php">Sair</a>
                            </div>
                        </li>
                        <li class="li-money">
                            <img class="money-icon" src="img/essencia_loja.png" alt="">
                            <p id="dinheiro" class="money-p"> <?php echo "$dinheiroString" ?></p>
                            <button class="btn btn-success btn-add-money" onclick="adicionarDinheiro()">+</button>
                        </li>
                    </ul>
                    </ul>
                </div>
        </nav>
    </header>
    <video autoplay loop muted id="video-background">
        <source src="img/yasuo-video.mp4" type="video/mp4">
        <!-- Caso o formato MP4 não seja suportado, você pode adicionar outras extensões de vídeo aqui -->
    </video>

    <div class="container-fluid" id="main-yasuo">
        <div class="row section">
            <div class="col-md-8">
                <div id="carouselExampleCaptions" class="carousel slide">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0"
                            class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3"
                            aria-current="true" aria-label="Slide 4"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4"
                            aria-label="Slide 5"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="5"
                            aria-label="Slide 6"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="6"
                            aria-current="true" aria-label="Slide 7"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="7"
                            aria-label="Slide 8"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="8"
                            aria-label="Slide 9"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="9"
                            aria-current="true" aria-label="Slide 10"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="10"
                            aria-label="Slide 11"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="11"
                            aria-label="Slide 12"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="img/Yasuo_HighNoonSkin.webp" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>YASUO VELHO OESTE</h5>
                                <p>Misterioso e relutante xerife, Yasuo está em exílio autoimposto após ser acusado de
                                    assassinato nos territórios do leste. Mesmo assim, ele já expulsou grupos inteiros
                                    de bandidos, como muitas das ameaças mais mortíferas do deserto.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="img/Yasuo_PROJECTSkin.webp" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>PROJETO: YASUO</h5>
                                <p>Yasuo voltou do combate avançado só para ser acusado de um crime que não cometeu.
                                    Sabendo que o alto escalão comporativo da PROJETO esta envolvido, Yasuo luta ao lado
                                    dos rebeldes da G/NÉTICA, cortando as mentiras tecnológicas pela
                                    raiz com sua lâmina revestida de plasma.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="img/Yasuo_BloodMoonSkin.webp" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>YASUO LUA SANGRENTA</h5>
                                <p>Carrasco cerimonial do culto Lua Sangrenta, Yasuo tem habitado em sua lâmina um
                                    demônio traiçoeiro e sanguinário cuja sede de morte é insaciável. Mas para Yasuo
                                    essa era a combinação perfeita, já que sua escuridão interna é ainda mais profunda
                                    do que a ciratura sussurrante que o acompanha.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="img/Yasuo_NightbringerSkin.webp" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>YASUO EMISSÁRIO DA ESCURIDÃO</h5>
                                <p>Nascido a partir de ecos ressonantes no alvorecer da criação, Yasuo é a perfeita
                                    incorporação do caos nos cosmos. Destinado a enfrentar a Emissária da Luz até o fim
                                    dos tempos, ele aguarda o dia em que a escuridão finalmente apagará a luz.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="img/Yasuo_OdysseySkin.webp" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>YASUO ODISSÉIA</h5>
                                <p>Yasuo nunca quis ser um pirata do espaço. Foragido de uma dezena de facções militares
                                    e paramilitares, ele está reunindo uma excêntrica tripulação para começar uma vida
                                    nova nas estrelas.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="img/Yasuo_BattleBossSkin.webp" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>YASUO CHEFÃO</h5>
                                <p>Ex-protagonista do clássico jogo cult de 1979 "Hasagi", Yasuo foi infectado pelo
                                    código maligno de Veigar depois da tomada de Fliperância pelos Chefões. Ele continua
                                    com uma mecânica de jogo incrivelmente complexa e ataques de dano absurdo, mas agora
                                    luta em nome das forças do mal.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="img/Yasuo_TrueDamageSkin.webp" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>YASUO TRUE DAMAGE</h5>
                                <p>Tão enigmático quanto talentoso, Yasuo é o produtor veterano que todos procuram para
                                    encontrar inspiração. Suas batidas transcendem os gêneros, pintando universos
                                    inteiros com fantásticas texturas de som.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="img/Yasuo_SpiritBlossomSkin.webp" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>YASUO FLORESCER ESPIRITUAL</h5>
                                <p>Há muito tempo, dois irmãos se confrontam em uma guerra impiedosa espalhada por toda
                                    Ionia. Yasuo, o mais novo, era um comandante conhecido por sua conduta inusitada.
                                    Ambos os irmãos estavam fadados a um duelo final, desta vez no reino espiritual.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="img/Yasuo_SeaDogSkin.webp" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>YASUO LOBO DO MAR</h5>
                                <p>Fortalecido pelos Buhru durante sua luta contra Viego de Camavor, Yasuo se tornou
                                    partidário improvável dos filhos de Nagacábouros. Isso mostra que até mesmo o lobo
                                    do mar mais sarnento tem seu lugar ao sol, e Yasuo emergiu triunfante ao enfrentar
                                    as
                                    forças das trevas.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="img/Yasuo_TruthDragonSkin.webp" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>YASUO DRAGÃO DA VERDADE</h5>
                                <p>Yasuo escolheu resistir e lutar, mesmo sozinho contra um exército. Brandindo a
                                    verdade de aço como numa dança, derrotou incontáveis inimigos - mas nem mesmo ele
                                    poderia fazer isso para sempre. O Dragão da Verdade ficou comovido com o domínio
                                    dele sobre a espada e desceu dos picos para abençoa-lo.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="img/Yasuo_DreamDragonSkin.webp" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>YASUO DRAGÃO DOS SONHOS</h5>
                                <p>A música do aço cessou, e Yasuo foi a última alma viva no campo de batalha. À beira
                                    da morte, Yasuo usou sua flauta para tocar uma última elegia. O Dragão dos Sonhos
                                    desceu do topo da montanha, e comovido com a música que tocava, ofereceu a ele seu
                                    poder.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="img/Yasuo_InkshadowSkin.webp" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>YASUO TINTA SOMBRIA</h5>
                                <p>Exilado ao lado de Master Yi, Yasuo agora usa suas tatuagens de Tinta Sombria para
                                    cavalgar o vento entre a cidade de Rabadon e seus arredores. Embora tenha desistido
                                    de sua liberdade em troca de poder, ele vê o preço como uma penitência por naão oder
                                    ajuda aqueles que mais precisam.</p>
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
                            <p> Quando criança, Yasuo sempre acreditou no que os outros no seu vilarejo
                                diziam sobre ele: no melhor dos casos, sua existência era um erro de juízo;
                                no pior, ele era um erro que jamais seria desfeito. </p>

                            <p> Como na maioria das afirmações dolorosas, havia certa verdade nelas. Sua mãe era
                                uma viúva que já criava um filho sozinha quando o homem que viria a ser o pai de
                                Yasuo soprou em sua vida como uma brisa outonal... E, assim como aquela estação
                                solitária, ele foi embora antes mesmo que o cobertor do inverno ioniano caísse
                                sobre a pequena família. </p>

                            <p> O meio-irmão mais velho de Yasuo, Yone, era tudo o que o caçula não era: respeitoso,
                                cuidadoso, responsável... mesmo assim, os dois eram inseparáveis. Quando as outras
                                crianças provocavam Yasuo, Yone estava sempre lá para defendê-lo. Porém,
                                o que Yasuo não tinha de paciência, compensava em determinação. Quando
                                Yone iniciou seus estudos na renomada escola de espadachins do vilarejo,
                                o jovem Yasuo o seguiu e esperou na frente da escola, sob a chuva das monções,
                                até que os professores cederam e abriram os portões. </p>


                            <p>
                                Para desespero de seus novos colegas, Yasuo demonstrou um talento natural e, em
                                pouco tempo, tornou-se o único estudante em muitas gerações a chamar a atenção do Ancião
                                Souma, oúltimo mestre da lendária técnica do vento. O ancião percebeu o potencial de
                                Yasuo, mas o impulsivopupilo recusou sua tutela, permanecendo tão indomado quanto uma
                                ventania. Yone insistiu que o irmão deixasse de lado sua arrogância e deu a ele uma
                                semente de bordo, a maior liçãoda escola em humildade. Na manhã seguinte, Yasuo aceitou
                                a posição de
                                aprendiz e guarda-costas pessoal de Souma. </p>

                            <p> Quando as notícias da invasão noxiana chegaram à escola, alguns se inspiraram na grande
                                batalha que havia ocorrido no Placídio de Navori, e logo todas as pessoas capazes de
                                pegar em armas deixaram o vilarejo. Yasuo também queria se juntar à causa e enfrentar o
                                inimigo com sua espada, mas, enquanto seu irmão e colegas de classe saíram para lutar,
                                ele foi obrigado a ficar para trás e proteger os mais velhos. </p>

                            <p> A invasão virou uma guerra. E, no fim, em uma fatídica noite de chuva, o som dos
                                tambores da marcha noxiana chegou ao vale do outro lado. Yasuo abandonou seu posto,
                                acreditando inocentemente que ele poderia virar o jogo. </p>

                            <p> Mas, quando chegou, ele não viu batalha nenhuma, apenas uma cova aberta com centenas de
                                cadáveres noxianos e ionianos. Algo terrível e não natural havia acontecido ali, algo
                                que espada alguma poderia ter impedido. A própria terra parecia ter sido maculada. </p>

                            <p> Assustado, Yasuo voltou à escola no dia seguinte, ao que foi cercado pelo resto dos
                                alunos com espadas em punho. O Ancião Souma estava morto e Yasuo não só foi acusado de
                                negligência, como também de assassinato. Ele percebeu que o verdadeiro assassino jamais
                                seria punido se ele não agisse rápido e lutou contra os outros alunos para sair do
                                cerco, mesmo
                                sabendo que aquilo só confirmaria sua culpa aos olhos deles. </p>

                            <p> Agora fugitivo na Ionia devastada pela guerra, Yasuo começou a buscar qualquer pista que
                                o levasse ao assassino. No entanto, ele continuava sendo perseguido e caçado por seus
                                antigos colegas e se viu obrigado a lutar ou morrer. Esse era um preço que ele estava
                                disposto a pagar, até que um dia ele foi encontrado por aquele que mais temia: seu
                                irmão, Yone. </p>

                            <p> Em nome da honra, eles se estudaram. Quando suas espadas finalmente se tocaram, a magia
                                do vento de Yasuo superou as lâminas de seu irmão e, com um único golpe de aço, o
                                abateu. </p>

                            <p> Yasuo implorou por perdão, mas Yone, já moribundo, falou sobre as técnicas de vento
                                responsáveis pela morte do Ancião Souma, e que seu irmão era o único que as conhecia.
                                Depois ele se calou para sempre, partindo sem nunca conceder perdão ao irmão. </p>

                            <p> Sem mestre nem irmão, Yasuo vagueou pelas montanhas, ainda chocado, afogando a dor da
                                guerra e da perda na bebida, como uma espada sem bainha. No meio da neve, ele encontrou
                                Taliyah, uma jovem litomante shurimane que tinha fugido do exército noxiano. Yasuo viu
                                nela uma aluna improvável e, em si mesmo, um professor ainda mais inusitado. Ele
                                repassou a Taliyah os
                                segredos da magia elemental, como o vento que molda pedras, e também as lições do Ancião
                                Souma. </p>

                            <p> Após ouvirem boatos sobre a ascensão de um deus-imperador shurimane, seus mundos
                                mudaram. Yasuo se separou de Taliyah, mas não sem dar a ela a sagrada semente de bordo,
                                que já havia lhe ensinado sua lição. Ela voltou para o deserto e Yasuo voltou para o seu
                                vilarejo, determinado a reparar seus erros. </p>

                            <p> Dentro das paredes de pedra do salão do conselho, revelou-se que a morte do Ancião Souma
                                tinha sido um acidente causado pela exilada noxiana conhecida como Riven, e pelo qual
                                ela sentia um profundo remorso. Mesmo assim, Yasuo não conseguiu se redimir pela decisão
                                de abandonar seu mestre e, pior ainda, pela forma como essa decisão havia culminado na
                                morte de Yone. </p>

                            <p> Depois de algum tempo, Yasuo viajou para o festival do Florescer Espiritual em Weh’le,
                                mesmo com pouca esperança de que os rituais de cura aliviassem seu coração. Lá,
                                encontrou uma criatura demoníaca que queria devorá-lo,
                                um azakana que se alimentava de dor e arrependimento. </p>

                            <p> No entanto, um intruso mascarado interveio e atacou a criatura furiosamente. Naquele
                                momento, Yasuo percebeu que aquele homem era Yone. </p>

                            <p> Esperando que seu irmão se vingasse, Yasuo ficou surpreso quando Yone se despediu dele
                                com uma breve e amarga bênção. </p>

                            <p> Sem mais nenhuma ligação com as Primeiras Terras, Yasuo embarcou em uma nova aventura.
                                Embora não saiba para onde será levado, o sentimento de culpa é a única coisa que prende
                                o vento que ele carrega. </p>
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
    </div>
    <footer>
        <a class="riot-a" href="https://www.riotgames.com/pt-br" target="_blank">
            <img class="riot-logo" style="opacity: 0.8;" src="img/riot-games.png" alt="">
        </a>
    </footer>
    <script>
        function adicionarDinheiro() {
    // Chame aqui uma requisição AJAX para adicionar dinheiro
    $.ajax({
        url: 'adicionar_dinheiro.php',
        type: 'POST',
        dataType: 'json',
        success: function(response) {
            if (response.success) {
                // Atualiza o valor na página em tempo real
                var dinheiroAtual = parseFloat(document.getElementById('dinheiro').innerHTML);
                var novoDinheiro = dinheiroAtual + 10;
                document.getElementById('dinheiro').innerHTML = novoDinheiro.toFixed(2);
            } else {
                // Exibe mensagem de erro (pode ser personalizado conforme necessário)
                console.error('Falha ao adicionar dinheiro.');
            }
        },
        error: function() {
            // Exibe mensagem de erro em caso de falha na requisição AJAX
            console.error('Erro na requisição AJAX.');
        }
    });
}
    </script>
</body>

</html>