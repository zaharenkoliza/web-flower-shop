<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $xml = simplexml_load_file("data.xml") or die("Error: Cannot create object");
    $id = $_GET['id'];
    foreach ($xml->item as $item) {
        if ($item['id']==$id){
    ?>
        <div>
            <div><?= $item->user_name ?></div>
            <div><?= $item->user_surname ?></div>
            <div><?= $item->bd ?></div>
            <form action="" method="POST">
                <button name='delete'>Удалить аккаунт</button>
                <a href="index.php?id=<?= $item['id']?>">Назад</a>
            </form>
        </div>
    <?php
        }
    }
    if (isset ($_POST['delete'])){
        $i = 0;
        foreach ($xml->item as $item) {

    
            if ($item['id'] == $id) {
                unset($xml->item[$i]);
                
                break;
            }

            $i++;
        }
        
        $xml->saveXML('data.xml');
        header('location:index.php');
    }
    ?>
</body>
