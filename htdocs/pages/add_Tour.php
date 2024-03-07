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
        <form action="" method="post">
            <div class="row">
                <div class="col-md-6">
                    <div class='ml-10 mt-5 mb-1'>
                        <label class="fs-3" for="pseudo">Nom :</label>
                    </div>
                    <div class="text-center">
                        <input class="form-control" type="text" name="pseudo" placeholder="Nom">
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
        </form>
    </div>
    <div class="text-center mt-5">
        <button class="button1" type="submit">S'inscrire</button>
        <span class="mx-3"></span>
    </div>
<?php include '../partial/footer.php'; ?>