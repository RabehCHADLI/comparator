<?php
include '../config/autoload/autoload.php';
include '../config/connexion/connexion.php';
include '../partial/header.php';
$manager = new Manager($db);
$destination = $manager->getDistinationId($_POST['destinationId']);
$images = $manager->getAllImgByIdDestination($_POST['destinationId']);
$objectDestination = new Destination(($destination));
$operator = $manager->getOperatorByDestination($objectDestination);
$reviews = $manager->getReviewAndAuthorByOperatorId($operator['id']);
$author = $manager->getAuthorAll();
$msg = $manager->getReviewAndAuthorByOperatorId($_POST['destinationId']);



?>

<body>
  <?php include '../partial/navbar.php' ?>

  <div class="text-center">
    <h1 class="text-primary mb-6">
      <?= $destination['location'] ?>
    </h1>
  </div>
  <div class="container border border-1 border-primary p-4 rounded-3 mb-3">
    <div class="row">
      <div class="col-md-6 ">
        <div id="carouselExampleRide" class="carousel slide " data-bs-ride="true">
          <div class="carousel-inner">
            <?php foreach ($images as $key => $image) { ?>
              <div class="carousel-item <?php if ($key === 0) echo 'active'; ?>">
                <img src="../images/<?= $image['img'] ?>" class="d-block w-100 rounded-3 image" alt="...">
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
      <div class="col-md-6">
        <h5>Avis : </h5>
        <div>
          <?php foreach ($reviews as $key) {
            if ($key['tour_operator_id'] === $destination['tourOperatorId']) { ?>

              <div class="p-2 mb-2 rounded-3 col-10 bg-light border border-1 border-primary">
                <h6><?= $key['name'] ?> :</h6>
                <p><?= $key['message'] ?></p>
              </div>
          <?php }
          } ?>
          <form action="../process/process_add_review.php" method="post">
            <?php

            if (!empty($_SESSION['pseudo'])) { ?>
              <input type="hidden" name="name" value="<?php echo $_SESSION['pseudo']; ?>">
            <?php  } else { ?>
              <div class="col-3 mb-3">
                <label for="anthor">Pseudo :</label>
                <input class="form-control text-center" type="text" name='name' placeholder="Pseudo">
              </div>

            <?php  } ?>
            <div class="col-9">
              <input type="hidden" name="TourOperatorId" value="<?= $operator['id'] ?>">
              <label for="message">Donner un avis :</label>
              <input class="form-control" type="text" name='message'>
            </div>
            <button class="btn btn-primary mt-3" type="submit">Envoyer</button>
          </form>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col">
          <p class="bg-light border border-1 border-primary p-3 rounded-3 image mt-3">Le voyage à <?= $destination['price'] ?>€ proposé par <?= $operator['name'] ?> semble être une excellente opportunité pour une escapade relaxante.
          </p>
          <button href="<?= $operator['link'] ?>" class="btn btn-primary">
            <?= $operator['name'] ?>
          </button>
        </div>
        <div class="col">
          <div class='mx-1 mt-5 mb-5 d-flex'>

          </div>
        </div>
      </div>
    </div>
    <div class='mx-5 mt-5 mb-5 border border-1 border-primary p-4 rounded-3 image'>
      <h4>Description :</h4>
      <p class="bg-light p-2 rounded-3">
        <?= $destination['description'] ?>
      </p>
    </div>

    <?php include '../partial/footer.php'; ?>
</body>