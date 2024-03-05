<?php
include '../config/autoload/autoload.php';
include '../config/connexion/connexion.php';
if (!empty($_POST['location'])) {
    $manager = new Manager($db);
    $destinations = $manager->getDestinationByLocation($_POST['location']);
    
}else{
    header('Location: ../index.php');
}
include '../partial/header.php'
?>

<body class="bg-secondary">
    <header>
    <nav class="navbar navbar-expand-lg d-flex justify-content-around">
            

            <div class="container">
                <div>

                    <a href="#"><img src="../images/logo.png" alt=""style='width: 200px'></a>
                    <button class="navbar-toggler collapsed ms-12" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                <div>

                    <div class="navbar-collapse collapse" id="navbarText" >
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active text-primary" aria-current="page" href="#">Home</a>
                            </li>
                        <li class="nav-item">
                            <a class="nav-link text-primary" href="#">Features</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-primary" href="#">Pricing</a>
                        </li>
                    </ul>
                </div>
                </div>
            </div>
            
    </nav>
    </header>
    <div class="container mt-5">
        <h3 class="text-primary">Les offres pour <?= $destinations[0]['location'] ?> :</h3>
    <?php 
    foreach ($destinations as $key) { 
        $imgs = $manager->getImgByIdDestination($key['id'])
        
        ?>
        <div class="container bg-light rounded-2">
            <div class="row">
                <img src="../images/<?=$imgs[0]['img']?>.png" alt="">
                <h3><?=$key['location']?></h3>

            </div>
            
        </div>
   <?php }
    
    ?>
    </div>

    
<?php include '../partial/footer.php' ?>