<?php

// # MVC. Модель гостевой книги.
require_once "config.php";

// Загрузка гостевой книги.
function LoadBook($fname)
{
    if (!file_exists($fname)) {
        return array();
    }

    $Book = unserialize(file_get_contents($fname));
    return $Book;
}

// Сохраняет содержимое книги на диске
function SaveBook($fname, $Book)
{
    file_put_contents($fname, serialize($Book));
}

// Добавить в книгу запись пользователя. Запись добавляется  в начало книги.
function AddBook($Book, $arr = array())
{
    if (!empty($arr['doAdd'])) {
        // Сначала — загрузка гостевой книги.
        $tmpBook = LoadBook($Book);
        // Добавить в книгу запись пользователя. Запись добавляется  в начало книги.
        $tmpBook = array(
            time() => $arr['new'],
        ) + $tmpBook;
        // Записать книгу на диск.
        SaveBook($Book, $tmpBook);
    }
}

// Загрузка новостей
function LoadData($fname)
{
    $Data = array();
    $f = fopen($fname, "r");
    for ($i = 1;!feof($f) && $i <= 5; $i++) {
        $n = trim(fgets($f, 1024));
        if (!$n) {
            continue;
        }

        $Data[] = $n;
    }
    return $Data;
}