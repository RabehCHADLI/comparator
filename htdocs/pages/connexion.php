<?php include '../partial/header.php'; ?>

<body style="background-color: #ABB3C2;">
    <nav class="navbar navbar-expand-lg d-flex justify-content-around">
        <div class="container">
            <div>
                <a href="../index.php"><img src="../images/logo.png" alt="" style='width: 400px'></a>
                <button class="navbar-toggler collapsed ms-12 border-primary" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div>
                <div class="navbar-collapse collapse" id="navbarText">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active text-primary" aria-current="page" href="#">S’INSCRIRE</a>
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
            <h1 class="text-primary">Se Connecter</h1>
        </div>
    <div class="container">
        <form action="" method="post">
            <div class="text-center margin-bottom">
                <input class="input1" type="text" name="pseudo" placeholder="pseudo">
            </div>
            <div class="text-center">
                <input class="input1" type="text" name="Mot de passe" placeholder="Mot de passe">
            </div>
            <div class="text-center margin-top">
                <button class="button1" type="submit">Se connecter</button>
                <button class="button2" type="reset">Réinitialiser</button>
            </div>
        </form>
    </div>





    <?php include '../partial/footer.php'; ?>