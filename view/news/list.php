<!DOCTYPE html>
<html>
<head>
    <title>Notícias</title>
    <?php include_once BASE_INCLUDES . '/headInclude.php' ?>
    <link rel="stylesheet" href="<?php echo BASE_ASSETS ?>/styles/news-list.css">
</head>
<body>
<?php include_once BASE_INCLUDES . '/siteHeader.php' ?>
<?php include_once BASE_INCLUDES . '/siteNavbar.php' ?>
<main>
    <div id="site-content">
        <?php
            /**
             * @var $news App\Model\News
             */
            foreach ($viewData->news as $i => $news):
        ?>
            <article class="news-headline <?= $i % 2 == 0 ? 'even' : 'odd' ?>">

                <h2 class="news-headline-title">
                    <a href="<?php echo BASE_URL ?>?action=newsShow&id=<?php echo $news->getId(); ?>">
                        <?php echo $news->getTitle(); ?>
                    </a>
                </h2>

                <a href="<?php echo BASE_URL ?>?action=newsShow&id=<?php echo $news->getId(); ?>">
                    <img src="#" class="news-headline-image" >
                </a>

                <span class="news-headline-time">
                    <?php
                       echo $news->getDate()->format('d-m-Y');
                    ?>
                </span>

                <p><?php echo $news->getHeadLineContent(); ?></p>

            </article>
        <?php endforeach; ?>

    </div>
</main>
<?php include_once BASE_INCLUDES . '/siteFooter.php' ?>
</body>
</html>