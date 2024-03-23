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
function displayResult($array){
    $result = "";
foreach($array as $article){
    $result = $result."<div class='article'><h3>".$article['nom_article']."</h3>
    <p>Description : ".$article['description_article']."</p>
    <p>Prix unitaire : ".$article['prix_unit_article']." €</p>
    </div>";
}
return $result;
}