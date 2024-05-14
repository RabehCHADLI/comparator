<?php
include './config/autoload/autoload.php';
include './config/connexion/connexion.php';
$manager = new Manager($db);
$destinations = $manager->get4destination();



include './partial/header.php'
?>

<body>
    <header id='bgheader'>
        <nav class="navbar navbar-expand-lg d-flex justify-content-around">

            <div class="container">
                <a href="../index.php" class=""><img src="../images/logo.png" alt="" style='width: 250px'></a>
                <button class="navbar-toggler collapseds ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon "></span>
                </button>
                <div>
                    <div>
                        <div class="navbar-collapse collapse" id="navbarText">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <?php

                                if (!empty($_SESSION['entreprise'])) { ?>
                                    <li class="nav-item">
                                        <a href="./pages/add_destination.php" class="nav-link active text-primary" aria-current="page">Ajout d'une destination</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="./pages/add_Tour.php" class="nav-link active text-primary" aria-current="page">Demande Tour Operator</a>
                                    </li>
                                    </li>
                                    <li class="nav-itales attractions touristiques incluent le Palais de Buckingham, la Tour de Londres, le British Museum et le London Eye. La gastronomie londonienne est réputée pour sa diversité, allant des pubs traditionnels aux restaurants étoilés Michelin. Bien que généralement considérée comme sûre, il est conseillé aux visiteurs de rester vigilants, en particulier dans les zones touristiques très fréquentées de la ville. En somme, Londres offre une expérience riche en histoire, culture et divertissement, attirant les visiteurs du monde entier.
                                    <li class=" nav-item">
                                        <a class="nav-link text-primary" href="./process/process_logout.php">Deconnecter</a>
                                    </li>
                                <?php  } else if (empty($_SESSION['entreprise']) && !empty($_SESSION)) {

                                ?>


                                    <li class="nav-item">
                                        <a class="nav-link text-primary" href="./pages/ListOperator.php">Agences</a>
                                    </li>
                                    <!-- <li class="nav-item">
                        <a class="nav-link text-primary" href="#">Liste des voyage</a>
                    </li> -->
                                    <li class="nav-item">
                                        <a class="nav-link text-primary" href="./process/process_logout.php">Deconnecter</a>
                                    </li>
                                <?php       } else { ?>
                                    <li class="nav-item">
                                        <a class="nav-link text-primary" href="./pages/ListOperator.php">Agences</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link text-primary" href="./pages/connexion.php">Connecter</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-primary" href="./pages/inscription.php">S'inscrire</a>
                                    </li>
                                <?php   } ?>
                            </ul>
                        </div>
                    </div>
                </div>
        </nav>

        <div>
            <h1 class="text-center text-primary mt-5">LE GPS <br> DES BONS PLANS</h1>
            <form action="./pages/listDestinationByLocation.php" method="post" class="d-flex justify-content-center mt-3">
                <input type="text" name='location' class="input mt-8" placeholder="Londres, Romes , Tunis">
                <button class="btn mt-8"><i class="fa-solid fa-plane fa-lg" style="color: #000000;"></i></button>
            </form>
        </div>
    </header>

    <div>
        <h1 class="ms-4 mt-5 mb-5 text-primary">Les Meilleurs destination :</h1>
    </div>

    <div class="container mt-5">
        <div class="container rounded-2 p-2 " style="background-color:#cfcdcc ;">
            <?php
            foreach ($destinations as $key => $value) {
                $imgs = $manager->getImgByIdDestination($value->getId());
                $tourOperator = $manager->getOperatorByDestination($value);
            ?>
                <div class="row bg-light m-2 rounded-3 p-2 image">
                    <div class="col-lg-3 col-sm-12 d-flex flex-column justify-content-center">
                        <img class="rounded-start-2" src="../images/<?= $imgs['img'] ?>" alt="">
                    </div>
                    <div class="col-lg-9 col-sm-12">
                        <h4 class="ms-4 text-primary"><?= $value->getLocation() ?> :</h4>
                        <p class="mt-3"><?= $value->getDescription2() ?></p>
                        <div class="row mt-4">
                            <p class="col">Agence de voyage : <a href="<?= $tourOperator['link'] ?>"><?= $tourOperator['name'] ?></a></p>

                            <p class="col">Note de l'agence</p>

                        </div>

                        <form action="./pages/detailDestination.php" method="post" class="d-flex flex-row-reverse">

                            <div class="bg-secondary rounded-circle text-center d-flex flex-column justify-content-center" style='width:55px;height:55px'>

                                <button class="btn fs-4"><i class="fa-solid fa-plane fa-lg" style="color: #000000; "></i></button>
                            </div>
                            <p class="text-primary">Note: /5</p>

                            <input type="hidden" name="destinationId" value=" <?= $value->getId() ?>">
                        </form>
                    </div>

                </div>

            <?php }

            ?>
        </div>
    </div>


    <?php include './partial/footer.php' ?>