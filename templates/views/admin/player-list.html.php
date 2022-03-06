<div class="player-list">
    <h3>Liste des joueurs par score</h3>
    <table>
        <thead>
            <tr>
                <td>Prénom</td>
                <td>Nom</td>
                <td>Score</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user) : ?>
                <?php if ($user['role'] == "ROLE_PLAYER") : ?>
                    <tr>
                        <td><?= $user['first_name'] ?></td>
                        <td><?= $user['last_name'] ?></td>
                        <td><?= $user['score'] ?></td>
                    </tr>
                <?php endif ?>
            <?php endforeach ?>
        </tbody>
    </table>
    <button class="btn" id="next-btn">Suivant</button>
</div>