<?php
include '../config/autoload/autoload.php';
include '../config/connexion/connexion.php';
include '../partial/header.php';
$manager = new Manager($db);
$operator = $manager->getOperatorById($_POST['operatorId']);
$reviews = $manager->getReviewByTourOperatorId($_POST['operatorId']);
$destination = $manager->getAllDestinationByOperatorId($_POST['operatorId']);
$arrayObjectReviews = [];
foreach ($reviews as $key => $value) {
    $review = new Review($value);
    array_push($arrayObjectReviews,$review);
}
?>

<body class="bg-secondary">
    <?php include '../partial/navbar.php' ?>
    <div class="container">
        <h2 class="text-primary">Agence de voyage : <?= $operator->getName() ?></h2>
        <div class="row">
            <div class="col-lg-6">
        <div class="bg-light rounded-3 p-1">
            <h5>Description</h5>
            <p><?=$operator->getDescription()?></p>
        </div>
        <div>
            <h5 class="mt-3 mb-3">Voyage Proposer :</h5>
            <?php foreach ($destination as $key => $value) {
                $imgs = $manager->getImgByIdDestination($value->getId());
                 $tourOperator = $manager->getOperatorByDestination($value);
                ?>
                <div class="row bg-light m-2 rounded-3 p-2">
                    <div class="col-12 d-flex flex-row-reverse">
                        <img class="rounded-2" src="../images/<?= $imgs['img'] ?>" alt="" width="100%">
                    </div>
                    <div class="col-12">
                        <h4 class="ms-4 text-primary"><?= $value->getLocation() ?> :</h4>
                        <p class="mt-3"><?= $value->getDescription() ?></p>
                        <div class="row mt-4">
                            <p class="col">Agence de voyage : <a href=""><?= $tourOperator['name'] ?></a></p>

                        </div>

                        <form action="" method="post" class="d-flex flex-row-reverse ms-5">

                            <div class="bg-secondary rounded-circle text-center d-flex flex-column justify-content-center" style='width:55px;height:55px'>

                                <button class="btn fs-4"><i class="fa-solid fa-plane fa-lg" style="color: #000000; "></i></button>
                            </div>
                            <p class="text-primary">Note: /5</p>
                            <input type="hidden" name="destinationId" value="<?= $key['id'] ?>">
                        </form>
                    </div>

                </div>
        <?php    }?>
        </div>
            </div>
            <div class="col-lg-6">
            <h5>Avis : </h5>
            <?php foreach ($arrayObjectReviews as $key => $value) { ?>
                <div class="bg-light">
                <p><?=$review->getMessage()?></p>
                </div>
            <?php }?>
            </div>
        </div>

    </div>





















    <?php include '../partial/footer.php' ?>