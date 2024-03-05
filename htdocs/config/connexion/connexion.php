<?php


try {
    $db = new PDO("mysql:host=127.0.0.1;port=3306;dbname=comparo_full", 'root', '', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ]);
} catch (\Throwable $th) {
    die('erreur db');
}
