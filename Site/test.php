<?php 
foreach($array as $article){
            echo "<div class='article'><h3>".$article['nom_article']."</h3>
            <p>Description : ".$article['description_article']."</p>
            <p>Prix unitaire : ".$article['prix_unit_article']." €</p>
            </div>";
        }