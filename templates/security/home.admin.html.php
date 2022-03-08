<?php
$title = "";
switch ($current_page) {
    case 'questionList':
        $title = "Questions list";
        break;

    case 'addAdmin':
        $title = "Add admin";
        break;
    case 'playerList':
        $title = "Player list";
        break;
    case 'addQuestion':
        $title = "Add question";
        break;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= PATH_PUBLIC . 'styles' . DIRECTORY_SEPARATOR . 'global.css' ?>">
    <link rel="stylesheet" href="<?= PATH_PUBLIC . 'styles' . DIRECTORY_SEPARATOR . 'questions-list.css' ?>">
    <link rel="stylesheet" href="<?= PATH_PUBLIC . 'styles' . DIRECTORY_SEPARATOR . 'signup-form.css' ?>">
    <link rel="stylesheet" href="<?= PATH_PUBLIC . 'styles' . DIRECTORY_SEPARATOR . 'player-list.css' ?>">
    <link rel="stylesheet" href="<?= PATH_PUBLIC . 'styles' . DIRECTORY_SEPARATOR . 'question-add.css' ?>">
    <link rel="stylesheet" href="<?= PATH_PUBLIC . 'styles' . DIRECTORY_SEPARATOR . 'home-admin.css' ?>">
    <title><?= "Quizz - " . $title ?></title>
</head>

<body>
    <div class="container">
        <?php require_once PATH_TEMPLATES . 'includes' . DIRECTORY_SEPARATOR . 'header.inc.html.php'; ?>
        <div class="admin-dashboard">
            <div class="admin-dashboard-header">
                <h2>CRÉEZ ET PARAMÉTREZ VOS QUIZZ</h2>
                <div class="buttons">
                    <a id="logout" href="<?= WEB_ROOT . '?controller=user&action=home-user' ?>"><button class="btn">Jouer</button></a>
                    <a id="play" href="<?= WEB_ROOT . '?controller=security&action=logout' ?>"><button class="btn">Déconnexion</button></a>
                </div>
            </div>
            <div class="dashboard-content">
                <div id="left-part">
                    <div class="admin-profile">
                        <div class="admin-infos">
                            <img src="<?= PATH_PUBLIC . 'images' . DIRECTORY_SEPARATOR . 'avatar-img.png' ?>" alt="avatar" class="avatar-admin">
                            <div class="name-display">
                                <p id="username"><?= $_SESSION['current_user']['first_name'] . ' ' . $_SESSION['current_user']['last_name'] ?></p>
                            </div>
                        </div>
                        <div class="admin-menu">
                            <ul>
                                <a href="<?= WEB_ROOT . "?controller=user&action=question-list" ?>">
                                    <li class="list-item <?php if ($current_page === "questionList") : ?> active <?php endif; ?>">
                                        <span>Liste des questions</span>
                                        <?php if ($current_page === "questionList") : ?>
                                            <img src="<?= PATH_PUBLIC . 'images' . DIRECTORY_SEPARATOR . 'icons' . DIRECTORY_SEPARATOR . 'ic-liste-active.png' ?>" alt="">
                                        <?php else : ?>
                                            <img src="<?= PATH_PUBLIC . 'images' . DIRECTORY_SEPARATOR . 'icons' . DIRECTORY_SEPARATOR . 'ic-liste.png' ?>" alt="">
                                        <?php endif ?>
                                    </li>
                                </a>
                                <a href="<?= WEB_ROOT . "?controller=user&action=add-admin" ?>">
                                    <li class="list-item <?php if ($current_page === "addAdmin") : ?> active <?php endif; ?>">
                                        <span>Créer un admin</span>
                                        <?php if ($current_page === "addAdmin") : ?>
                                            <img src=" <?= PATH_PUBLIC . 'images' . DIRECTORY_SEPARATOR . 'icons' . DIRECTORY_SEPARATOR . 'ic-ajout-active.png' ?>" alt="">
                                        <?php else : ?>
                                            <img src="<?= PATH_PUBLIC . 'images' . DIRECTORY_SEPARATOR . 'icons' . DIRECTORY_SEPARATOR . 'ic-ajout.png' ?>" alt="">
                                        <?php endif ?>
                                    </li>
                                </a>
                                <a href="<?= WEB_ROOT . "?controller=user&action=player-list" ?>">
                                    <li class="list-item <?php if ($current_page === "playerList") : ?> active <?php endif; ?>">
                                        <span>Liste des joueurs</span>
                                        <?php if ($current_page === "playerList") : ?>
                                            <img src=" <?= PATH_PUBLIC . 'images' . DIRECTORY_SEPARATOR . 'icons' . DIRECTORY_SEPARATOR . 'ic-liste-active.png' ?>" alt="">
                                        <?php else : ?>
                                            <img src="<?= PATH_PUBLIC . 'images' . DIRECTORY_SEPARATOR . 'icons' . DIRECTORY_SEPARATOR . 'ic-liste.png' ?>" alt="">
                                        <?php endif ?>
                                    </li>
                                </a>
                                <a href="<?= WEB_ROOT . "?controller=user&action=add-question" ?>">
                                    <li class="list-item <?php if ($current_page === "addQuestion") : ?> active <?php endif; ?>">
                                        <span>Créer une question</span>
                                        <?php if ($current_page === "addQuestion") : ?>
                                            <img src=" <?= PATH_PUBLIC . 'images' . DIRECTORY_SEPARATOR . 'icons' . DIRECTORY_SEPARATOR . 'ic-ajout-active.png' ?>" alt="">
                                        <?php else : ?>
                                            <img src="<?= PATH_PUBLIC . 'images' . DIRECTORY_SEPARATOR . 'icons' . DIRECTORY_SEPARATOR . 'ic-ajout.png' ?>" alt="">
                                        <?php endif ?>
                                    </li>
                                </a>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="right-part">
                    <?= $view ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>