<?php
session_start();

if (!isset($_SESSION["nome_usuario"])) {
    header("Location: login.php?msg=not_logged_in");
    exit();
}

$nome_usuario = $_SESSION["nome_usuario"];
$email_usuario = isset($_SESSION["email"]) ? $_SESSION["email"] : "";
$senha_usuario = isset($_SESSION["senha"]) ? $_SESSION["senha"] : "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conexao = new mysqli("localhost", "root", "root", "bdoflegends");

    if ($conexao->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conexao->connect_error);
    }

    // Dados do formulário
    $novo_nome = $_POST['nome'];
    $novo_email = $_POST['email'];
    $nova_senha = $_POST['senha'];

    // Atualizar no banco de dados usando instrução preparada
    $sql = "UPDATE usuario SET name = ?, email = ?, senha = ? WHERE name = ?";
    $stmt = $conexao->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("ssss", $novo_nome, $novo_email, $nova_senha, $nome_usuario);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo '<script>alert("Informações atualizadas com sucesso!");</script>';

            // Reiniciar a sessão
            session_regenerate_id(true);

            // Atualizar as informações na variável de sessão também
            $_SESSION["nome_usuario"] = $novo_nome;
            $_SESSION["email"] = $novo_email;
            $_SESSION["senha"] = $nova_senha;
        } else {
            echo '<script>alert("Nenhuma alteração realizada.");</script>';
        }

        $stmt->close();
    } else {
        echo "Erro na preparação da consulta: " . $conexao->error;
    }

    $conexao->close();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edição de perfil</title>
    <link rel="stylesheet" href="./css/style.css" type="text/css">
    <script src="./js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link type="image/png" rel="icon" href="img/LoL_icon.svg.png">
<body class="bg-edit">
<form class="main-editar" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<h1 class="editar-msg">Edição de perfil</h1>
                    
                    <label for="nome"><p class="p-editar">Nome:</p></label>
                    <input class="login-input-editar" type="text" name="nome" value="<?php echo $nome_usuario; ?>">

                    <label for="email"><p class="p-editar">Email:</p></label>
                    <input class="login-input-editar" type="email" name="email" value="<?php echo $email_usuario; ?>">

                    <label for="senha"><p class="p-editar">Senha:</p></label>
                    <input class="login-input-editar" type="password" name="senha">

                    <button class="save-button" type="submit"><p class="p-editar">Salvar Alterações</p></button>
                
                    <button class="back-button" type="button" id="meuBotao2"><p class="p-editar">Voltar à Página Principal</p></button>

    </form>

    <script>
  // Obtém o elemento do botão pelo ID
  var meuBotao = document.getElementById('meuBotao2');

  // Adiciona um ouvinte de evento para o clique no botão
  meuBotao.addEventListener('click', function() {
    // Redireciona para a URL desejada
    window.location.href = 'principal.php';
  });
</script>
</body>
</html>


    
        