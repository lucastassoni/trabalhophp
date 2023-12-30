
<?php
session_start();

if (!isset($_SESSION["nome_usuario"])) {
    header("Location: login.php?msg=not_logged_in");
    exit();
}

include "conexao.php";
$nome_usuario = $_SESSION["nome_usuario"];
$email_usuario = $_SESSION["email"];
$senha_usuario = $_SESSION["senha_usuario"];

// Recupera o nome da foto atual do banco de dados
$consulta_foto = mysqli_query($conexao, "SELECT foto FROM usuario WHERE nome='$nome_usuario'");
$dados_foto = mysqli_fetch_assoc($consulta_foto);
$foto_nome_atual = $dados_foto['foto'];

$novo_username = isset($_POST['novo_nome']) ? $_POST['novo_nome'] : null;
$novo_email = isset($_POST['novo_email']) ? $_POST['novo_email'] : null;
$nova_senha = isset($_POST['nova_senha']) ? $_POST['nova_senha'] : null;

$diretorio_fotos = 'uploads/';
$foto_temp = isset($_FILES['nova_foto']['tmp_name']) ? $_FILES['nova_foto']['tmp_name'] : null;
$foto_nome = isset($_FILES['nova_foto']['name']) ? $_FILES['nova_foto']['name'] : null;

// Se não houver uma nova foto, mantenha a foto atual do usuário
$foto_nome = !empty($foto_temp) ? $foto_nome : $foto_nome_atual;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $db = mysqli_select_db($conexao, $banco);

    // Atualiza o banco de dados
    $grava = mysqli_query($conexao, "UPDATE usuario SET nome='$novo_username', email='$novo_email', senha='$nova_senha', foto='$foto_nome' WHERE nome='$nome_usuario'");

    if ($grava == true) {
        // Atualiza as variáveis de sessão com os novos valores
        $_SESSION["nome_usuario"] = $novo_username;
        $_SESSION["email"] = $novo_email;
        $_SESSION["senha"] = $nova_senha;

        // Atualiza o caminho da foto na sessão
        $_SESSION["fotoPath"] = $diretorio_fotos . basename($foto_nome);

        // Armazena uma mensagem de sucesso na sessão
        $_SESSION["success"] = "Informações atualizadas com sucesso!";

        exit();
    } else {
        die("Conexão falhou: " . mysqli_connect_error());
    }
}

mysqli_close($conexao);
?>


<!DOCTYPE html>
<html lang="pt-br">
    <head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edição de perfil</title>
<link rel="stylesheet" href="./css/style.css" type="text/css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link type="image/png" rel="icon" href="img/LoL_icon.svg.png">
</head>
<body class="bg-edit">
    <button class="back-btn" type="button" id="meuBotao">
        <p class="p-login-cadastro">Voltar</p><img class="arrow-login" src="img/arrow_left.png" alt="">
    </button>
    <form class="main-editar" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?> " enctype="multipart/form-data">
        <h1 class="editar-msg">Edição de perfil</h1>

        <label for="nome">
            <p class="p-editar">Nome:</p>
        </label>
        <input class="login-input-editar" type="text" name="novo_nome" required value="<?php echo isset($novo_username) ? $novo_username : $nome_usuario; ?>">

        <label for="email">
            <p class="p-editar">Email:</p>
        </label>
        <input class="login-input-editar" type="email" name="novo_email" required value="<?php echo isset($novo_email) ? $novo_email : $email_usuario; ?>">

        <label for="senha">
            <p class="p-editar">Senha:</p>
        </label>
        <input class="login-input-editar" type="password" name="nova_senha" value="<?php echo isset($nova_senha) ? $nova_senha : $senha_usuario; ?>">

        <label for="foto">
            <p class="p-editar">Foto:</p>
        </label>
        <input class="login-input-editar" type="file" name="nova_foto">
        <input type="hidden" name="foto_atual" value="<?php echo isset($foto_nome) ? $foto_nome : ''; ?>">

        <button class="save-button" type="submit">
            <p class="p-editar">Salvar Alterações</p>
        </button>

    </form>

    <script>
    // Obtém o elemento do botão pelo ID
    var meuBotao = document.getElementById('meuBotao');

    // Adiciona um ouvinte de evento para o clique no botão
    meuBotao.addEventListener('click', function() {
        // Redireciona para a URL desejada
        window.location.href = 'principal.php';
    });

    $(document).ready(function() {
    // Obtém o formulário pelo ID
    var form = $('.main-editar');

    // Configura a função ajax para ser assíncrona
    $.ajaxSetup({
        async: true
    });

    // Adiciona um ouvinte de evento para o envio do formulário
    form.on('submit', function(event) {
        // Previne o comportamento padrão do formulário
        event.preventDefault();

        // Obtém o valor do campo de senha
        var senha = $('[name="nova_senha"]').val();

        // Faz uma solicitação AJAX ao servidor
        $.ajax({
            type: form.attr('method'),
            url: form.attr('action'),
            data: form.serialize() + '&nova_senha=' + senha,
            success: function(data) {
                // Verifica se a mensagem de sucesso existe
                var successMessage = "<?php echo isset($_SESSION['success']) ? $_SESSION['success'] : '' ?>";

                if (successMessage) {
                    Swal.fire({
                        icon: "success",
                        title: successMessage,
                        confirmButtonText: "OK"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "principal.php";
                        }
                    });

                    // Limpa a mensagem de sucesso da sessão para que ela não seja exibida novamente
                    <?php unset($_SESSION['success']);?>
                }
            }
        });
    });
});
    </script>


</body>

</html>

