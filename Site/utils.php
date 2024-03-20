<?php
//Nettoyage des données
//Création de ma fonction de nettoyage (à créer en dehors du if)
function sanitize($data){
    return htmlentities(strip_tags(stripslashes(trim($data))));
}