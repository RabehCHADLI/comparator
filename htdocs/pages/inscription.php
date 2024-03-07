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
                                <a href="connexion.php" class="nav-link active text-primary" aria-current="page">SE
                                    CONNECTER</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link text-primary" href="#">REVIEW</a>
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
        <h1 class="text-primary">S'inscrire</h1>
    </div>
    <div class="container d-flex justify-content-center">
        <form action="../process/process_add_user_db.php" method="post"class='col-lg-4 col-sm-12 '>
            <div>
                <label for="pseudo">Pseudo :</label>
            </div>
            <div>
                <input class="form-control" type="text" name="pseudo" placeholder="pseudo">
            </div>
            <div class='ml-10 mt-5 mb-1'>
                <labelfor="pseudo">Mot de passe :</label>
            </div>
            <div class="text-center">
                <input class="form-control" type="password" name="password" placeholder="Mot de passe">
            </div>
            <div class="d-flex justify-content-center mt-2">
                <input type="checkbox" id="entreprise" name="entreprise" />
                <label class="text-white ms-2" for="entreprise">Compte Entreprise </label>
            </div>
            <div class="text-center mt-5">
                <button class="button1" type="submit">S'inscrire'</button>
            </div>
        </form>
    </div>
    <?php include '../partial/footer.php'; ?>