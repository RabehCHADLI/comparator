<?php
include '../config/autoload/autoload.php';
include '../config/connexion/connexion.php';
include '../partial/header.php';
if (!isset($_SESSION['pseudo'])) {
    header("Location: ../index.php");
    exit();
}


if ($_SESSION['pseudo'] !== 'Rabeh') {
    header("Location: ../index.php");
    exit();
}
$max_length = 150;
$manager = new Manager($db);
$agences = $manager->getAllAttenteOperator();
?>

<body class="bg-light">
    <header>
        <nav class="navbar bg-body-tertiary">
            <div class="container-fluid">
                <form class="d-flex" role="search">

                    <h3 class="mt-1 tittre">ADMIN </h3>
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-primary" type="submit">Search</button>

                </form>
            </div>
        </nav>
    </header>
    <div class="container-fluid">
        <div class="row">
            <div class="col-2 bg-white p-4 border border-1 border-secondary rounded-3 " style="height: max-content;">
                <div class="d-flex flex-column">

                    <a class="lien" href="./admin_Agence.php">Liste Demande D'Agence</a>
                    <a class="lien" href="./admin_destination.php">Liste Demande Destination</a>
                    <a class="lien" href="./admin_User.php">Liste User</a>
                </div>
            </div>
            <div class="col-10">
                <div class="container">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#ID</th>
                                <th scope="col">Nom de l'agence</th>
                                <th scope="col">Description</th>
                                <th scope="col">Site web</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($agences as $agence) { ?>
                                <tr>
                                    <th><?= $agence['id'] ?></th>
                                    <th><?= $agence['name'] ?></th>
                                    <th class="description-cell"><?= strlen($agence['description']) > $max_length ? substr($agence['description'], 0, $max_length) . '...' : $agence['description'] ?></th>
                                    <th><a href="<?= $agence['link'] ?>"><?= $agence['link'] ?></a></th>
                                    <th>
                                        <a href="./?id=<?= $agence['id'] ?>" class="btn btn-primary text-white m-1">Accepter</a>
                                        <a href="../process/process_del_admintour.php?id=<?= $agence['id'] ?>" class="btn btn-danger m-1">Supprimer</a>
                                    </th>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>




            <?php include '../partial/footer.php'; ?>