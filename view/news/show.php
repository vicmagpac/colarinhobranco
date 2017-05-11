<!DOCTYPE html>
<html>
<head>
    <title>Notícia</title>
    <?php include_once BASE_INCLUDES . '/headInclude.php' ?>
    <link rel="stylesheet" href="<?php echo BASE_ASSETS ?>/styles/news-show.css">
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
    </div>
</main>
<?php include_once BASE_INCLUDES . '/siteFooter.php' ?>
</body>
</html>