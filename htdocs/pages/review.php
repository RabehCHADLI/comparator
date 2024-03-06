<?php include '../partial/header.php'; ?>

<body style="background-color: #ABB3C2;">
    <nav class="navbar navbar-expand-lg d-flex justify-content-between">
        <div class="container">
            <div>
                <a href="../index.php"><img src="../images/logo.png" alt="" style='width: 250px'></a>
                <button class="navbar-toggler collapsed ms-12 border-primary" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div>
                <div class="navbar-collapse collapse" id="navbarText">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a href="connexion.php" class="nav-link active text-primary" aria-current="page">SE CONNECTER</a>
                    </li>
                    <li class="nav-item">
                        <a href="./inscription.php" class="nav-link active text-primary" aria-current="page">S'INSCRIRE</a>
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
    <div class="text-center mb-5">
        <h1 class="text-primary">$Tour Operator</h1>
    </div>

    <div class="row row align-items-center">
        <div class="col-md-6 ">
            <h2 class="text-primary text-center mb-4">Présentation</h2>
            <div class="col-10 ms-6">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam auctor, nunc id tincidunt eleifend, nisl nunc consectetur nunc, id lacinia nunc nunc id nunc. Sed euismod, nunc id tincidunt eleifend, nisl nunc consectetur nunc, id lacinia nunc nunc id nunc.</p>
            </div>
        </div>
        <div class="col-6">
            <h2 class="text-primary text-center mb-4">Avis</h2>
            <div class="col-10 ms-6">
            <?php foreach ($patients as $patient) {?>
                <tr>
                    <th><?= $patient['id'] ?></th>
                    <th><?= $patient['pseudo'] ?></th>
                    <th><?= $patient['message'] ?></th>
            </div>
        </div>
    </div>
</div>
