<?php 

include '../model/model_article.php';
include '../utils/utils.php';
session_start();

if (isset($_GET['id'])) {
    $articleID = intval($_GET['id']);
    $article = new Article();
    $article->setBdd(connect());
    $detailsArticle = $article->getArticleById($articleID);
}

if(isset($_POST["modifyArticle"]) && isset($_POST['articleID'])){
    $articleID = intval($_POST['articleID']);
    if(isset($_POST["name-article"]) && isset($_POST['description-article']) && isset($_POST['prix-unit']) && isset($_POST['prix-kg']) && isset($_POST['qty'])){
        $name = sanitize($_POST['name-article']);
        $desc = sanitize($_POST['description-article']);
        $punit = floatval(sanitize($_POST['prix-unit']));
        $pkg = floatval(sanitize($_POST['prix-kg']));
        $qty = floatval(sanitize($_POST['qty']));
        $new_article = new Article();
        if(filter_var($punit,FILTER_VALIDATE_FLOAT) && filter_var($pkg,FILTER_VALIDATE_FLOAT) && filter_var($qty,FILTER_VALIDATE_FLOAT)){
            $new_article->setBdd(connect())->setNom_article($name)->setDescription($desc)->setPrixUnit($punit)->setPrixKg($pkg)->setQuantite($qty);
            $messageModifierArt = $new_article->updateArticle($articleID);
            header("Location: admin.php");
            exit;
        }else{
            $messageModifierArt = "Les données ne sont pas au bon format !";
        }
    }else{
        $messageModifierArt = "Veuillez remplir le formulaire correctement";
    }
}



include '../view/view_modify_article.php';