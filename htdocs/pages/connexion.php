<?php include '../partial/header.php'; ?>

<body style="background-color: #ABB3C2;">
<?php include '../partial/navbar.php' ?>
        <div class="text-center ml-10 mt-5 mb-1">
            <h1 class="text-primary">Se Connecter</h1>
        </div>
    <div class="container d-flex justify-content-center">
        <form action="../process/process_connextion.php" method="post">
            <div >
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
            <div class="text-center mt-5">
                <button class="button1 ms-4 mb-3" type="submit">Se connecter</button>
                <span class="mx-3"></span>
                <a class='btn button2 border-2 border-primary' href="./inscription.php">S'inscrire</a>
            </div>
        </form>
    </div>
    <?php include '../partial/footer.php'; ?>