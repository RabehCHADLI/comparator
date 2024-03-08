<?php
include '../config/autoload/autoload.php';
include '../config/connexion/connexion.php';
include '../partial/header.php';

$manager = new Manager($db);
$destination = $manager->getDistinationId(3);
$images = $manager->getAllImgByIdDestination($destination['id']);
$review = $manager->getReviewByTourOperatorId(3);
$author = $manager->getAuthorAll();
$msg = $manager->getReviewAndAuthorByOperatorId(3);

var_dump($msg);


?>

<body style="background-color: #ABB3C2;">
  <?php include '../partial/navbar.php' ?>

  <div class="text-center">
    <h1 class="text-primary">
      <?= $destination['location'] ?>
    </h1>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div id="carouselExampleRide" class="carousel slide" data-bs-ride="true">
          <div class="carousel-inner">
            <?php foreach ($images as $key => $image) { ?>
              <div class="carousel-item">
                <img src="../images/<?= $image['img'] ?>" class="d-block w-100" alt="...">
              </div>
            <?php } ?>
            
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleRide"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleRide"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
      <div class="col-md-6 ">
        <div class="bg-light p-2">
          <?php foreach ($msg as $key => $value) { ?>
            <?php if (isset($value['name'])) { ?>
            <?php } ?>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
  <div class='mx-5 mt-5 mb-5'>
    <p class="bg-light p-2">
      <?= $destination['price']  ?> €

    </p>
  </div>
  <div class='mx-5 mt-5 mb-5'>
    <p class="bg-light p-2">
      <?= $destination['description'] ?>
    </p>
  </div>

  <?php include '../partial/footer.php'; ?>
</body>