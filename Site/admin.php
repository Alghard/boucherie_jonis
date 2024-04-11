<?php
include 'utils.php';
include './model/model_article.php';
session_start();
$liste_article = '';

$data = getAllArticles(connect());

foreach($data as $nom){
    $liste_article = $liste_article."<li>".$nom['id_article'].' : '.$nom['nom_article']."</li>";
}


include './vue/vue_admin.php';