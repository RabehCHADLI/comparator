<?php
include '../config/autoload/autoload.php';
include '../config/connexion/connexion.php';
$uploads = "../images";
$manager = new Manager($db);
$tour = $manager->getTourOperatorByUser($_SESSION['userId']);
if (!$tour) {
    header("Location: ../index.php?error=il faut une agence de voyage pour proposer une destination");
}

if (!empty($_FILES['img']['name'][0])) {

    $filesCount = count($_FILES['img']['name']);

    for ($i = 0; $i < $filesCount; $i++) {
        $tmp_name = $_FILES['img']['tmp_name'][$i];
        $name = $_FILES['img']['name'][$i];
        move_uploaded_file($tmp_name, $uploads . '/' . $name);
    }
}

if (!empty($_POST['location']) && !empty($_POST['description']) && !empty($_POST['price'])) {
    $manager = new Manager($db);
    $Newdestination = new Destination($_POST);
    $destination = $manager->createAttenteDestination($Newdestination, $_SESSION['userId']);

    // for ($i = 0; $i < $filesCount; $i++) {
    //     $name = $_FILES['img']['name'][$i];
    //     $manager->addImgDb(
    //         $name,
    //         $destination->getId()
    //     );
    // }
    header('Location: ../index.php?success=L\'offre à était ajouté et doit être vérifier');
}
