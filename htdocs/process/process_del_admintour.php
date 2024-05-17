<?php
include '../config/autoload/autoload.php';
include '../config/connexion/connexion.php';
$mannager = new Manager($db);
$tour = new TourOperator($mannager->getAttenteDestinationById());
