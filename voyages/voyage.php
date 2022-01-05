<?php
require_once "logique.php";
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://bootswatch.com/5/yeti/bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <title>Voyages Troubadour</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="/HB/voyages">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav me-auto d-flex flex-direction-column justify-content-center align-items-center" style="color:white">
                    <li class="nav-item">
                        <a class="nav-link active" href="/HB/voyages">Voyages Troubadour</a>
                    </li>
                    <li class="ms-3">
                        <?php if ($isLoggedIn) { ?>

                            Bonjour <?= $_SESSION['username'] ?>
                        <?php } ?>
                    </li>
                </ul>
                <?php if ($isLoggedIn == false) { ?>
                    <form class="d-flex" method="post">
                        <input class="form-control me-sm-2" type="text" placeholder="Username" name="username">
                        <input class="form-control me-sm-2" type="password" placeholder="Password" name="password">
                        <input type="submit" value="Valider">
                    </form>
                <?php } else { ?>
                    <form method="post">
                        <input type="submit" value="déconnexion" name="logout">
                    </form>
                <?php } ?>

            </div>
        </div>
    </nav>

    <div>
        <?php
        $voyage;

        if (isset($_GET['destination'])) {


            foreach ($voyages as $unVoyage) {

                if ($unVoyage['destination'] == $_GET['destination']) {
                    $voyage = $unVoyage;
                }
            }
        }
        ?>

        <div style="background-image:url('images/<?= $voyage['image'] ?>')" class='destination row m-5 py-5 flex-direction-column align-items-center justify-content-center'>
            <div class="text-trip py-3">
                <h1><?= $voyage['destination'] ?> </h1>
                <?php if ($isLoggedIn == true) { ?>
                    <h2 style="color:red"><?= $voyage['prix'] * 0.8 ?> € </h2> <?php } else { ?> <h2 style="color:red"><?= $voyage['prix'] ?> € </h2><?php } ?>
                <h3><?= $voyage['duree'] ?> Jours</h3>
                <h3>Pour <?= $voyage['personnes'] ?> voyageurs</h3>
                <h3>Transport : <?= $voyage['transport'] ?> </h3>
            </div>
        </div>

</body>

</html>