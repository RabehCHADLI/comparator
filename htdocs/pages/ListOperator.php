<?php include '../config/autoload/autoload.php'; ?>

<?php include '../config/connexion/connexion.php'; ?>

<?php include '../partial/header.php';
$manager = new Manager($db);
$operator = $manager->getAllOperator();
?>

<body>
    <?php include '../partial/navbar.php'; ?>
    <div class="container">
        <h1 class="">Agences disponibles :</h1>

    </div>

    <div class="container mt-5 border border-1">
        <div class="row d-flex justify-content-around">
            <?php
            foreach ($operator as $key => $value) {
            ?>
                <a href="./detailTour.php?opId=<?= $value->getId() ?>" class="data-card col text-center">
                    <h3><?= $value->getName() ?></h3>
                    <h5><?= $value->getLink() ?></h5>
                    <p><?= $value->getDescription() ?></p>
                    <span class="link-text">
                        En Savoir plus
                    </span>
                </a>
            <?php   }
            ?>
        </div>

    </div>