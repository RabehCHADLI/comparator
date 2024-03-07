<?php
include '../config/autoload/autoload.php';
include '../config/connexion/connexion.php';
$uploads = "../images";


if (!empty($_FILES['img']['name'][0])) {
    echo 'coucou';
    $filesCount = count($_FILES['img']['name']);

    for ($i = 0; $i < $filesCount; $i++) {
        $tmp_name = $_FILES['img']['tmp_name'][$i];
        $name = $_FILES['img']['name'][$i];
    }
} 

if (!empty($_POST['location'])&& !empty($_POST['description']) && !empty($_POST['price'])) {
    $manager = new Manager($db);
    $Newdestination = new Destination($_POST);
    $destination = $manager->createAttenteDestination($Newdestination);

    for ($i = 0; $i < $filesCount; $i++) {
        $manager->addImgDb(
            $tmp_name = $_FILES['img']['tmp_name'][$i],
            $destination->getId()
        );
}}