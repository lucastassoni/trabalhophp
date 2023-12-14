
function reproduzirVideo() {
    var video = document.getElementById('video-explicativo-p');
    video.play();
}

function pausarVideo() {
    var video = document.getElementById('video-explicativo-p');
    video.pause();
}

document.getElementById("meuBotao").addEventListener("click", function (e) {
    e.preventDefault(); // Evita o comportamento padrão do botão de envio

    // Seu código aqui, por exemplo, redirecionar para outra página
    window.location.href = "cadastro.php";
});
