<?php
include '../config/autoload/autoload.php';
include '../config/connexion/connexion.php';
include '../partial/header.php';

$manager = new Manager($db);
$destination = $manager->getDistinationId(3);
$images = $manager->getAllImgByIdDestination($destination['id']);
$review = $manager->getReviewByTourOperatorId(3);
$author = $manager->getAuthorAll();
$msg = $manager->getReviewAndAuthorByOperatorId(1);
$objectDestination = new Destination($destination);
$operator = $manager->getOperatorByDestination($objectDestination);

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
    <div id="carouselExampleRide" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <?php foreach ($images as $key => $image) { ?>
                <div class="carousel-item <?php if($key === 0) echo 'active'; ?>">
                    <img src="../images/<?= $image['img'] ?>" class="d-block w-100" alt="...">
                </div>
            <?php } ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleRide" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleRide" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>

      <div class="col-md-6 ">
        <div class="bg-light p-2">
          <?php foreach ($msg as $key => $value) { ?>
            <?php if (isset($value['name'])) { ?>
              <p class="text-primary"><?= $value['name'] ?></p>
            <?php } ?>
            <?php if (isset($value['message'])) { ?>
              <p><?= $value['message'] ?></p>
            <?php } ?>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col"  >
        <div class='mx-1 mt-5 mb-5 d-flex'>
          <p class="p-2"style="background-color: rgba(255, 255, 255, 0)">
            <?= $destination['price'] ?>€
          </p>
        </div>
      </div>
      <div class="col">
        <div class='mx-1 mt-5 mb-5 d-flex'>
        <p class="p-2"style="background-color: rgba(255, 255, 255, 0)">
            <?= $operator['name'] ?>
          </p>
        </div>
      </div>
      <div class="col">
        <div class='mx-1 mt-5 mb-5 d-flex'>
        <a class="p-2"style="background-color: rgba(255, 255, 255, 0)">
            <?= $operator['link'] ?>
            </a>
        </div>
      </div>
    </div>
  </div>
  
  <div class='mx-5 mt-5 mb-5'>
    <p class="bg-light p-2">
      <?= $destination['description'] ?>
    </p>
  </div>

  <?php include '../partial/footer.php'; ?>
</body>