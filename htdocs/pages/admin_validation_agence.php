<?php
include '../config/autoload/autoload.php';
include '../config/connexion/connexion.php';
if (!isset($_SESSION['pseudo'])) {
    header("Location: ../index.php");
    exit();
}


if ($_SESSION['pseudo'] !== 'Rabeh') {
    header("Location: access_denied.php");
    exit();
}
$manager = new Manager($db);
$tours = $manager->getAllAttenteOperator();

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
    <?php
    foreach ($tours as $tour) {
    ?>
        <div class=" container d-flex justify-content-center mb-5">

            <div class="card d-flex justify-content-center text-center" style="width: 100%;">
                <div class="card-body">
                    <h5 class="card-title">Nom de l'agence : <?= $tour['name'] ?></h5>
                    <p class="card-text"><?= $tour['description'] ?></p>
                    <form class="form">
                        <input type="hidden" id='name' name="name" value='<?= $tour['name'] ?>'>
                        <input type="hidden" id='description' name="description" value='<?= $tour['description'] ?>'>
                        <input type="hidden" id='link' name="link" value='<?= $tour['link'] ?>'>
                        <input type="hidden" id='userId' name="userId" value='<?= $tour['userId'] ?>'>
                        <button type="submit" class="btn btn-primary">Accepter</button>
                    </form>
                </div>
            </div>
        </div>
    <?php
    } ?>
    <?php include '../partial/footer.php'; ?>
    <script>
        let forms = document.querySelectorAll('.form')
        forms.forEach(form => {
            form.addEventListener('submit', async function(event) {
                event.preventDefault()

                // Accédez aux champs de formulaire à partir du contexte du formulaire soumis
                let name = form.querySelector('[name="name"]').value
                let description = form.querySelector('[name="description"]').value
                let link = form.querySelector('[name="link"]').value
                let userId = form.querySelector('[name="userId"]').value

                // Créez un nouvel objet FormData avec les valeurs du formulaire actuel
                let formData = new FormData()
                formData.append('name', name)
                formData.append('description', description)
                formData.append('link', link)
                formData.append('userId', userId)

                console.log(formData)
                // Envoyez les données via une requête POST
                fetch('../process/process_add_admintour.php', {
                    method: 'POST',
                    body: formData
                }).then(response => {
                    console.log("Réponse reçue :", response);
                }).catch(error => {
                    // Gérer les erreurs de la requête ici
                    console.error("Erreur lors de l'envoi de la requête :", error);
                });
            })
        })
    </script>