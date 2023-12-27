<?php
    
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
        if ($conn->query($sql) === TRUE) {
            echo '<script>alert("Skin inserida com sucesso!")</script>';
        } else {
            echo "Erro ao inserir skin: " . $conn->error;
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

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adição de Skins</title>
</head>

<body class="bg-edit-3">
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
</body>

</html>