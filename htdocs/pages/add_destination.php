<?php include '../partial/header.php'; ?>

<body style="background-color: #ABB3C2;">
    <nav class="navbar navbar-expand-lg d-flex justify-content-around">

        <div class="container">
            <a href="../index.php" class=""><img src="../images/logo.png" alt="" style='width: 250px'></a>
            <button class="navbar-toggler collapseds ms-auto" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon "></span>
            </button>
            <div>
                <div>
                    <div class="navbar-collapse collapse" id="navbarText">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a href="connexion.php" class="nav-link active text-primary" aria-current="page">SECONNECTER</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link text-primary" href="./review.php">REVIEW</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-primary" href="#">COMPARER</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
    </nav>
        <div class="text-center">
        <h1 class="text-primary">Nouvelle Déstinantion</h1>
    </div>
    <div class="container d-flex justify-content-center">
        <form action="" method="post">
            <div class="row">
                <div class="col-md-6">
                    <div class='ml-10 mt-5 mb-1'>
                        <label class="fs-3" for="location">Ville :</label>
                    </div>
                    <div class="text-center">
                        <input class="form-control" type="text" name="location" placeholder="Ville">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class='ml-10 mt-5 mb-1'>
                        <label class="fs-3" for="price">Prix TTC :</label>
                    </div>
                    <div class="text-center">
                        <input class="form-control" type="text" name="price" placeholder="Prix TTC :">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class='ml-10 mt-5 mb-1'>
                        <label class="fs-3" for="img">Les photos :</label>
                    </div>
                    <div class="text-center">
                        <input class="form-control" type="text" name="img" placeholder="jpg">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class='ml-10 mt-5 mb-1'>
                        <label class="fs-3" for="description">Déscriptif :</label>
                    </div>
                    <div class="form-floating text-center">
                <textarea class="form-control"placeholder="Déscriptif" id="floatingTextarea"></textarea>
            </div>
                </div>
            </div>
        </form>
    </div>
    <div class="text-center mt-5">
        <button class="button1" type="submit">Créer</button>
    </div>
<?php include '../partial/footer.php'; ?>