<div class="questions-list">
    <div id="question-number-define">
        <p id="label">Nombre de questions par jeu</p>
        <input type="number" min="3" max="10" name="questionNumber" id="question-number" value="5">
        <button class="ok-btn">OK</button>
    </div>
    <?php foreach ($questions as $question) : ?>
        <div id="questions">
            <p class="question"><?= $question['question'] ?></p>
            <p><?= $question['question'] ?></p>
            <p><?= $question['a'] ?></p>
        </div>
    <?php endforeach ?>
    <button class="btn" id="next-btn">Suivant</button>
</div>