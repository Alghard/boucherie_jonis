<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/style/admin.css">
    <title>Document</title>
</head>
<body>
    <div class="container-modify">
        <form action="modifier_article.php" method="post" class="modify-article">
            <legend>Modifier article</legend>
            <input type='hidden' name='articleID' value='<?php $articleID ?>'>
            <label for="name-article">Nom actuel : <?php echo $detailsArticle['nom_article'] ?></label><input type="text" name="name-article" id="" placeholder="Nouveau nom">
            <label for="description-article">Description actuelle : <?php echo $detailsArticle['description_article'] ?></label><input type="text" name="description-article" id="" placeholder="Nouvelle description">
            <label for="prix-unit">Prix unitaire actuel : <?php echo $detailsArticle['prix_unit_article'] ?> €</label><input type="text" name="prix-unit" id="" step="0.01" placeholder="Nouveau prix unitaire">
            <label for="prix-kg">Prix au kg actuel : <?php echo $detailsArticle['prix_kg_article'] ?> €</label><input type="text" name="prix-kg" step="0.01" placeholder="Nouveau Prix au kg">
            <label for="qty">Quantité actuelle : <?php echo $detailsArticle['quantite'] ?> gr</label><input type="text" name="qty" placeholder="Nouvelle quantité en gr">
            <input type="submit" name="modifyArticle" value="Modifier">
        </form>
    </div>
</body>
