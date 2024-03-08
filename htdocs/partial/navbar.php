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
                                <a href="../pages/add_destination.php" class="nav-link active text-primary" aria-current="page">Ajout d'une destination</a>
                            </li>
                            <li class="nav-item">
                                <a href="../pages/add_Tour.php" class="nav-link active text-primary" aria-current="page">Demande Tour Operator</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-primary" href="../process/process_logout.php">Deconnecter</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-primary" href="./ListOperator.php">Agences</a>
                            </li>
                        <?php  } else if (empty($_SESSION['entreprise']) && !empty($_SESSION)) {

                        ?>


                            <li class="nav-item">
                                <a class="nav-link text-primary" href="./ListOperator.php">Agences</a>
                            </li>
                            <!-- <li class="nav-item">
                        <a class="nav-link text-primary" href="./ListTour.php">Liste des voyage</a>
                    </li> -->
                            <li class="nav-item">
                                <a class="nav-link text-primary" href="../process/process_logout.php">Deconnecter</a>
                            </li>
                        <?php       } else { ?>
                            <li class="nav-item">
                                <a class="nav-link text-primary" href="../">Connecter</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-primary" href="#">S'inscrire</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-primary" href="./ListOperator.php">Agences</a>
                            </li>
                        <?php   } ?>
                    </ul>
                </div>
            </div>
        </div>
</nav>