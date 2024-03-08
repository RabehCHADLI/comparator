<?php
include '../config/autoload/autoload.php';
include '../config/connexion/connexion.php';
$manager = new Manager($db);
$review = new Review($_POST);

$manager->addReviewAndAuthorDb($review,$_POST['name']);
header('Location: ../index.php?Avis Envoyer');
?>