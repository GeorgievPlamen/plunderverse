<!DOCTYPE html>
<html lang="bg">

<head>
    <meta charset="UTF-8" />
    <title>Plunderverse</title>
    <link rel="stylesheet" href="css/styles.css" />
</head>

<body>
    <header>
        <h1>Plunderverse</h1>
        <h2>
            <?= $view_bag['title']; ?>
        </h2>
    </header>
    <main>
        <?php
        $viewName = $view_bag['view'];
        require_once("$viewName.view.php");
        ?>
    </main>
</body>

</html>