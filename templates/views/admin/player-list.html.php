<?php $current_page = "playerList" ?>
<div class="player-list right-part">
    <h3>Liste des joueurs par score</h3>
    <div id="player-list-wrapper">
        <table>
            <thead>
                <tr>
                    <th>Prénom</th>
                    <th>Nom</th>
                    <th>Score</th>
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
    </div>
    <button class="btn" id="next-btn">Suivant</button>
</div>