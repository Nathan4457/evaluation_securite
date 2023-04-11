<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="inscription.css">
    <title>Connexion</title>
</head>
<body>
<form action="connecte.php" method="post">
<?php
include("header.php");
?>


    <div class="container1">
        <h1>Connexion</h1>
        <div class="container2">
            <label id="lab_email" for="email">Adresse mail</label>
            <input placeholder="Adresse mail" id="email" type="text" name="Email">

            <div class="mdp">
                <label id="lab_mdp" for="mdp">Mot de passe</label>
                    <input type="password" placeholder="Mot de passe" id="mdp" name="mdp">
            </div>
            <input type="submit" name="envoyer">
        </div>
    </div>

    <?php
        if(isset($_REQUEST['envoyer'])){
            $dbname = "role_user";
            $dbuser = "root";
            $dbip = "localhost";
    
            $bdd = new PDO("mysql:host=".$dbip.";dbname=".$dbname.";charset=utf8",$dbuser); //$bdd=var de connexion (mysql=type de bdd, host=adresse de la bdd, $dbname=nom de la bdd, $dbuser=id pour se connecter à phpmyadmin)
        
            $email = $_REQUEST['email'];
            $mdp = $_REQUEST['mdp'];
            $sql = $bdd->prepare("INSERT INTO utilisateur (email, mdp) VALUES (?,?)"); //prepare ta requête
            $sql->execute(array($email,$mdp));

        }
    ?>
</form>
</body>
</html>