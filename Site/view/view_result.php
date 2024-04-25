<div id="fil-ariane">
    <a href="index.php">Accueil/</a><a href="boutique.html"> Résultats</a>
</div>
<h3>Résultats de votre recherche : </h3>
<section>
    <div id="result">
            <?php foreach ($result as $item): ?>
                <div class='article'>
                    <div class='entete'>
                        <img src='<?php echo $item['url_image']?>'/>
                        <h3 class='nom-article'><?php echo $item['nom_article']?></h3>
                        <p class='viande'><?php echo $item['nom_animal']?> Origine <?php echo $item['pays_origine'] ?></p>
                    </div>
                    <div class='prix'>
                        <p class='prix-unit'><?php echo $item['prix_unit_article']?>€</p>
                        <span></span>
                        <p class='prix-kg'>Soit <?php echo $item["prix_kg_article"]?>€ / kg</p>
                    </div>
                    <div class='add-article'>
                        <form method='post'>
                            <input type='number' name='qty' value='1' id="qty">
                            <input type='submit' name='add' value='AJOUTER'>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
    </div>
</section>
