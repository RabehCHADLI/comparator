<?php 
include '../config/autoload/autoload.php';
include '../config/connexion/connexion.php';
$manager = new Manager($db);
$tour = $manager->getOperatorByUserId($_SESSION['userId']);


if (!$tour && !empty($_POST['name']) && !empty($_POST['description'])) {
    $tourOperator = new TourOperator($_POST);
    $tourOperator->setUserId($_SESSION['userId']);
    $manager->createAttenteTourOperator($tourOperator);
    header('Location: ../index.php?success = Tour operateur Attente de validation');
}else{
    header('Location: ../index.php?error = Déjà un tour operateur lié a se compte');
}