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
$result = "";
if($article != null){
    $result = displayResult($article);
}else{
    $result = "No results SRY";
}

include "./vue/header.php";
include './vue/view_result.php';
include './vue/footer.php';
