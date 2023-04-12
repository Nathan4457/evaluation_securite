<?php
require("header.php");

if (isset($_REQUEST['publier'])) {

    require("configconnexion.php");
    $titre = $_POST["titre"];
    $description = $_POST["description"];
    $image = $_FILES["photo"]["name"];
    $image_tmp = $_FILES["photo"]["tmp_name"];
                $sql = "INSERT INTO blog (titre, `description`, `photo`) VALUES (?, ?, ?)";
                $stmt = $bdd->prepare($sql);
                $stmt->execute([$titre, $description, $image]);
                header("Location: blog.php");
                exit();
            }
    


?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/formulaire.css">
    <title>Ajouter un article</title>
</head>

<body>
    <h1>Ajouter un article</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
        <div>
            <label for="titre">Titre :</label>
            <input type="text" id="titre" name="titre" required>
        </div>
        <div>
            <label for="description">Description :</label>
            <textarea type="text" id="description" name="description" required></textarea>
        </div>
        <div>
            <label for="image">Image :</label>
            <input type="file" id="image" name="photo" accept="image/*" required>
        </div>
        <input type="submit" name="publier" value="Ajouter">
    </form>
</body>

</html>