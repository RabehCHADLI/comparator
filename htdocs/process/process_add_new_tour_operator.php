<?php
include '../config/autoload/autoload.php';
include '../config/connexion/connexion.php';
$manager = new Manager($db);
$tour = $manager->getOperatorByUserId($_SESSION['userId']);


if (!$tour && !empty($_POST['name']) && !empty($_POST['description'])) {
    $tourOperator = new TourOperator($_POST);
    $tourOperator->setUserId($_SESSION['userId']);
    $manager->createAttenteTourOperator($tourOperator);
    header('Location: ../index.php?success=L\'agence doit valider votre agence');
} else {
    header('Location: ../index.php?error=Déjà une agence lié a se compte');
}
