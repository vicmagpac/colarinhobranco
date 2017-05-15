<!DOCTYPE html>
<html>
<head>
    <title>Notícia</title>
    <?php include_once BASE_INCLUDES . '/headInclude.php' ?>
    <link rel="stylesheet" href="<?php echo BASE_ASSETS ?>/styles/news-show.css">
    <script src="<?php echo BASE_ASSETS ?>/js/jquery.min.js"></script>
    <script src="<?php echo BASE_ASSETS ?>/js/news.js"></script>
</head>
<body>
<?php include_once BASE_INCLUDES . '/siteHeader.php' ?>
<?php include_once BASE_INCLUDES . '/siteNavbar.php' ?>
<main>
    <div id="site-content">
        <article class="news">
            <h1 class="title"><?php echo $viewData->news->getTitle(); ?></h1>
            <img src="<?php echo BASE_ASSETS ?>/images/upload/<?php echo $viewData->news->getHeadLineImage(); ?>" alt="<?php echo $viewData->news->getTitle(); ?>">
            <div class="news-text">
                <pre><?php echo $viewData->news->getContent(); ?></pre>
            </div>
        </article>
        <hr>
        <h4 style="font-size: 30px;">Comentários</h4>
        <div id="comentarios">
            <?php foreach ($viewData->news->getComments() as $comment): ?>
                <div class="comentario">
                    <p><span class="info-com">Nome:</span> <?php echo $comment->getNome(); ?></p>
                    <p><span class="info-com">Comentário:</span> <?php echo $comment->getConteudo(); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
        <br><br>
        <h4 style="font-size: 30px;">Comente aqui</h4>
        <div id="form-com">
            <form id="form-comentario">
                <input type="hidden" name="news" id="news" value="<?php echo $viewData->news->getId(); ?>"/>

                <label for="nome">Nome:</label>
                <input id="nome" name="nome" type="text" id="nome" placeholder="Nome" maxlength="75" required>

                <label for="conteudo">Conteúdo:</label>
                <textarea id="conteudo" name="conteudo" rows="10" id="conteudo" placeholder="Conteúdo" required></textarea>

                <button type="submit" id="enviar"><strong>Enviar</strong></button>
            </form>
        </div>
    </div>
</main>
<?php include_once BASE_INCLUDES . '/siteFooter.php' ?>
</body>
</html>