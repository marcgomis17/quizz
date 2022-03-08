<?php $current_page = "questionList" ?>
<div class="questions-list right-part">
    <div id="question-number-define">
        <p id="label">Nombre de questions par jeu</p>
        <input type="number" min="3" max="10" name="questionNumber" id="question-number" value="3">
        <button class="ok-btn">OK</button>
    </div>
    <div class="question-display-wrapper">
        <?php foreach ($questions as $question) : ?>
            <div id="questions">
                <p class="question"><?= $question['question'] ?></p>
                <p class="answer"><?= $question['a'] ?></p>
                <p class="answer"><?= $question['b'] ?></p>
                <p class="answer"><?= $question['c'] ?></p>
                <p class="answer"><?= $question['d'] ?></p>
            </div>
        <?php endforeach ?>
    </div>
    <button class="btn" id="next-btn">Suivant</button>
</div>