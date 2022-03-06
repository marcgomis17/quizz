<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= PATH_PUBLIC . 'styles' . DIRECTORY_SEPARATOR . 'global.css' ?>">
    <link rel="stylesheet" href="<?= PATH_PUBLIC . 'styles' . DIRECTORY_SEPARATOR . 'login.css' ?>">
    <title>Quizz - signin</title>
</head>

<body>
    <div class="container">
        <?= require_once PATH_TEMPLATES . 'includes' . DIRECTORY_SEPARATOR . 'header.inc.html.php' ?>
        <div class="modal">
            <div class="modal-header">
                <p class="modal-title">Login</p>
            </div>
            <div class="modal-form-wrapper">
                <form action="" method="post">
                    <input type="hidden" name="controller" value="security">
                    <input type="hidden" name="action" value="home-admin">
                    <div class="form-control icon">
                        <input type="text" name="email" id="email" placeholder="Login">
                        <img src="<?= PATH_PUBLIC . 'images' . DIRECTORY_SEPARATOR . 'icons' . DIRECTORY_SEPARATOR . 'ic-login.png' ?>" alt="">
                        <small class="hidden"></small>
                    </div>
                    <div class="form-control icon password">
                        <input type="text" name="password" id="password" placeholder="Password">
                        <img src="<?= PATH_PUBLIC . 'images' . DIRECTORY_SEPARATOR . 'icons' . DIRECTORY_SEPARATOR . 'ic-password.png' ?>" alt="">
                        <small class="hidden"></small>
                    </div>
                    <div class="form-control submit">
                        <button type="submit" class="btn">Connexion</button>
                        <p><a href="<?= WEB_ROOT . '?controller=user&action=signup' ?>">S'inscrire pour jouer?</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>