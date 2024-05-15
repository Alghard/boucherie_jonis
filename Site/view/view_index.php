<div id="fil-ariane">
    <a href="controller.php">Accueil/</a>
</div>
<div class="caroussel">
    <button class="btn c1" id="prev">&#10096;</button>
    <button class="btn c1" id="next">&#10097;</button>
    <ul>
        <li class="slide 1">
            <a href="">
                <div class="text-caroussel">
                    <h3>Bg de titre promo</h3>
                    <p class="text-promo">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Earum, ratione!</p>
                    <p class="link-promo">Je découvre</p>
                </div>
                <img src="../public/img/img_1.jpg" alt="image carousel" width="1920" height="675">
            </a>
        </li>
        <li class="slide 1 active">
            <a href="">
                <div class="text-caroussel">
                    <h3>Promo titre de bg</h3>
                    <p class="text-promo">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Explicabo, blanditiis!</p>
                    <p class="link-promo">Je découvre</p>
                </div>
                <img src="../public/img/img_2.jpg" alt="image carousel" width="1920" height="675">
            </a>
        </li>
        <li class="slide 1">
            <a href="">
                <div class="text-caroussel">
                    <h3>Titre promo de bg</h3>
                    <p class="text-promo">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laboriosam, reprehenderit.</p>
                    <p class="link-promo">Je découvre</p>
                </div>
                <img src="../public/img/img_3.jpg" alt="image carousel" width="1920" height="675">
            </a>
        </li>
    </ul>
</div>
<div id="dots" style="text-align:center">
    <span class="dot-carou"></span> 
    <span class="dot-carou active"></span> 
    <span class="dot-carou"></span> 
</div>
<div id="gotoshopbtn">
    <a href="boutique.html">Accès boutique</a>
</div>
<!--
<div class="caroussel" id="second-carousel">
    <button class="btn c2" id="prev">&#10096;</button>
    <button class="btn c2" id="next">&#10097;</button>
    <ul>
        <li class="slide 2">
            <img src="img/IMG_20240411_144218.jpg" alt="image carousel">
        </li>
        <li class="slide 2 active">
            <img src="img/IMG_20240411_144215.jpg" alt="image carousel">
        </li>
        <li class="slide 2">
            <img src="img/IMG_20240411_144209.jpg" alt="image carousel">
        </li>
    </ul>
</div>
-->
<h2>Meilleures ventes</h2>
<div id="best-seller">
    <div id="result">
    <?php foreach ($bestArticles as $item): ?>
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
</div>
</div>
<div id="contain-arrowup">
    <div id="arrow-up">
        <a href="#">
            <img src="../public/icons/arrow_up.svg" alt="" />
        </a>
    </div>
</div>