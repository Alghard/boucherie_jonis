<?php
include 'utils.php';
include './model/model_article.php';
include './model/model_animal.php';
include './model/model_origine.php';
include './model/model_race.php';
include './model/model_type.php';
include './model/model_taxe.php';
session_start();
$messageRace = '';
$messageOrigine = '';
$messageAnimal = '';
$messageType = '';
$liste_article = '';
$listAnimal = '';

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

//AFFICHAGE
$task = new Animal();
$task->setBdd(connect());
$dataTask = $task->getAnimals();
foreach($dataTask as $task){
    $listAnimal = $listAnimal."<li><h3>".$task['nom_animal']."</h3><p>Origine : ".$task['pays_origine']."</p><p>Race : ".$task['nom_race']."</p><p>Catégorie : ".$task['id_animal']."</p></li>";
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


include './vue/vue_admin.php';