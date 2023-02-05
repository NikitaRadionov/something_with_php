<?php

// Теперь, если все предыдущие шаги успешно выполнены, нам нужно вывести на отдельную страницу список всех попыток заполнения формы

// \* Открываем наш csv файл для считывания информации

if (file_exists('./data.csv')){

    $file = fopen('data.csv' , 'r');
    $items = [];

    // \* Считаваем весь csv файл через цикл while
    while ($item = fgetcsv($file, 1000, ';')) {

        $items[] = $item;

    }

    // echo '<pre>';
    // print_r($items);
    // echo '</pre>';

    if (isset($_GET['mode']) && $_GET['mode'] === 'delete') {
        unset($items[$_GET['index']]);
        $dataToUpdate = '';

        foreach ($items as $item) {

            $dataToUpdate .= implode(';', $item)  . PHP_EOL;

        }

        file_put_contents('data.csv', $dataToUpdate, LOCK_EX);
    }

    // echo '<pre>';
    // print_r($dataAfterDelete);
    // echo '</pre>';

    // \* В данном цикле была неправильная конкатенация строк, а также несоответствующее задаче обращение к индексам массива item
    echo '<table border=1>';
    foreach ($items as $key=>$item) {

       echo '<tr>';

       echo '<td>' . $item[0] . '</td>';

       echo '<td>' . $item[1] . '</td>';

       echo '<td>' . $item[2] . '</td>';

       echo '<td>' . $item[3] . '</td>';

       echo '<td><button onclick="location.href=\'index.php?mode=update&index='. $key  .'\';">Обновить</button></td>';

       echo '<td><button onclick="location.href=\'list.php?mode=delete&index='. $key  .'\';">Удалить</button></td>';

       echo '</tr>';

    }
    echo '</table>';

}
