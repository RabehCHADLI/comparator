<?php
include '../config/autoload/autoload.php';
if (!isset($_SESSION['pseudo'])) {
    header("Location: ../index.php");
    exit();
}


if ($_SESSION['pseudo'] !== 'Rabeh') {
    header("Location: access_denied.php");
    exit();
}
include '../partial/header.php';
?>


<body class="bg-light">
    <header>
        <nav class="navbar bg-body-tertiary">
            <div class="container-fluid">
                <form class="d-flex" role="search">

                    <h3 class="mt-1 tittre">ADMIN</h3>
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-primary" type="submit">Search</button>

                </form>
            </div>
        </nav>
    </header>
    <?php include '../partial/footer.php'; ?>