<?php

class Animal{
    private ?int $id;
    private ?string $nom_animal;
    private ?int $id_origine;
    private ?int $id_race;

    private ?PDO $bdd;

//GETTER SETTER

    public function getId(): ?int { return $this->id; }
    public function setId(?int $id): Animal { $this->id = $id; return $this;}

    public function getNom_animal(): ?string { return $this->nom_animal; }
    public function setNom_animal(?string $nom_animal): Animal { $this->nom_animal = $nom_animal; return $this;}

    public function getId_origine(): ?int { return $this->id_origine; }
    public function setId_origine(?int $id_origine): Animal { $this->id_origine = $id_origine; return $this;}

    public function getId_race(): ?int { return $this->id_race; }
    public function setId_race(?int $id_race): Animal { $this->id_race = $id_race; return $this;}

    public function getBdd(): ?PDO { return $this->bdd; }
    public function setBdd(?PDO $bdd): Animal { $this->bdd = $bdd; return $this;}


    //Method
    public function getAnimals():array|string{
        try{
            $req = $this->getBdd()->prepare("SELECT animal.id_animal, animal.nom_animal, race.nom_race, origine.pays_origine FROM animal JOIN race ON animal.id_race = race.id_race JOIN origine ON animal.id_origine = origine.id_origine");
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }catch(Exception $error){
            return $error->getMessage();
        }
    }

    public function getAnimalByIds():array|string{
        try{
            $req = $this->getBdd()->prepare("SELECT animal.id_animal, animal.nom_animal, race.nom_race, origine.pays_origine FROM animal JOIN race ON animal.id_race = race.id_race JOIN origine ON animal.id_origine = origine.id_origine WHERE animal.nom_animal = ? AND animal.id_origine = ? AND animal.id_race = ?");
            $name = $this->getNom_animal();
            $id_origine = $this->getId_origine();
            $id_race = $this->getId_race();
            $req->bindParam(1,$name,PDO::PARAM_STR);
            $req->bindParam(2,$id_origine,PDO::PARAM_INT);
            $req->bindParam(3,$id_race,PDO::PARAM_INT);
            $req->execute();
            $data = $req->fetch(PDO::FETCH_ASSOC);
            return $data;
        }catch(Exception $error){
            return $error->getMessage();
        }
    }

    public function addAnimal():string{
        try {
            $req = $this->getBdd()->prepare("INSERT INTO animal (nom_animal, id_origine, id_race) VALUES (?,?,?)");
            $name = $this->getNom_animal();
            $id_origine = $this->getId_origine();
            $id_race = $this->getId_race();
            $req->bindParam(1,$name,PDO::PARAM_STR);
            $req->bindParam(2,$id_origine,PDO::PARAM_INT);
            $req->bindParam(3,$id_race,PDO::PARAM_INT);
            $req->execute();
            return "Nouveau animal ajouté : $name d'origine $id_origine et de race $id_race";
        }catch(Exception $error){
            return $error->getMessage();
        }
    }

}