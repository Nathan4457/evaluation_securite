<?php

require("header.php");
require("configconnexion.php");

$sql = "SELECT * FROM blog";
$stmt = $bdd->query($sql);
$articles = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/formulaire.css">
    <title>Blog</title>
</head>
<body>
    <h1>Blog</h1>
    <a href="ajoutblog.php">Ajouter un article</a>
    <?php foreach ($articles as $article): ?>
        <div>
            <h2><?php echo $article['titre']; ?></h2>
            <p><?php echo $article['description']; ?></p>
            <img src="./assets/<?php echo $article['photo']; ?>" alt="Image de l'article">
        </div>
    <?php endforeach; ?>
</body>
</html>
