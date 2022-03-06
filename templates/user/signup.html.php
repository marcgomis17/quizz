<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= PATH_PUBLIC . 'styles' . DIRECTORY_SEPARATOR . 'global.css' ?>">
    <link rel="stylesheet" href="<?= PATH_PUBLIC . 'styles' . DIRECTORY_SEPARATOR . 'signup.css' ?>">
    <title>Quizz - Signup</title>
</head>

<body>
    <div class="container">
        <?php require_once PATH_TEMPLATES . 'includes' . DIRECTORY_SEPARATOR . 'header.inc.html.php'; ?>
        <div class="form-modal">
            <div class="form-modal-header">
                <p><span id="modal-title">S'INSCRIRE</span><br>
                    <span id="modal-subtitle">Pour tester votre niveau de culture générale</span>
                </p>
                <div class="separator"></div>
            </div>
            <div class="form-part">
                <div class="form-wrapper">
                    <form id="signup-form" action="" method="post">
                        <input type="hidden" name="controller" value="user">
                        <input type="hidden" name="action" value="home-user">

                        <div class="form-control">
                            <label for="first-name">Prénoms</label>
                            <input type="text" name="firstName" class="field" id="first-name" placeholder="Prénoms">
                            <small class="hidden"></small>
                        </div>
                        <div class="form-control">
                            <label for="last-name">Nom</label>
                            <input type="text" name="lastName" class="field" id="last-name" placeholder="Nom">
                            <small class="hidden"></small>
                        </div>
                        <div class="form-control">
                            <label for="email">Login</label>
                            <input type="text" name="email" class="field" id="email" placeholder="Login">
                            <small class="hidden"></small>
                        </div>
                        <div class="form-control">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="field" id="password" placeholder="Password">
                            <small class="hidden"></small>
                        </div>
                        <div class="form-control">
                            <label for="password-confirm">Confirmer le mot de passe</label>
                            <input type="password" name="passwordConfirm" class="field" id="password-confirm" placeholder="Confirmer le mot de passe">
                            <small class="hidden"></small>
                        </div>
                        <div class="avatar-choice">
                            <label id="avatar-label" for="avatar-choice">Avatar</label>
                            <input type="file" name="avatar-picture" id="avatar-choice">
                        </div>
                        <div class="form-control submit">
                            <button type="submit" class="btn" id="submit-btn">Créer un compte</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="avatar-display">
                <img src="<?= PATH_PUBLIC . 'images' . DIRECTORY_SEPARATOR . 'avatar-img.png' ?>" alt="" class="avatar">
                <p>Avatar du joueur</p>
            </div>
        </div>
    </div>
    <script src="<?= PATH_PUBLIC . 'scripts' . DIRECTORY_SEPARATOR . 'signup-form-validation.js' ?>"></script>
</body>

</html>