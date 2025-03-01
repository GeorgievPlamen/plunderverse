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
        <button id="option-button"> <?= $scene->getActionText(0) ?></button>
        <button id="option-button"> <?= $scene->getActionText(1) ?></button>
        <button id="option-button"> <?= $scene->getActionText(2) ?></button>
        <button id="option-button"> <?= $scene->getActionText(3) ?></button>
    </div>
</section>