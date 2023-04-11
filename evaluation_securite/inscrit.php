<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="inscrit.css">
    <title>Inscrit</title>
</head>
<body>
    <h1>Merci !</h1>
    <h2>Votre inscription a bien été enregistrée</h2>

<?php
    if(isset($_REQUEST['envoyer'])){
        $dbname = "role_user";
        $dbuser = "root";
        $dbip = "localhost";
    
        $bdd = new PDO("mysql:host=".$dbip.";dbname=".$dbname.";charset=utf8",$dbuser); //$bdd=var de connexion (mysql=type de bdd, host=adresse de la bdd, $dbname=nom de la bdd, $dbuser=id pour se connecter à phpmyadmin)
        
        $nom = $_REQUEST['nom'];
        $prenom = $_REQUEST['prenom'];
        $mdp = $_REQUEST['mdp'];

        $sql = $bdd->prepare("INSERT INTO utilisateur (nom, prenom, mdp) VALUES (?,?,?)"); //prepare ta requête
        $sql->execute(array($nom,$prenom, $mdp));

        echo "Vos données ont bien été transmises";
    }