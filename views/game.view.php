<section id="player-stats">
    <p><?= $character->name ?></p>
    <p>Credits: <?= $character->credits ?></p>
    <p>Level: <?= $character->Level ?></p>
</section>
<section id="game-view">
    <div id="img-container">
        <img
            src="./public/<?= $scene->img ?>"
            alt="stranded-planet" />
    </div>
    <div id="story-text">
        <p>
            <?= $scene->story ?>
        </p>
    </div>
    <div id="game-options">
        <form action="game.php?id=<?= htmlspecialchars($_GET['id']) ?>" method="post">
            <input type="text" id="action_key" name="action_key" hidden value=<?= $scene->getActionKey(0) ?>>
            <button type="submit" id="option-button"> <?= $scene->getActionText(0) ?></button>
        </form>
        <form action="game.php?id=<?= htmlspecialchars($_GET['id']) ?>" method="post">
            <input type="text" id="action_key" name="action_key" hidden value=<?= $scene->getActionKey(1) ?>>
            <button type="submit" id="option-button"> <?= $scene->getActionText(1) ?></button>
        </form>
        <form action="game.php?id=<?= htmlspecialchars($_GET['id']) ?>" method="post">
            <input type="text" id="action_key" name="action_key" hidden value=<?= $scene->getActionKey(2) ?>>
            <button type="submit" id="option-button"> <?= $scene->getActionText(2) ?></button>
        </form>
        <form action="game.php?id=<?= htmlspecialchars($_GET['id']) ?>" method="post">
            <input type="text" id="action_key" name="action_key" hidden value=<?= $scene->getActionKey(3) ?>>
            <button type="submit" id="option-button"> <?= $scene->getActionText(3) ?></button>
        </form>
    </div>
</section>