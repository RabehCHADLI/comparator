<?php 
include '../config/autoload/autoload.php';
include '../config/connexion/connexion.php';
if (!empty($_POST)) {

    $manager = new Manager($db);
    $tourOperator = new TourOperator($_POST);
    $tourOperator = $manager->createTourOperator($tourOperator);
}