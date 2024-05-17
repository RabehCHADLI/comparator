<?php
try {
    $db = new PDO('mysql:host=141.94.22.233;port=3306;dbname=comparatorRabehDB;charset=utf8', 'rabeh_luxury', 'Rebeh,42153', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch (\Throwable $th) {
    die('erreur db');
}
