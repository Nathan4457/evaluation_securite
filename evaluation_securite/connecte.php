<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="connecte.css">
    <title>Connecté</title>
</head>

<body>
    <?php
    require("header.php");
    if (isset($_POST['envoyer'])) {   
        $email = $_POST['email'];
        $mdp = $_POST['mdp'];
    
        require("configconnexion.php");
        $sql = $bdd->prepare("SELECT * FROM utilisateur WHERE email = ?");
        $sql->execute(array($email));
        $result = $sql->fetch();

        if ($result && password_verify($mdp, $result['mdp'])) {
            echo "Vous êtes connecté !";
        } else {
            echo "Email ou mot de passe incorrect";
        }
    }
    ?>

</body>

</html>