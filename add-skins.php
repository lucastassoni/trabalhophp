<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link type="image/jpg" rel="icon" href="img/icon-add.png">
    <title>Adição de Skins</title>
</head>

<body class="bg-edit-3">
    <button class="back-btn" type="button" id="meuBotao">
        <p class="p-login-cadastro">Voltar</p><img class="arrow-login" src="img/arrow_left.png" alt="">
    </button>
    <form class="main-editar" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <h1 class="editar-msg">Adicionar Skins</h1>
        <span class="p-editar">Nome:</span> <input class="login-input-editar" type="text" name="nome" required><br>
        <span class="p-editar">Preço:</span> <input class="login-input-editar" type="number" name="preco" required><br>
        <span class="p-editar">Descrição:</span> <textarea class="login-input-editar" name="descricao"
            required></textarea><br>
        <span class="p-editar">URL da Imagem:</span> <input class="login-input-editar" type="text" name="imagem"
            required><br>
        <button class="save-button" type="submit">
            <p class="p-editar">Inserir Skin</p>
        </button>
    </form>
    <?php
session_start();

if (!isset($_SESSION["nome_usuario"])) {
    header("Location: login.php?msg=not_logged_in");
    exit();
}

class Skin
{
    private $nome;
    private $preco;
    private $descricao;
    private $imagem;

    public function __construct($nome, $preco, $descricao, $imagem)
    {
        $this->nome = $nome;
        $this->preco = $preco;
        $this->descricao = $descricao;
        $this->imagem = $imagem;
    }

    public function inserirSkinNoBanco()
    {
        // Conectar ao seu banco de dados (substitua pelos dados reais do seu banco)
        $servername = "localhost";
        $username = "root";
        $password = "root";
        $dbname = "bdoflegends";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verificar a conexão
        if ($conn->connect_error) {
            die("Conexão com o banco de dados falhou: " . $conn->connect_error);
        }

        // Preparar a instrução SQL
        $sql = "INSERT INTO skins (nome, preco, descricao, imagem)
                VALUES ('$this->nome', $this->preco, '$this->descricao', '$this->imagem')";

        // Executar a instrução SQL
        if ($conn->query($sql) === true) {
            // Alteração para exibir SweetAlert em vez de alerta padrão
            echo '<script>
                        Swal.fire({
                            title: "Sucesso!",
                            text: "Skin inserida com sucesso!",
                            icon: "success",
                            showConfirmButton: true,
                        }).then(() => {
                            window.location.href = "add-skins.php"; // Redireciona para a página de adicionar skins
                        });
                     </script>';
        } else {
            echo '<script>
                        Swal.fire({
                            title: "Erro!",
                            text: "Erro ao inserir skin: ' . $conn->error . '",
                            icon: "error"
                        });
                     </script>';
        }

        // Fechar a conexão
        $conn->close();
    }
}

// Processar o formulário se enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obter dados do formulário
    $nome = $_POST["nome"];
    $preco = $_POST["preco"];
    $descricao = $_POST["descricao"];
    $imagem = $_POST["imagem"];

    // Criar instância da classe Skin e inserir no banco
    $skin = new Skin($nome, $preco, $descricao, $imagem);
    $skin->inserirSkinNoBanco();
}
?>
    <script>
        // Obtém o elemento do botão pelo ID
        var meuBotao = document.getElementById('meuBotao');

        // Adiciona um ouvinte de evento para o clique no botão
        meuBotao.addEventListener('click', function () {
            // Redireciona para a URL desejada
            window.location.href = 'skins.php';
        });
    </script>
</body>

</html>
