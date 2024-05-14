<?php
include '../config/autoload/autoload.php';
include '../config/connexion/connexion.php';
include '../partial/header.php';
if ($_GET['opId']) {
    $id = $_GET['opId'];
} elseif ($_POST['operatorId']) {
    $id = $_POST['operatorId'];
}
$manager = new Manager($db);
$operator = $manager->getOperatorById($id);
$reviews = $manager->getReviewAndAuthorByOperatorId($id);
$destination = $manager->getAllDestinationByOperatorId($id);
?>

<body>
    <?php include '../partial/navbar.php' ?>
    <div class="container">
        <h2 class="text-primary">Agence de voyage : <?= $operator->getName() ?></h2>
        <div class="row">
            <div class="col-lg-6">
                <div class="bg-light rounded-3 p-1 border border-1 border-primary p-3">
                    <h5>Description</h5>
                    <p><?= $operator->getDescription() ?></p>
                    <p>lien <a href="<?= $operator->getLink() ?>"><?= $operator->getName() ?></a></p>
                </div>
                <div>
                    <h5 class="mt-3 mb-3">Voyage Proposer :</h5>
                    <?php foreach ($destination as $key => $value) {
                        $imgs = $manager->getImgByIdDestination($value->getId());
                        $tourOperator = $manager->getOperatorByDestination($value);
                    ?>
                        <div class="row bg-light m-2 rounded-3 p-2 border border-1 border-primary p-3">
                            <div class="col-12 d-flex flex-row-reverse">
                                <img class="rounded-2" src="../images/<?= $imgs['img'] ?>" alt="" width="100%">
                            </div>
                            <div class="col-12">
                                <h4 class="mt-4 ms-4 text-primary"><?= $value->getLocation() ?> :</h4>
                                <p class="mt-3"><?= $value->getDescription2() ?></p>

                                <div class="row mt-4">
                                    <p class="col">Agence de voyage : <a href=""><?= $tourOperator['name'] ?></a></p>

                                </div>

                                <form action="./detailDestination.php" method="post" class="d-flex flex-row-reverse">

                                    <div class="bg-secondary rounded-circle text-center d-flex flex-column justify-content-center" style='width:55px;height:55px'>

                                        <button class="btn fs-4"><i class="fa-solid fa-plane fa-lg" style="color: #000000; "></i></button>
                                    </div>
                                    <p class="text-primary">Note: /5</p>

                                    <input type="hidden" name="destinationId" value=" <?= $value->getId() ?>">
                                </form>
                            </div>

                        </div>
                    <?php    } ?>
                </div>
            </div>
            <div class="col-lg-6 ">
                <h5>Avis : </h5>
                <div>
                    <?php foreach ($reviews as $key) {
                    ?>

                        <div class="bg-light border border-1 border-primary p-2 mb-2 rounded-1 col-10">
                            <h6><?= $key['name'] ?> :</h6>
                            <p><?= $key['message'] ?></p>
                        </div>
                    <?php } ?>
                    <form action="../process/process_add_review.php" method="post">
                        <?php
                        if (!empty($_SESSION['pseudo'])) { ?>
                            <input type="hidden" name="name" value="<?= $_SESSION['pseudo'] ?>">
                        <?php  } else { ?>
                            <div class="col-3 mb-3">
                                <label for="anthor">Pseudo :</label>
                                <input class="form-control text-center" type="text" name='name' placeholder="Pseudo">
                            </div>

                        <?php  } ?>
                        <div class="col-9">
                            <input type="hidden" name="TourOperatorId" value="<?= $id ?>">
                            <label for="message">Avis :</label>
                            <input class="form-control" type="text" name='message'>
                        </div>
                        <button class="btn btn-primary mt-3" type="submit">Envoyer</button>
                    </form>
                </div>
            </div>
        </div>

    </div>





















    <?php include '../partial/footer.php' ?>