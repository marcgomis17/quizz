<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= PATH_PUBLIC . 'styles' . DIRECTORY_SEPARATOR . 'global.css' ?>">
    <link rel="stylesheet" href="<?= PATH_PUBLIC . 'styles' . DIRECTORY_SEPARATOR . 'home-user.css' ?>">
    <title><?= 'Quizz - ' . $_SESSION['current_user']['first_name'] . ' ' . $_SESSION['current_user']['last_name'] ?></title>
</head>

<body>
    <div class="container">
        <header>
            <div class="info-display">
                <p class="user-name"><?= $_SESSION['current_user']['first_name'] . ' ' . $_SESSION['current_user']['last_name'] ?></p><br>
                <?php if ($_SESSION['current_user']['role'] === "ROLE_PLAYER") : ?>
                    <p class="score"><?= 'Score: ' . $_SESSION['current_user']['score'] ?></p>
                <?php endif ?>
            </div>
            <nav class="menu">
                <ul class="menu-wrapper">
                    <a href="<?= WEB_ROOT . '?controller=user&action=home-user' ?>">
                        <li>Accueil</li>
                    </a>
                    <?php if ($_SESSION['current_user']['role'] === "ROLE_ADMIN") : ?>
                        <a href="<?= WEB_ROOT . '?controller=security&action=home-admin' ?>">
                            <li>Questions</li>
                        </a>
                    <?php endif ?>
                    <a href="<?= WEB_ROOT . '?controller=security&action=logout' ?>">
                        <li>Déconnexion</li>
                    </a>
                </ul>
            </nav>
        </header>
    </div>
</body>

</html>