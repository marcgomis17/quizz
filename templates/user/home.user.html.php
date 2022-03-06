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
            <p class="info-display">
                <span class="user-name"><?= $_SESSION['current_user']['first_name'] . ' ' . $_SESSION['current_user']['last_name'] ?></span><br>
                <span class="score"><?= 'Score: ' . $_SESSION['current_user']['score'] ?></span>
            </p>
            <nav class="menu">
                <ul class="menu-wrapper">
                    <li><a href="<?= WEB_ROOT . '?controller=security&action=home-user' ?>">Accueil</a></li>
                    <?php if ($_SESSION['current_user']['role'] === "ROLE_ADMIN") : ?>
                        <li><a href="">Questions</a></li>
                    <?php endif ?>
                    <li><a href="<?= WEB_ROOT . '?controller=security&action=logout' ?>">Déconnexion</a></li>
                </ul>
            </nav>
        </header>
    </div>
</body>

</html>