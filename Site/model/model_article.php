<?php 
function searchArticle($bdd,$search){
    try{
        $req = $bdd->prepare("SELECT article.nom_article, article.prix_unit_article, article.prix_kg_article, animal.nom_animal, images.url_image, animal.origine_animal, animal.race_animal, images.alt_image FROM article JOIN animal ON article.id_animal = animal.id_animal JOIN images ON article.id_article = images.id_article WHERE nom_article LIKE CONCAT('%', ?, '%') OR description_article LIKE CONCAT('%', ?, '%') ");  //Requete pour rechercher un article qui "ressemble" a ce que j'ai tapé dans ma barre de recherche
        $req->bindParam(1,$search,PDO::PARAM_STR);  //Ici je dis que mon premier ? correspond à ma variable $search càd ce que l'utilisateur à taper
        $req->bindParam(2,$search,PDO::PARAM_STR);
        $req->execute();                            //execution de la requete
        $article = $req->fetchAll(PDO::FETCH_ASSOC);//création d'une variable pour recuperer les résultats obtenus
        return $article;
    }
    catch(Exception $error){
        //En cas d'erreur, j'affiche le message d'erreur
        die($error->getMessage());
    }
}

function getAllArticles($bdd){
    try{
        $req = $bdd->prepare("SELECT article.id_article, article.nom_article FROM article");
        $req -> execute();
        $list = $req->fetchAll(PDO::FETCH_ASSOC);
        return $list;
    }
    catch(Exception $error){
        die($error->getMessage());
    }
}