<?php
include './config/autoload/autoload.php';
include './config/connexion/connexion.php';
$manager= new Manager($db);


include './partial/header.php'
?>

<body>
    <header id='bgheader'>
        <nav class="navbar navbar-expand-lg d-flex justify-content-around">

            <div class="container">

                <a href="./index.php" class=""><img src="./images/logo.png" alt="" style='width: 150px'></a>
                <button class="navbar-toggler collapseds ms-auto" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon "></span>
                </button>

                <div>
                    <div class="navbar-collapse collapse" id="navbarText">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a href="./pages/inscription.php" class="nav-link active text-primary"
                                    aria-current="page" href="#">S’INSCRIRE</a>
                            </li>
                            <li class="nav-item">
                                <a href="./pages/connexion.php" class="nav-link active text-primary" aria-current="page"
                                    href="#">SE CONNECTER</a>
                            </li>
                            <li class="nav-item">
                                <a href="./pages/review.php" class="nav-link active text-primary">REVIEW</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </nav>
        <div>
            <h1 class="text-center text-primary mt-5">LE GPS <br> DES BON PLANS</h1>
            <form action="./pages/listDestinationByLocation.php" method="post"
                class="d-flex justify-content-center mt-3">
                <input type="text" name='location' class="input mt-8" placeholder="Londres, Romes , Tunis">
                <button class="btn mt-8"><i class="fa-solid fa-plane fa-lg" style="color: #000000;"></i></button>
            </form>
        </div>
    </header>

    <div>
        <h1 class="ms-4 mt-5 mb-5 text-primary">Les Meilleurs destination :</h1>
    </div>

    <div class="container p-4 rounded-3 mt-5 mb-5" style="background: rgba(171, 179, 194, 0.20);">
        <div class="row d-flex justify-content-evenly">
        <div class="ml-10 col-md-5 m-2 rounded-3" style="border: 1px solid black; background: white;">
                <div class="content">
                    <h2>Titre 1</h2>
                    <img src="chemin/vers/image1.jpg" alt="Image 1">
                    <p>Description 1</p>
                    <button class="btn mt-8"><i class="fa-solid fa-plane fa-lg" style="color: #000000;"></i></button>
                </div>
            </div>
        </div>


    <?php include './partial/footer.php' ?>