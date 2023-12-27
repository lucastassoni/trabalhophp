<?php
session_start();

if (!isset($_SESSION["nome_usuario"])) {
    header("Location: login.php?msg=not_logged_in");
    exit();
}

include("conexao.php"); 
$nome_usuario = $_SESSION["nome_usuario"];
$email_usuario = isset($_SESSION["email"]) ? $_SESSION["email"] : "";
$senha_usuario = isset($_SESSION["senha"]) ? $_SESSION["senha"] : "";

$novo_username = isset($_POST['novo_nome']) ? $_POST['novo_nome'] : null;
$novo_email = isset($_POST['novo_email']) ? $_POST['novo_email'] : null;
$nova_senha = isset($_POST['nova_senha']) ? $_POST['nova_senha'] : null;

$diretorio_fotos = 'uploads/'; // Substitua pelo seu caminho real
$foto_temp = isset($_FILES['nova_foto']['tmp_name']) ? $_FILES['nova_foto']['tmp_name'] : null;
$foto_nome = isset($_FILES['nova_foto']['name']) ? $_FILES['nova_foto']['name'] : null;

if (!empty($foto_temp) && move_uploaded_file($foto_temp, $diretorio_fotos . $foto_nome)) {
    // Upload bem-sucedido, você pode armazenar o nome do arquivo no banco de dados
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $db = mysqli_select_db($conexao, $banco);
    $grava = mysqli_query($conexao, "UPDATE usuario SET nome='$novo_username', email='$novo_email', senha='$nova_senha', foto='$foto_nome' WHERE nome='$nome_usuario'");

    if ($grava == true) {
        // Atualiza as variáveis de sessão com os novos valores
        $_SESSION["nome_usuario"] = $novo_username;
        $_SESSION["email"] = $novo_email;
        $_SESSION["senha"] = $nova_senha;
        $_SESSION["fotoPath"] = $diretorio_fotos . $foto_nome;  // Atualiza o caminho da foto na sessão
  // Adicione esta linha para atualizar a variável de sessão da foto
        echo '<script>alert("Informações atualizadas com sucesso!");';
        echo 'window.location.href = "principal.php";'; // Redireciona após clicar em OK
        echo '</script>';
        exit();
    } else {
        die("Conexão falhou: " . mysqli_connect_error());
    }

}

mysqli_close($conexao);
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
    <form class="main-editar" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?> " enctype="multipart/form-data">
        <h1 class="editar-msg">Edição de perfil</h1>

        <label for="nome">
            <p class="p-editar">Nome:</p>
        </label>
        <input class="login-input-editar" type="text" name="novo_nome" required value="<?php echo $nome_usuario; ?>">

        <label for="email">
            <p class="p-editar">Email:</p>
        </label>
        <input class="login-input-editar" type="email" name="novo_email" required value="<?php echo $email_usuario; ?>">

        <label for="senha">
            <p class="p-editar">Senha:</p>
        </label>
        <input class="login-input-editar" type="password" name="nova_senha" required>

        <label for="foto">
            <p class="p-editar">Foto:</p>
        </label>
        <input class="login-input-editar" type="file" name="nova_foto">

        <button class="save-button" type="submit">
            <p class="p-editar">Salvar Alterações</p>
        </button>

        <button class="back-button" type="button" id="meuBotao2">
            <p class="p-editar">Voltar à Página Principal</p>
        </button>

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