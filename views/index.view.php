    <div style="margin: 40px 0">
        <a id="create-character" href="./create-character.php">Create New</a>
    </div>
    <p style="margin-top: 30px">OR</p>
    <table id="characters-table">
        <tr id="characters-row">
            <th></th>
            <th>Name</th>
            <th>Level</th>
            <th>Last Played</th>
        </tr>
        <?php foreach ($characters as $item) : ?>
            <tr>
                <td>
                    <a href="./game.php?id=<?= $item->id ?>">Continue with:</a>
                </td>
                <td><?= $item->name ?></td>
                <td><?= $item->level ?></td>
                <td><?= $item->lastUpdated ?></td>
                <td>
                    <form method="POST">
                        <input type="number" name="id" id="id" value=<?= $item->id ?> hidden>
                        <button type="submit">🗑️</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>