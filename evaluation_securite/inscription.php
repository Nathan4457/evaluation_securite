<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/formulaire.css">
    <title>Formulaire inscription</title>
</head>

<body>
    <?php
    require("header.php");
    ?>

    <form action="inscription.php" method="post">
        <div class="container1">
            <h1>Formulaire d'inscription</h1>
            <div class="container2">
                <label id="lab_nom" for="nom">Nom</label>
                <input placeholder="Nom" id="nom" type="text" name="nom">

                <label id="lab_prenom" for="prenom">Prénom</label>
                <input placeholder="Prénom" id="prenom" type="text" name="prenom">

                <div class="email">
                    <label id="lab_email" for="email">Adresse mail</label>
                    <input type="email" placeholder="Adresse mail" id="email" name="email" required>
                </div>

                <div class="mdp">
                    <label id="lab_mdp" for="mdp">Mot de passe</label>
                    <input type="password" placeholder="Mot de passe" id="mdp" name="mdp" required>
                </div>
                <input type="submit" name="envoyer">

                <?php
                if (isset($_REQUEST['envoyer'])) {
                    $nom = $_REQUEST['nom'];
                    $prenom = $_REQUEST['prenom'];
                    $email = $_REQUEST['email'];
                    $mdp = $_REQUEST['mdp'];
                    $emdp = password_hash($mdp, PASSWORD_DEFAULT);
                    $datecreation = date("Y-m-d");

                    require("configconnexion.php");

                    $sql = $bdd->prepare("SELECT COUNT(*) FROM utilisateur WHERE email = ?");
                    $sql->execute(array($email));
                    $compteur = $sql->fetchColumn();

                    if ($compteur > 0) {
                        echo "<p>Cet e-mail existe déjà dans notre base de données.</p>";
                    } else {
                        $sql = $bdd->prepare("INSERT INTO utilisateur (nom, prenom, email, mdp, date_creation) VALUES (?,?,?,?,?)");
                        $sql->execute(array($nom, $prenom, $email, $emdp, $datecreation));
                        header("Refresh: 3; url=connexion.php");
                        echo "<p>Vous vous êtes enregistré avec succès !<br/>
                        Vous allez maintenant être redirigé vers la page de connexion</p>";
                    }
                }
                ?>

            </div>
        </div>
    </form>
</body>

</html>