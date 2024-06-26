<?php

include '../utils/utils.php';
include '../model/model_animal.php';
include '../model/model_article.php';
include '../model/model_origine.php';
include '../model/model_poids.php';
include '../model/model_taxe.php';
include '../model/model_race.php';
include '../model/model_type.php';

session_start();
$messageRace = '';
$messageOrigine = '';
$messageAnimal = '';
$messageType = '';
$messageArticle = '';
$liste_article = '';
$listAnimal = '';
$checkbox_options =[];
$poids = new Poids();
$checkbox_options = $poids->setBdd(connect())->getPoids();
$taxe = new Taxe();
$tva = $taxe->setBdd(connect())->getTauxTaxe();
$msgArticleModif = '';
// Vérifier s'il y a un message de succès à afficher

//Ajout d'une race
if(isset($_POST['submitRace'])){
    if(isset($_POST["add-race"]) && !empty($_POST['add-race'])){
        $name = sanitize($_POST["add-race"]);
        $newRace = new Race();
        $newRace->setNom_race($name)->setBdd(connect());
        $data = $newRace->getRaceByName();
        if(empty($data)){
            $messageRace = $newRace->addRace();
        }else{
            $messageRace = "Cette race existe déjà.";
        }
    }else{
        $messageRace = "Veuillez remplir correctement le formulaire.";
    }
}

//Ajout d'un pays d'origine
if(isset($_POST['submitOrigine'])){
    if(isset($_POST["add-origine"]) && !empty($_POST['add-origine'])){
        $name = sanitize($_POST["add-origine"]);
        $newOrigine = new Origine();
        $newOrigine->setPays_origine($name)->setBdd(connect());
        $data = $newOrigine->getOrigineByCountry();
        if(empty($data)){
            $messageOrigine = $newOrigine->addOrigine();
        }else{
            $messageOrigine = "Cet pays existe déjà.";
        }
    }else{
        $messageOrigine = "Veuillez remplir correctement le formulaire.";
    }
}

//Ajout d'un type d'article
if(isset($_POST['submitType'])){
    if(isset($_POST["add-type"]) && !empty($_POST['add-type'])){
        $name = sanitize($_POST["add-type"]);
        $newType = new Type();
        $newType->setNom_type($name)->setBdd(connect());
        $data = $newType->getTypeByName();
        if(empty($data)){
            $messageType = $newType->addType();
        }else{
            $messageType = "Ce type d'article existe déjà.";
        }
    }else{
        $messageType = "Veuillez remplir correctement le formulaire.";
    }
}

//Ajout d'un animal

if(isset($_POST["submitAnimal"])){
    if(isset($_POST["add-animal"]) && !empty($_POST['add-animal']) && isset($_POST['sel-origine']) && !empty($_POST['sel-origine']) && isset($_POST['sel-race'])){
        $name = sanitize($_POST['add-animal']);
        $origine = $_POST['sel-origine'];
        $race = $_POST['sel-race'];
        $newAnimal = new Animal();
        $newAnimal->setNom_animal($name)->setId_origine($origine)->setId_race($race)->setBdd(connect());
        $data = $newAnimal->getAnimalByIds();
        if(empty($data)){
            $messageAnimal = $newAnimal->addAnimal();
        }else{
            $messageAnimal = 'Cet animal existe déjà';
        }
    }else{
        $messageAnimal = 'Veuillez remplir correctement le formulaire';
    }
}

//Ajout article

if(isset($_POST["submitArticle"])){
    if(isset($_POST["name-article"]) && isset($_POST['description-article']) && isset($_POST['prix-unit']) && isset($_POST['prix-kg']) && isset($_POST['animal']) && isset($_POST['type']) && isset($_POST['qty'])){
        $name = sanitize($_POST['name-article']);
        $desc = sanitize($_POST['description-article']);
        $punit = floatval(sanitize($_POST['prix-unit']));
        $pkg = floatval(sanitize($_POST['prix-kg']));
        $idAnimal = sanitize($_POST['animal']);
        $idType = sanitize($_POST['type']);
        $qty = floatval(sanitize($_POST['qty']));
        $animal = new Animal();
        $animal->setBdd(connect())->setId($idAnimal);
        $type = new Type();
        $type->setBdd(connect())->setId($idType);
        $new_article = new Article();
        if(filter_var($punit,FILTER_VALIDATE_FLOAT) && filter_var($pkg,FILTER_VALIDATE_FLOAT) && filter_var($idAnimal,FILTER_VALIDATE_INT) && filter_var($qty,FILTER_VALIDATE_FLOAT)){
            $new_article->setBdd(connect())->setNom_article($name)->setDescription($desc)->setPrixUnit($punit)->setPrixKg($pkg)->setAnimal($animal)->setType($type)->setQuantite($qty);
            $messageArticle = $new_article->addArticle();
        }else{
            $messageArticle = "Les données ne sont pas au bon format !";
        }
    }else{
        $messageArticle = "Veuillez remplir le formulaire correctement";
    }
}

//Ajout poids test

//AFFICHAGE
$task = new Animal();
$task->setBdd(connect());
$dataTask = $task->getAnimals();
foreach($dataTask as $task){
    $listAnimal = $listAnimal."<li><h3>".$task['nom_animal']."</h3><p>Origine : ".$task['pays_origine']."</p><p>Race : ".$task['nom_race']."</p><p>Catégorie : ".$task['id_animal']."</p></li>";
}


$try = new Article();
$try->setBdd(connect());
$dataArticles = $try->getAllArticles();
foreach($dataArticles as $article){
    $liste_article = $liste_article."<li><h3>".$article['id_article']." : ".$article['nom_article']."</h3><a href='modifier_article.php?id={$article['id_article']}' class='btn-modify'>Modifier</a><form action='admin.php' method='post' style='display:inline;'><input type='hidden' name='id' value='{$article['id_article']}'><button type='submit' name='deletebtn' class='btn-delete'>SUPPRIMER</button></form></li>";
}
if(isset($_POST["deletebtn"])){
    $id = $_POST["id"];
    $objet = new Article;
    $objet->setBdd(connect());
    $objet->deleteArticle($id);
}

//Recup et  affichage des types d'article
$optionType = '';
$typeArticle = new Type();
$typeArticle->setBdd(connect());
$dataType = $typeArticle->getTypes();
foreach ($dataType as $type){
    $optionType = $optionType."<option value='".$type['id_type']."'>".$type['nom_type']."</option>";
}
//Récupération et affichage des origines et races dans mes select
$optionOri = '';
$origine = new Origine();
$origine->setBdd(connect());
$dataOrigine = $origine->getOrigine();
foreach ($dataOrigine as $origine){
    $optionOri = $optionOri."<option value='".$origine['id_origine']."'>".$origine['pays_origine']."</option>";
}

$optionRace='';
$races = new Race();
$races->setBdd(connect());
$data = $races->getRaces();
foreach ($data as $race){
    $optionRace = $optionRace."<option value='".$race['id_race']."'>".$race['nom_race']."</option>";
}

$optionAnimal ='';
$animals = new Animal();
$animals->setBdd(connect());
$dataAnimals = $animals->getAnimals();
foreach ($dataAnimals as $animal){
    $optionAnimal = $optionAnimal."<option value='".$animal['id_animal']."'>".$animal['nom_animal']." - Origine : ". $animal["pays_origine"]." - Race : ".$animal['nom_race']."</option>";
}


//Fenetre modifier






include '../view/vue_admin.php';