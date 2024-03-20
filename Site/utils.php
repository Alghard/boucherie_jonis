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