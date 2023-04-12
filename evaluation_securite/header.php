<?php session_start(); ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/header.css">
    <title>Header</title>
</head>

    <header>
        <a href="index.php" id="index"><img src="./assets/accueil.png" alt="logo_accueil.png"></a>
    <?php
    if (isset($_SESSION['connecte']) && $_SESSION['connecte'] == true){
        echo '<a href="deconnecte.php">Déconnexion</a>';
        echo '<a href="blog.php">Blog</a>';

    } else{
        echo '<a href="inscription.php">Inscription</a>';
        echo '<a href="connexion.php">Connexion</a>';
    }
    ?>
    </header>
