<?php
include '../utils/utils.php';
include '../model/model_article.php';
session_start();
//ETAPE 1 : vérifie que je reçois le formulaire d'enregistrement
if(isset($_POST['submit'])){
    //ETAPE 2 : Vérifier que les champs ne sont pas vide
    if(isset($_POST["search"]) && !empty($_POST["search"])){
        //ETAPE 3 : nettoyage des données
        $search = sanitize($_POST['search']);
        //ETAPE 4 : Je crée l'objet Article pour faire intervenir le model
        $articles = new Article();
        //ETAPE 5 : J'appelle la méthode pour se connecter en BDD
        //Puis j'appelle la méthode de recherche d'article
        $result = $articles->setBdd(connect())->searchArticle($search);
    }     
}
else if (isset($_GET['id'])) {
        $articleID = $_GET['id'];
        $article = new Article();
        $article->setBdd(connect());
        if($article != null){
            $result = $article->getArticlesByCategory($articleID);
        }else{
            $result = "No results SRY";
        }
    }

include "../view/header.php";
include '../view/view_result.php';
include '../view/footer.php';