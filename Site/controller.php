<?php
include 'utils.php';
include './model/model_article.php';
session_start();


// if(isset($_POST['submit'])){
//     if(isset($_POST["search"]) && !empty($_POST["search"])){
//         $search = sanitize($_POST['search']);
//         $bdd = connect();
//         $article = searchArticle($bdd,$search);
//         $_SESSION['article'] = $article; 
//     }        
// }

// header('Location: controller_result.php'); 
include "./vue/header.php";
include './vue/view_index.php';
include './vue/footer.php';

