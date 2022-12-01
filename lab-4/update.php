<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $id = 0;
    $user_name = '';
    $user_surname = '';
    $bd = '';

    $xml = simplexml_load_file("data.xml") or die("Error: Cannot create object");

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {

        $id = $_GET['id'];

        foreach ($xml->item as $item) {
            if ($item['id'] == $id) {
                $user_name = $item->user_name;
                $user_surname = $item->user_surname;
                $bd = $item->bd;
                $node = $item;
                break;
            }
        }
    } else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];
        foreach ($xml->item as $item) {
            if ($item['id'] == $id) {
                $item->user_name = $_POST['user_name'];
                $item->user_surname = $_POST['user_surname'];
                $item->bd = $_POST['bd'];
                break;
            }
        }
        $xml->saveXML('data.xml');
        header('Location: index.php?id='. $id);
    }
    ?>
    <form method="POST" action="update.php?id=<?= $id ?>">
        Имя: <input type="text" name="user_name" required value="<?= $user_name ?>"/><br />
        Фамилия: <input type="text" name="user_surname" value="<?= $user_surname ?>"/><br />
        День рождения: <input type="date" name="bd" value="<?= $bd ?>"/><br />
        <input type="hidden" value="<?= $id ?>" name="id"/>
        <input type="submit" value="Сохранить" />
    </form>
</body>

</html>