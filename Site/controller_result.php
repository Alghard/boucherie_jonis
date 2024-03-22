<?php
include 'utils.php';
include './model/model_article.php';
session_start();
if(isset($_POST['submit'])){
    if(isset($_POST["search"]) && !empty($_POST["search"])){
        $search = sanitize($_POST['search']);
        $bdd = connect();
        $article = searchArticle($bdd,$search);
    }     
}
function displayArticles($array){
    if($array != null){
        //boucle for each qui va parcourir le tableau articles
        foreach($array as $article){
            echo "<div class='article'><h3>".$article['nom_article']."</h3>
            <p>Description : ".$article['description_article']."</p>
            <p>Prix unitaire : ".$article['prix_unit_article']." €</p>
            </div>";
        }
    }else{
        echo "No results SRY";
    }
}

include "./vue/header.php";
include './vue/view_result.php';
include './vue/footer.php';
