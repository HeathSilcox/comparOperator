<?php
session_start();
if (empty($_SESSION['user'])) header('Location: index.php');

require('../partials/classes/Manager.php');
require('../partials/classes/Destination.php');
require('../partials/cfg/db.php');
require('../partials/debug/pprint.php');




$manager = new Manager($db);

$data = $manager->getAllOperators();

$dest = $manager->getAllDestinations();

?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../assets/vendor/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <title>Document</title>

</head>

<body>
    <?php require('../partials/navbar.php'); ?>

    <div class="sidenav">
        <a href="/">Site comparOperator</a><br>
        <a href="/admin/create.php">Ajouter un T.O</a><br>
        <a href="/admin/assign.php">Assigner un T.O / destination</a>
    </div>
    <div class="container">
        <form action="../processings/process-assign-to.php" method="post">

            <div class="row d-flex justify-content-center">
                <div class="col-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <select id="toSelect" name="toSelect">
                            <?php
                            foreach ($data as $d) {
                                echo
                                    "<option value=\"{$d['id']}\">
                                    {$d['name']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-12 col-sm-12 col-md-6">
                    <div class="form-group">

                        <select id="destinationSelect" name="destinationSelect">
                            <option value="maroc">Maroc</option>
                            <option value="bresil">Bresil</option>
                            <option value="ilemaurice">Ile Maurice</option>
                            <option value="portugal">Portugal</option>
                            <option value="japon">Japon</option>
                            <option value="usa">USA</option>
                            <option value="france">France</option>
                            <option value="mexique">Mexique</option>
                            <option value="espagne">Espagne</option>

                        </select>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-12 col-sm-12 col-md-3">
                    <div class="form-group">
                        <input min="0" class="form-control shadow" name="prix" type="number" placeholder="Entrer le prix" required>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-sm-12 col-md-2">
                    <button name="submit" class="btn btn-outline-orange" type="submit">Assigner votre destination</button>
                </div>
            </div>
        </form>
    </div>

    <script src="../assets/vendor/jquery/dist/jquery.min.js"></script>
    <script src="../assets/vendor/popper.js/dist/popper.min.js"></script>
    <script src="../assets/js/script.js"></script>
</body>

</html>
