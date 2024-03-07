<?php include '../config/autoload/autoload.php'; ?>

<?php include '../config/connexion/connexion.php'; ?>

<?php include '../partial/header.php'; 
$manager = new Manager($db);
$operator = new TourOperator($manager->getO);
?>

<body style="background-color: #ABB3C2;">
    <?php include '../partial/navbar.php'; ?>
    <div class="text-center mb-5">
        <h1 class="text-primary">$Tour Operator</h1>
    </div>