<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/inscrit.css">
    <title>Inscrit</title>
</head>
<body>
    <?php
    require("header.php");
    ?>

    <h1>Merci !</h1>
    <h2>Votre inscription a bien été enregistrée</h2>

<?php
    if(isset($_REQUEST['envoyer'])){        
        $nom = $_REQUEST['nom'];
        $prenom = $_REQUEST['prenom'];
        $email = $_REQUEST['email'];
        $mdp = $_REQUEST['mdp'];
        $emdp = password_hash($mdp, PASSWORD_DEFAULT);

        require("configconnexion.php");

        $sql = $bdd->prepare("INSERT INTO utilisateur (nom, prenom, email, mdp) VALUES (?,?,?,?)"); //prepare ta requête
        $sql->execute(array($nom,$prenom,$email,$emdp));

        echo "Vos données ont bien été transmises";
    }
?>