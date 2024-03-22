<?php 
function searchArticle($bdd,$search){
    try{
        $req = $bdd->prepare("SELECT article.nom_article, article.description_article, article.prix_unit_article FROM article WHERE nom_article LIKE CONCAT('%', ?, '%') OR description_article LIKE CONCAT('%', ?, '%') ");  //Requete pour rechercher un article qui "ressemble" a ce que j'ai tapé dans ma barre de recherche
        $req->bindParam(1,$search,PDO::PARAM_STR);
        $req->bindParam(2,$search,PDO::PARAM_STR);
        $req->execute();
        $article = $req->fetchAll(PDO::FETCH_ASSOC);
        return $article;
    }
    catch(Exception $error){
        //En cas d'erreur, j'affiche le message d'erreur
        die($error->getMessage());
    }
}

