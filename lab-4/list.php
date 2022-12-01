<?php

$xml = simplexml_load_file("data.xml") or die("Error: Cannot create object");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styleforlist.css" />
</head>

<body>
    <div class="container">
        <a href="create.php">Создать новый аккаунт</a>
        <?php

        foreach ($xml->item as $item) {
        ?>
            <div class="task-card">
                <span class="task-card-name"><?= $item->user_name ?></span>
                <span class="task-card-assignedTo"><?= $item->user_surname ?></span>
                <span class="task-card-deadline"><?= $item->bd ?></span>
                <a href="index.php?id=<?= $item['id']?>">Войти в аккаунт</a>
                <a href="update.php?id=<?= $item['id']?>">Редактировать профиль</a>
                <a href="delete.php?id=<?= $item['id']?>">Удалить</a>
            </div>
        <?php
        }

        ?>
       
    </div>
</body>

</html>