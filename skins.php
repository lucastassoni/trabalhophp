<?php
session_start();

include "conexao.php";


if (!isset($_SESSION["nome_usuario"])) {

    header("Location: login.php?msg=not_logged_in");
    exit();
}

$userID = $_SESSION["id_usuario"];
$nome_usuario = $_SESSION["nome_usuario"];
$fotoPath = $_SESSION["fotoPath"];

$querySkins = "SELECT idskin, nome, descricao, preco, imagem FROM skins";
$resultSkins = mysqli_query($conexao, $querySkins);

$queryDinheiro = "SELECT dinheiro FROM usuario WHERE usuario.idusuario = $userID";
$resultado = mysqli_query($conexao, $queryDinheiro);

if ($resultado) {
    $row = mysqli_fetch_assoc($resultado);

    if ($row) {
        $dinheiroTotal = $row['dinheiro'];
        $dinheiroString = strval($dinheiroTotal); 
    } else {
        echo "Usuário não encontrado ou sem dinheiro.";
    }
} else {
    echo "Erro na consulta: " . mysqli_error($conexao);
}

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skins</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link rel="stylesheet" href="./css/style.css" type="text/css">
    <link type="image/jpg" rel="icon" href="img/yasuoicon.jpg">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
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
        <source src="img/back-video-loja.mp4" type="video/mp4">
    </video>

    <div class="container-fluid" id="main-yasuo">
        <div class="row section">
            <div class="col-md-8">
                <div id="carouselExampleCaptions" class="carousel slide">
                    <div class="carousel-indicators">
                        <?php
                        $indicatorCount = 0;
                        while ($rowSkin = mysqli_fetch_assoc($resultSkins)) {
                            $activeClass = ($indicatorCount == 0) ? 'active' : '';
                            echo '<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="' . $indicatorCount . '" class="' . $activeClass . '" aria-label="Slide ' . $indicatorCount . '"></button>';
                            $indicatorCount++;
                        }
                        ?>
                    </div>

                    <div class="carousel-inner">
                        <?php
                        mysqli_data_seek($resultSkins, 0);
                        $itemCount = 0;

                        
                        if (mysqli_num_rows($resultSkins) > 0) {
                            while ($rowSkin = mysqli_fetch_assoc($resultSkins)) {
                                $activeClass = ($itemCount == 0) ? 'active' : '';
                                echo '<div class="carousel-item ' . $activeClass . '">';
                                
                                echo '<div style="position: absolute; top: 10px; left: 10px; z-index: 999;">';
                                echo '<img src="img/essencia_loja.png" alt="Essência Loja" style="width: 50px; height: 50px;">';
                                echo '<p style="position: absolute; top: 25%; left: 100%; color: white;">' . $rowSkin['preco'] . '</p>';
                                echo '</div>';
                                
                                echo '<img src="' . $rowSkin['imagem'] . '" class="d-block w-100" alt="...">';
                                echo '<div class="carousel-caption d-none d-md-block">';
                                echo '<h5>' . $rowSkin['nome'] . '</h5>';
                                echo '<p>' . $rowSkin['descricao'] . '</p>';
                                echo '<a href="processar_compra.php?id=' . $rowSkin['idskin'] . '" class="btn btn-primary btn-buy-ex">Comprar</a>';
                                echo '<a href="remover_skin.php?id=' . $rowSkin['idskin'] . '" class="btn btn-danger btn-buy-ex">Excluir</a>';
                                echo '</div>';
                                echo '</div>';
                                $itemCount++;
                            }
                        } else {
                            
                            echo '<div class="alert alert-warning" role="alert">';
                            echo 'Você ainda não possui nenhuma skin no carrossel. Visite a aba <a href="add-skins.php">"Incluir Skins"</a> para adicionar skins ao carrossel!';
                            echo '</div>';
                        }
                        ?>

                    </div>

                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>

            <div class="col-md-4 bg bg-yasuo">
                <div class="row yasuo-header">
                    <div class="col-md-12 bg">
                        <h5>Loja do Invocador</h5>
                    </div>
                </div>
                <div class="row yasuo-div">
                    <div class="col-md-12">
                        <div class="yasuo-text">
                            <p>Localizada no coração da cidade de Piltover, um dos lugares mais vibrantes e
                                tecnologicamente avançados de Runeterra, ergue-se a Loja do Invocador. Escondida em uma
                                rua estreita entre os prédios imponentes, sua fachada modesta e discreta esconde a
                                vastidão de segredos e poderes arcanos que residem em seu interior. </p>
                            <p>Os cidadãos de Piltover são conhecidos por sua paixão pela ciência e inovação, mas também
                                valorizam profundamente o conhecimento antigo e a magia. A Loja do Invocador é um
                                reflexo desse equilíbrio, um lugar onde o antigo e o moderno se encontram em perfeita
                                harmonia. </p>
                            <p>Os rumores sobre a origem da loja são diversos. Alguns dizem que ela foi criada há
                                séculos por um grupo de sábios magos, cujos descendentes a mantêm até os dias atuais.
                                Outros acreditam que sua fundação está ligada aos ancestrais dos invocadores, que a
                                ergueram como um santuário para estudar e aprimorar suas habilidades mágicas. </p>
                            <p>Seja qual for a verdadeira história por trás da Loja do Invocador, é inegável que seu
                                interior é um espetáculo para os olhos curiosos. Prateleiras repletas de artefatos
                                místicos, armas encantadas e itens poderosos capturam a atenção dos visitantes, enquanto
                                os corredores parecem se estender em um labirinto interminável de possibilidades. </p>
                            <p>Os atendentes da loja são indivíduos misteriosos, conhecedores não apenas dos produtos à
                                venda, mas também dos segredos ocultos no tecido mágico de Runeterra. Eles orientam os
                                invocadores a escolherem os itens que melhor se adequam às suas estratégias, alertando
                                sobre os perigos de utilizar magias sem o devido conhecimento. </p>
                            <p>Apesar de seu ambiente acolhedor, a Loja do Invocador não é apenas um local de comércio.
                                É um refúgio para aqueles que buscam dominar os mistérios da magia e das batalhas em
                                Summoner's Rift. Muitos afirmam que a loja tem um vínculo especial com o plano
                                espiritual, capaz de se adaptar e fornecer itens que correspondem ao espírito de quem a
                                procura.</p>
                            <p>Assim, a Loja do Invocador continua a existir como um ponto de convergência entre os
                                avanços tecnológicos de Piltover e a magia ancestral de Runeterra, oferecendo não apenas
                                itens valiosos, mas também conhecimento e segredos para aqueles que estão dispostos a
                                explorar seus corredores e desvendar suas histórias ocultas.</p>
                            </article>
                        </div>
                    </div>
                    <div class="row yasuo-div-function-ionia">
                        <div class="col-md-12 ionia-bg">
                            <img class="ionia-icon" src="img/rp_loja.png" alt="loja">
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
    document.addEventListener('DOMContentLoaded', function () {
    var buttons = document.querySelectorAll('.btn-buy-ex');

    buttons.forEach(function (button) {
        button.addEventListener('click', function (event) {
            event.preventDefault();

           
            var purchaseLink = button.getAttribute('href');

            
            fetch(purchaseLink, {
                method: 'GET',
            })
            .then(response => response.json())
            .then(data => {
               
                console.log(data);

                
                Swal.fire({
                    title: data.title,
                    text: data.message,
                    icon: data.icon
                }).then(() => {
                    
                    if (data.success) {
                       
                        location.reload(); 
                    } 
                });
            })
            .catch(error => {
                console.error('Erro ao processar a solicitação:', error);
            });
        });
    });
});

function adicionarDinheiro() {
    
    $.ajax({
        url: 'adicionar_dinheiro.php',
        type: 'POST',
        dataType: 'json',
        success: function(response) {
            if (response.success) {
                
                var dinheiroAtual = parseFloat(document.getElementById('dinheiro').innerHTML);
                var novoDinheiro = dinheiroAtual + 10;
                document.getElementById('dinheiro').innerHTML = novoDinheiro.toFixed(2);
            } else {
                
                console.error('Falha ao adicionar dinheiro.');
            }
        },
        error: function() {
            
            console.error('Erro na requisição AJAX.');
        }
    });
}
</script>
</body>

</html>