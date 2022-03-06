<div class="question-add">
    <h3>PARAMÉTREZ VOTRE QUESTION</h3>
    <div class="question-add-form-wrapper">
        <form id="question-add-form" action="" method="post">
            <div class="form-control">
                <label for="questions">Question</label>
                <input class="input-add" type="text" name="question" id="questions">
            </div>
            <div class="form-control">
                <label for="">Nombre de points</label>
                <input class="input-add" type="number" min="1" max="10" name="points" id="">
            </div>
            <div class="form-control">
                <label for="">Type de réponse</label>
                <div class="inputs">
                    <select name="answerType" id="">
                        <option value="">Donnez le type de réponse</option>
                        <option value="once">Choix unique</option>
                        <option value="multi">Choix multiple</option>
                    </select>
                    <img src="<?= PATH_PUBLIC . 'images' . DIRECTORY_SEPARATOR . 'icons' . DIRECTORY_SEPARATOR . 'ic-ajout-reponse.png' ?>" alt="">
                </div>
            </div>
            <div class="form-control">
                <label for="">Réponse 1</label>
                <div class="inputs">
                    <input class="input-add" type="text" name="" id="answer">
                    <input type="checkbox" name="" id="check">
                    <input type="radio" name="" id="radio">
                    <img id="delete-img" src="<?= PATH_PUBLIC . 'images' . DIRECTORY_SEPARATOR . 'icons' . DIRECTORY_SEPARATOR . 'ic-supprimer.png' ?>" alt="">
                </div>
            </div>
            <div class="question-submit">
                <button class="btn" type="submit" id="add-btn">Enregistrer</button>
            </div>
        </form>
    </div>
</div>