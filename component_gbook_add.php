<?php

// # Компонентный подход. Компонент добавления записи.
require_once "model.php"; // подключаем Модель
AddBook(GBOOK, $_REQUEST);
$Data = null;