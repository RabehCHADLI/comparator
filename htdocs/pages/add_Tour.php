<?php
include '../config/autoload/autoload.php';
 include '../partial/header.php';
?>

<body style="background-color: #ABB3C2;">
<?php include '../partial/navbar.php' ?>
        <div class="text-center">
            <h1 class="text-primary">S'inscrire Tour Operator</h1>
        </div>
    <div class="container">
        <form action="../process/process_add_new_tour_operator.php" method="post">
            <div class="row">
                <div class="col-md-6">
                    <div class='ml-10 mt-5 mb-1'>
                        <label class="fs-3" for="pseudo">Nom :</label>
                    </div>
                    <div class="text-center">
                        <input class="form-control" type="text" name="name" placeholder="Nom de l'agence">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class='ml-10 mt-5 mb-1'>
                        <label class="fs-3" for="link">Lien :</label>
                    </div>
                    <div class="text-center">
                        <input class="form-control" type="text" name="link" placeholder="www.TourOperator.com">
                    </div>
                </div>
            </div>
            <div class='ml-10 mt-5 mb-1'>
                        <label class="fs-3" for="description">Description :</label>
                    </div>
                    <div class="form-floating text-center">
                        <textarea class="form-control"name='description' placeholder="Description" id="floatingTextarea"></textarea>
            </div>
            <div class="text-center mt-5">
                <button class="button1" type="submit">S'inscrire</button>
            </div>
        </form>
    </div>
<?php include '../partial/footer.php'; ?>