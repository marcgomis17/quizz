<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= PATH_PUBLIC . 'styles' . DIRECTORY_SEPARATOR . 'global.css' ?>">
    <link rel="stylesheet" href="<?= PATH_PUBLIC . 'styles' . DIRECTORY_SEPARATOR . 'signup-form.css' ?>">
    <link rel="stylesheet" href="<?= PATH_PUBLIC . 'styles' . DIRECTORY_SEPARATOR . 'player-list.css' ?>">
    <link rel="stylesheet" href="<?= PATH_PUBLIC . 'styles' . DIRECTORY_SEPARATOR . 'question-add.css' ?>">
    <link rel="stylesheet" href="<?= PATH_PUBLIC . 'styles' . DIRECTORY_SEPARATOR . 'home-admin.css' ?>">
    <title>Quizz - Home</title>
</head>

<body>
    <div class="container">
        <?php require_once PATH_TEMPLATES . 'includes' . DIRECTORY_SEPARATOR . 'header.inc.html.php'; ?>
        <div class="admin-dashboard">
            <div class="admin-dashboard-header">
                <h2>CRÉEZ ET PARAMÉTREZ VOS QUIZZ</h2>
                <a href="<?= WEB_ROOT . '?controller=security&action=logout' ?>"><button class="btn">Déconnexion</button></a>
            </div>
            <div class="admin-profile">
                <div class="admin-infos">
                    <img src="<?= PATH_PUBLIC . 'images' . DIRECTORY_SEPARATOR . 'avatar-img.png' ?>" alt="avatar" class="avatar-admin">
                    <div class="name-display">
                        <p id="first-name"><?= $_SESSION['current_user']['first_name'] ?></p>
                        <p id="last-name"><?= $_SESSION['current_user']['last_name'] ?></p>
                    </div>
                </div>
                <div class="admin-menu">
                    <ul>
                        <a href="<?= WEB_ROOT . "?controller=user&action=questions-list" ?>">
                            <li>
                                <span>Liste des questions</span>
                                <img src="<?= PATH_PUBLIC . 'images' . DIRECTORY_SEPARATOR . 'icons' . DIRECTORY_SEPARATOR . 'ic-liste.png' ?>" alt="">
                            </li>
                        </a>
                        <a href="<?= WEB_ROOT . "?controller=user&action=add-admin" ?>">
                            <li>
                                <span>Créer un admin</span>
                                <img src="<?= PATH_PUBLIC . 'images' . DIRECTORY_SEPARATOR . 'icons' . DIRECTORY_SEPARATOR . 'ic-ajout.png' ?>" alt="">
                            </li>
                        </a>
                        <a href="<?= WEB_ROOT . "?controller=user&action=player-list" ?>">
                            <li>
                                <span>Liste des joueurs</span>
                                <img src="<?= PATH_PUBLIC . 'images' . DIRECTORY_SEPARATOR . 'icons' . DIRECTORY_SEPARATOR . 'ic-liste-active.png' ?>" alt="">
                            </li>
                        </a>
                        <a href="<?= WEB_ROOT . "?controller=user&action=add-question" ?>">
                            <li>
                                <span>Créer une question</span>
                                <img src="<?= PATH_PUBLIC . 'images' . DIRECTORY_SEPARATOR . 'icons' . DIRECTORY_SEPARATOR . 'ic-ajout.png' ?>" alt="">
                            </li>
                        </a>
                    </ul>
                </div>
            </div>
            <?= $view ?>
        </div>
    </div>
</body>

</html>