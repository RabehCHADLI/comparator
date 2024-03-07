<?php 
include '../config/autoload/autoload.php';
include '../config/connexion/connexion.php';

$tourOperator = [
    'name'=> 'rabehtour',
    'userId'=> '3',
    'link'=> 'blalba',
];
    $manager = new Manager($db);
    $tourOperator = new TourOperator($tourOperator);
    $manager->createAttenteTourOperator($tourOperator);