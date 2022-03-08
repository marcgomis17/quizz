<?php $current_page = "addAdmin" ?>
<div class="form-modal">
    <div class="form-modal-header">
        <p><span id="modal-title">S'INSCRIRE</span><br>
            <span id="modal-subtitle">Pour proposer des quizz</span>
        </p>
        <div class="separator"></div>
    </div>
    <div class="form-content">
        <div class="form-part">
            <div class="form-wrapper">
                <form id="signup-form" action="" method="post">
                    <input type="hidden" name="controller" value="user">
                    <input type="hidden" name="action" value="add-admin">

                    <div class="form-control">
                        <label for="first-name">Prénoms</label>
                        <input type="text" name="firstName" class="field" placeholder="Prénoms">
                        <small class="hidden"></small>
                    </div>
                    <div class="form-control">
                        <label for="last-name">Nom</label>
                        <input type="text" name="lastName" class="field" placeholder="Nom">
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
            <img src="<?= PATH_PUBLIC . 'images' . DIRECTORY_SEPARATOR . 'avatar-img.png' ?>" alt="" class="avatar-signup">
            <p>Avatar de l'admin</p>
        </div>
    </div>
</div>
<script src="<?= PATH_PUBLIC . 'scripts' . DIRECTORY_SEPARATOR . 'signup-form-validation.js' ?>"></script>