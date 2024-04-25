<?php
//Nettoyage des données
//Création de ma fonction de nettoyage (à créer en dehors du if)
function sanitize($data){
    return htmlentities(strip_tags(stripslashes(trim($data))));
}

//Connexion a la db
function connect(){
        return new PDO('mysql:host=localhost;dbname=jonis','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}

//Fonction d'affichage de résultats
// function displayResult($array){
//     $result = "";
// foreach($array as $article){
//     $result = $result."<div class='article'>
//     <img src='".$article['img_article']."'/>
//     <h3>".$article['nom_article']."</h3>
//     <p class='viande'>".$article['nom_animal']." Origine France</p>
//     <p class='prix'>".$article['prix_unit_article']."€</p><span></span><p class='prix-kg'>Soit ".$article["prix_kg"]."€/kg</p>
//     <form method='post'>
//     <input type='number' name='qty' value='1'>
//     <input type='submit' name='add' value='Ajouter'>
//     </form>
//     </div>";
// }
// return $result;
// }