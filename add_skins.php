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
        $password = "Daiane@10";
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
            echo "Skin inserida com sucesso!";
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

<!-- Formulário HTML -->
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    Nome: <input type="text" name="nome" required><br>
    Preço: <input type="number" name="preco" required><br>
    Descrição: <textarea name="descricao" required></textarea><br>
    URL da Imagem: <input type="text" name="imagem" required><br>
    <input type="submit" value="Inserir Skin">
</form>
