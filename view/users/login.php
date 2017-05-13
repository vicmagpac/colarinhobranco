<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <?php include_once BASE_INCLUDES . '/headInclude.php' ?>
    <link rel="stylesheet" href="<?php echo BASE_ASSETS ?>/styles/users-login.css">
</head>
<body>
<?php include_once BASE_INCLUDES . '/siteHeader.php' ?>
<main>
    <div id="site-content">
        <form method="post" action="<?php echo BASE_URL ?>?action=usersLogin">
            <label for="email">e-mail:</label>
            <input id="email" name="email" type="text" placeholder="e-mail" maxlength="75" required autofocus>

            <label for="senha">Senha:</label>
            <input id="senha" name="senha" type="password" required>

            <button type="submit"><strong>Login</strong></button>
        </form>
    </div>
</main>
<?php include_once BASE_INCLUDES . '/siteFooter.php' ?>
</body>
</html>