<?php include '../config/autoload/autoload.php'; ?>

<?php include '../config/connexion/connexion.php'; ?>

<?php include '../partial/header.php';
$manager = new Manager($db);
$operator = $manager->getAllOperator();
?>

<body style="background-color: #ABB3C2;">
    <?php include '../partial/navbar.php'; ?>
    <div class="container mt-5">
        <h1 class="text-primary">Agences disponibles :</h1>
        <div class=" d-flex flex-wrap">

            <?php foreach ($operator as $key => $value) {
                ?>
                
                <div class="card m-4" style="width: 24rem;">
                    <div class="card-body">
                        <h5 class="card-title"><?=$value->getName()?></h5>
                        <p class="card-text"><?=$value->getDescription()?></p>
                        <form action="./detailTour.php" method="post">
                            <input type="hidden" name="operatorId" value="<?=$value->getId()?>">
                            <button type="submit" class="btn btn-primary">VOIR LES REVIEWS</button>
                        </form>
                    </div>
                </div>
                <?php   }?>
            </div>

    </div>