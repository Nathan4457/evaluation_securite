<?php

require("header.php");

if (!isset($_SESSION['connecte']) && $_SESSION['connecte'] == false) {
    header("location:index.php");
}
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
