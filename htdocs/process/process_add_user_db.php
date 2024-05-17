<?php
include '../config/autoload/autoload.php';
include '../config/connexion/connexion.php';

// Vérifie si les champs requis sont remplis
if (empty($_POST['pseudo']) || empty($_POST['password'])) {
    header('Location: ../index.php?error=Veuillez remplir les champs');
    exit;
}

$user = new User($_POST);

$manager = new Manager($db);
$userVerify = $manager->getUserByPseudo($user);

if (!$userVerify) {
    $password_hash =  password_hash($_POST['password'], PASSWORD_DEFAULT);
    $user->setPassword($password_hash);
    $manager->addUserDb($user);
    header('Location: ../index.php?success=Inscription réussie');
} else {
    header('Location: ../index.php?error=Compte existant');
}

exit;
