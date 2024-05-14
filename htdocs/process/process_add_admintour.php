<?php
include '../config/autoload/autoload.php';
include '../config/connexion/connexion.php';
if (!empty($_POST['name']) && !empty($_POST['link']) && !empty($_POST['description']) && !empty($_POST['userId'])) {
    $manager = new Manager($db);
    $tour = new TourOperator($_POST);
    $manager->addAgence($tour);

    $manager->delAttenteOperator($tour);
}
