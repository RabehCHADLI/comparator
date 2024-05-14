<?php
include '../config/autoload/autoload.php';
if (!isset($_SESSION['pseudo'])) {
    header("Location: ../index.php");
    exit();
}


if ($_SESSION['pseudo'] !== 'Rabeh') {
    header("Location: access_denied.php");
    exit();
}
include '../partial/header.php';
?>


<body class="bg-light">
    <header>
        <nav class="navbar bg-body-tertiary">
            <div class="container-fluid">
                <form class="d-flex" role="search">

                    <h3 class="mt-1 tittre">ADMIN</h3>
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-primary" type="submit">Search</button>

                </form>
            </div>
        </nav>
    </header>
    <div class="container-fluid">
        <div class="row">
            <div class="col-2 bg-white p-4 border border-1 border-secondary rounded-3 ">
                <div class="d-flex flex-column">

                    <a class="lien" href="./admin_Agence.php">Liste Demande D'Agence</a>
                    <a class="lien" href="./admin_destination.php">Liste Demande Destination</a>
                    <a class="lien" href="./admin_User.php">Liste User</a>
                    <a class="lien" href="./admin_validation_agence.php">Accepter une demande d'agence</a>
                    <a class="lien" href="./admin_User.php">Accepter une destination</a>
                </div>
            </div>
        </div>
    </div>
    <?php include '../partial/footer.php'; ?>