<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/formulaire.css">
    <title>Connexion</title>
</head>

<body>
    <form action="connexion.php" method="post">
        <?php
        require("header.php");
        ?>

        <div class="container1">
            <h1>Connexion</h1>
            <div class="container2">
                <label id="lab_email" for="email">Adresse mail</label>
                <input placeholder="Adresse mail" id="email" type="email" name="email" required>

                <div class="mdp">
                    <label id="lab_mdp" for="mdp">Mot de passe</label>
                    <input type="password" placeholder="Mot de passe" id="mdp" name="mdp" required>
                </div>
                <input type="submit" name="envoyer">
                <?php

                if (isset($_SESSION['nb_tentatives']) && $_SESSION['nb_tentatives'] >= 3) {
                    $duree_attente = 60;
                    $temps_ecoule = time() - $_SESSION['timestamp'];
                    if ($temps_ecoule < $duree_attente) {
                        $attente_restante = $duree_attente - $temps_ecoule;
                        echo "<p>Vous avez atteint le nombre maximum de tentatives. Veuillez réessayer dans " . $attente_restante . " secondes.</p>";
                        exit();
                    } else {
                        $_SESSION['nb_tentatives'] = 0;
                    }
                }

                if (isset($_POST['envoyer'])) {
                    require("configconnexion.php");
                    $email = $_POST['email'];
                    $mdp = $_POST['mdp'];
                    $derniereconnexion = date("Y-m-d");


                    $sql = $bdd->prepare("SELECT * FROM utilisateur WHERE email = ?");
                    $sql->execute(array($email));
                    $result = $sql->fetch();
                    if ($result && password_verify($mdp, $result['mdp'])) {
                        $_SESSION['connecte'] = true;
                        $sql = $bdd->prepare('UPDATE utilisateur SET derniere_connexion = ? WHERE email = ?');
                        $sql->execute(array($derniereconnexion, $email));
                        echo "<p>Vous êtes connecté !</p>";
                        echo "<p>Vous allez être redirigé vers la page d'accueil !</p>";
                        header("Refresh: 3; url=index.php");
                    } else {
                        $_SESSION['connecte'] = false;
                        if (!isset($_SESSION['nb_tentatives'])) {
                            $_SESSION['nb_tentatives'] = 1;
                        } else {
                            $_SESSION['nb_tentatives']++;
                        }
                        $_SESSION['timestamp'] = time();
                        echo "<p>Email ou mot de passe incorrect</p>";
                    }
                }
                ?>

            </div>
        </div>


    </form>
</body>

</html>