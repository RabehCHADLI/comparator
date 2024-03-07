<?php
include '../config/autoload/autoload.php';
include '../config/connexion/connexion.php';
if (empty($_POST['entreprise'])) {
    $_POST['entreprise'] = false;
    $user = new User($_POST);
}else{
    $user = new User($_POST);
}


if (!empty($_POST['pseudo']) && !empty($_POST['password'])) {
    $manager = new Manager($db);
    $userVerify = $manager->getUserByPseudo($user);
    if (!$userVerify) {
        $password_hash =  password_hash($_POST['password'],PASSWORD_DEFAULT);
        $user->setPassword($password_hash);
        $manager->addUserDb($user);
        header('Location: ../index.php?sucess=Inscription Réeussis');
    }else{
        header(('Location : ../index.php?error=Compte existant'));
    }
}