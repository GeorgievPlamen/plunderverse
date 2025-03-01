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
                <button>Continue with:</button>
            </td>
            <td><?= $item->name ?></td>
            <td><?= $item->Level ?></td>
            <td><?= $item->lastUpdated ?></td>
            <td>
                <button>🗑️</button>
            </td>
        </tr>
    <?php endforeach; ?>
</table>