<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    if(isset($_POST['envoyer'])) {
    $dbname = "role_user";
    $dbuser = "root";
    $dbip = "localhost";

    $bdd = new PDO("mysql:host=".$dbip.";dbname=".$dbname.";charset=utf8",$dbuser);

    $email = $_POST['email'];
    $mdp = $_POST['mdp'];

    $sql = $bdd->prepare("SELECT * FROM utilisateur WHERE email = ?");
    $sql->execute(array($email));
    $result = $sql->fetch();

    if($result && password_verify($mdp, $result['mdp'])) {
        echo "Vous êtes connecté !";
    } else {
        echo "Email ou mot de passe incorrect";
    }
    }
?>

</body>
</html>