<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Formulaire inscription</title>
</head>
<body>
<form action="inscrit.php" method="post">
    <div class="container1">
        <h1>Formulaire d'inscription</h1>
        <div class="container2">
            <label id="lab_nom" for="nom">Nom</label>
            <input placeholder="Nom" id="nom" type="text" name="nom">
            <p id="nom_vide"></p>

            <label id="lab_prenom" for="prenom">Prénom</label>
            <input placeholder="Prénom" id="prenom" type="text"name="prenom" >

            <div class="Age">
                <label id="lab_naissance" for="age">Age</label>
                    <input type="number" placeholder="Age" id="age" name="age">
            </div>
            
            <div class="mdp">
                <label id="lab_mdp" for="mdp">Mot de passe</label>
                    <input type="password" placeholder="Mot de passe" id="mdp" name="mdp">
            </div>


            <input type="submit" name="envoyer">
        </div>
    </div>
</form>
</body>
</html>