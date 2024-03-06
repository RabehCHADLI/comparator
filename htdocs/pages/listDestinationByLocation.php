<?php
include '../config/autoload/autoload.php';
include '../config/connexion/connexion.php';
if (!empty($_POST['location'])) {
    $manager = new Manager($db);
    $destinations = $manager->getDestinationByLocation($_POST['location']);  
}else{
    header('Location: ../index.php');
}
if (!empty($destinations)) {
include '../partial/header.php';
    
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
        $imgs = $manager->getImgByIdDestination($key['id']);
        $destination = new Destination($key);
        $tourOperator = $manager->getOperatorByDestination($destination);
        ?>
        <div class="container bg-light rounded-2 p-2 ">
            <div class="row ">
                <div class="col-lg-3 col-sm-12 d-flex flex-row-reverse">
                        <img class="rounded-start-2" src="../images/<?=$imgs['img']?>" alt="" width="100%">
                </div>
                <div class="col-lg-9 col-sm-12">
                    <h4 class="ms-4 text-primary"><?=$key['location']?> :</h4>
                    <p><?=$key['description']?></p>
                    <div class="row">
                        <p class="col">Agence de voyage : <?=$tourOperator['name']?></p>

                        <p class="col">Note de l'agence</p>
                        
                    </div>

                    <form action="" method="post" class="d-flex flex-row-reverse">
                        <div class="bg-secondary rounded-circle text-center d-flex flex-column justify-content-center"style='width:55px;height:55px'>
                            
                        <button class="btn fs-4"><i class="fa-solid fa-plane fa-lg" style="color: #000000; "></i></button>
                    </div>
                    <p class="text-primary">Note: /5</p>
                    <input type="hidden" name="destinationId" value="<?=$key['id']?>">
                    </form>
                </div>
                
            </div>
            
        </div>
   <?php }
    
    ?>
    </div>

    
    <?php include '../partial/footer.php';
}else{
    header('Location: ../index.php');
}
    
    ?>