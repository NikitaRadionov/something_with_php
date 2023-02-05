<?php

// echo '<pre>';
// print_r($_GET);
// echo '</pre>';

$username = '';
$age  = '';
$position = '';
$comment = '';


if (isset($_GET['mode']) && $_GET['mode'] === 'update') {

    echo '<h1>Обновление данных:</h1>';

    $file = fopen('data.csv' , 'r');
    $items = [];

    while ($item = fgetcsv($file, 1000, ';')) {

        $items[] = $item;

    }

    $itemToEdit = $items[$_GET['index']];

    // echo '<pre>';
    // echo print_r($itemToEdit);
    // echo '</pre>';

    $username = $itemToEdit[0];
    $age  = $itemToEdit[1];
    $position = $itemToEdit[2];
    $comment = $itemToEdit[3];

}

?>

<html>

<head>

<title>Мой проект</title>

</head>

<body>

    <?php if (isset($_GET['mode']) && $_GET['mode'] === 'update') { ?>
        <form action="script.php?mode=update&index=<?php echo $_GET['index']; ?>" method="post">
    <?php } else { ?>
        <form action="script.php" method="post">
    <?php } ?>

        <label for="username">

            Имя пользователя<br/>

            <input type="text" name="username" id="username" value="<?php echo $username; ?>">

        </label><br/>

        <label for="age">

            Возраст<br/>

            <input type="number" name="age" id="age" value="<?php echo $age; ?>">

        </label><br/>

        <label for="position">

            Должность<br/>

            <input type="text" name="position" id="position" value="<?php echo $position; ?>">

        </label><br/>

        <label for="comment">

            Комментарий<br/>

            <textarea name="comment" id="comment" cols="30" rows="5"><?php echo $comment; ?></textarea>

        </label><br/><br/>

        <input type="submit" name="" value="Отправить">

    </form>
</body>
</html>