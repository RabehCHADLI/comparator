<?php
include '../config/autoload/autoload.php';
include '../config/connexion/connexion.php';
if (!empty($_POST['pseudo']) && !empty($_POST['password'])) {
    $manager = new Manager($db);
    $user = new User($_POST);
    $connexion = $manager->userConnexion($user);
    header('Location: ../index.php?success=Connexion réeussi');
}
