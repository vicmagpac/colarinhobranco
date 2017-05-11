<!DOCTYPE html>
<html>
<head>
    <title>Notícia</title>
    <?php include_once BASE_INCLUDES . '/headInclude.php' ?>
    <link rel="stylesheet" href="<?php echo BASE_ASSETS ?>/styles/news-edit.css">
</head>
<body>
<?php include_once BASE_INCLUDES . '/siteHeader.php' ?>
<?php include_once BASE_INCLUDES . '/siteNavbar.php' ?>
<main>
    <div id="site-content">
        <form method="post" action="<?php echo BASE_URL ?>?action=newsSave" enctype="multipart/form-data">
            <label for="title">Título:</label>
            <input id="title" name="title" type="text" placeholder="Título" maxlength="75" required autofocus>

            <label for="date">Data e horário:</label>
            <input id="date" name="date" type="datetime-local" required>

            <label for="headline-content">Conteúdo:</label>
            <textarea id="headline-content" name="headline-content" rows="3"
                      placeholder="Manchete" maxlength="350" required></textarea>

            <label for="news-content">Conteúdo:</label>
            <textarea id="news-content" name="content" rows="10" placeholder="Conteúdo" required></textarea>

            <label for="headline-image">Imagem da manchete:</label>
            <input id="headline-image" name="headline-image" type="file" accept=".jpg,jpeg,.png" required>

            <button type="submit"><strong>Enviar</strong></button>
        </form>
    </div>
</main>
<?php include_once BASE_INCLUDES . '/siteFooter.php' ?>
</body>
</html>