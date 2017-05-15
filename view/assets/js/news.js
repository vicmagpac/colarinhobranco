$(document).ready(function () {

    $("#enviar").click(function () {

        var news = $("#news").val();
        var nome = $("#nome").val();
        var conteudo = $("#conteudo").val();

        $.ajax({
            type: "POST",
            url: "/colarinhobranco/index.php?action=newsComment",
            data: {nome:nome, conteudo:conteudo, news: news},
            success: function(data) {
                if (data.success == "true") {
                    var novoComentario = '<div class="comentario"><p><span class="info-com">Nome:</span> ' + nome + '</p> <p><span class="info-com">Comentário:</span> ' + conteudo + '</p> </div>';
                    $( novoComentario ).insertBefore( "#comentarios" );

                    $("#form-comentario").find("input[type=text], textarea").val("");

                    alert("Comentário enviado com sucesso!")
                }
            },
            dataType: "json"
        });
        return false;
    });



});