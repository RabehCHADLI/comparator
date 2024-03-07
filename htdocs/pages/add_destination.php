<?php
include '../config/autoload/autoload.php';
include '../partial/header.php';
if (empty($_SESSION['entreprise'])) {
    header('Location: ../index.php');
}
?>

<body style="background-color: #ABB3C2;">
    <?php include '../partial/navbar.php' ?>
    <div class="text-center">
        <h1 class="text-primary">Nouvelle Destination</h1>
    </div>
    <div class="container d-flex justify-content-center">
        <form action="../process/process_add_destination.php" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <div class='ml-10 mt-5 mb-1'>
                        <label class="fs-3" for="location">Ville :</label>
                    </div>
                    <div class="text-center">
                        <input class="form-control" type="text" name="location" placeholder="Ville">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class='ml-10 mt-5 mb-1'>
                        <label class="fs-3" for="price">Prix TTC :</label>
                    </div>
                    <div class="text-center">
                        <input class="form-control" type="text" name="price" placeholder="Prix TTC :">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class='ml-10 mt-5 mb-1'>
                        <label class="fs-3" for="img">Les photos :</label>
                    </div>
                    <div class="text-center">
                        <input class="form-control" type="file" name="img[]" multiple>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class='ml-10 mt-5 mb-1'>
                        <label class="fs-3" for="description">Déscriptif :</label>
                    </div>
                    <div class="form-floating text-center">
                        <textarea class="form-control" placeholder="Déscriptif" id="floatingTextarea"></textarea>
                    </div>
                </div>
            </div>
            <div class="text-center mt-5">
                <button class="button1" type="submit">Créer</button>
            </div>
        </form>
    </div>
    <?php include '../partial/footer.php'; ?>