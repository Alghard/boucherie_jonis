<?php
include '../utils/utils.php';
include '../model/model_article.php';
session_start();

$article = new Article;
$article->setBdd(connect());
$bestArticles = $article->getBestSeller();

//Include des vues en fin de code
include "../view/header.php";
include '../view/view_index.php';
include '../view/footer.php';

