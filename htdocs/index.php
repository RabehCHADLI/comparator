<?php 
include './config/autoload/autoload.php';
include './config/connexion/connexion.php';
?>
<?php include './partial/header.php' ?>
<body>
<header id='bgheader'>
        <nav class="navbar navbar-expand-lg d-flex justify-content-around">
            

                <div class="container">
                    <div>

                        <a href="#"><img src="./images/logo.png" alt=""style='width: 150px'></a>
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
        <div>
            <h1 class="text-center text-primary mt-5">LE GPS <br> DES BON PLANS</h1>
            <form action="./pages/listDestinationByLocation.php" method="post" class="d-flex justify-content-center mt-7">
                <input type="text"name='location'class="input mt-8" placeholder="Londres, Romes , Tunis">
                 <button class="btn mt-8"><i class="fa-solid fa-plane fa-lg" style="color: #000000;"></i></button>
            </form>
        </div>
        
    </header>
    <h2 class="mt-3 text-primary">Les Meilleurs destination :</h2>
    <div class="container">
        <div class="row bg-secondary">
            <div class="col-sm-12">
            </div>
            <div class="col-sm-12">

            </div>
        </div>
    </div>

<?php include './partial/footer.php' ?>

