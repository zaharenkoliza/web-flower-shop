<!DOCTYPE html>

<head>
    <meta charset="utf-8" /> 
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1,minimum-scale=1" />
</head>

<body>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $user_name = $_POST['user_name'];
        $user_surname = $_POST['user_surname'];
        $bd = $_POST['bd'];

        $xml = simplexml_load_file("data.xml") or die("Error: Cannot create object");
        
        $task = $xml->addChild('item', '');
        $task->addChild('user_name', $user_name);
        $task->addChild('user_surname', $user_surname);
        $task->addChild('bd', $bd);
        $task->addAttribute('id', $xml->count());
        $id = $task['id'];

        $xml->saveXML('data.xml');
        header('Location: index.php?id'. $id);

    }
    ?>
    <form method="POST" action="create.php">
        Имя: <input type="text" name="user_name" required /><br />
        Фамилия: <input type="text" name="user_surname" /><br />
        Логин: <input type="date" name="bd" /><br />
        <input type="submit" value="Сохранить" />
        <a type="submit" href="update.php?id=<?= $item['id']?>">Редактировать профиль</a>
        <a type="submit" href="delete.php?id=<?= $item['id']?>">Удалить профиль</a>
    </form>
</body>

</html>