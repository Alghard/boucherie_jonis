<?php 

class Race{

    private ?int $id;
    private ?string $nom_race;

    private ?PDO $bdd;

    public function getId(): ?int { return $this->id; }
    public function setId(?int $id): Race{ $this->id = $id; return $this; }

    public function getNom_race(): ?string{ return $this->nom_race; }
    public function setNom_race(?string $nom_race): Race{ $this->nom_race = $nom_race; return $this; }

    public function getBdd(): ?PDO { return $this->bdd; }
    public function setBdd(?PDO $bdd): Race{ $this->bdd = $bdd; return $this; }

    public function getRaces():array|string{
        try{
            $req = $this->getBdd()->prepare("SELECT race.id_race, race.nom_race FROM race");
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }catch(Exception $error){
            return $error->getMessage();
        }
    }

    public function getRaceByName():array|string{
        try{
            $req = $this->getBdd()->prepare("SELECT race.id_race, race.nom_race FROM race WHERE race.nom_race = ?");
            $name = $this->getNom_race();
            $req->bindParam(1,$name,PDO::PARAM_STR);
            $req->execute();
            $data = $req->fetch(PDO::FETCH_ASSOC);
            return $data;
        }catch(Exception $error){
            return $error->getMessage();
        }
    }

    public function getIdByName():int|string{
        try{
            $req = $this->getBdd()->prepare("SELECT race.id_race FROM race WHERE race.nom_race = ?");
            $name = $this->getNom_race();
            $req->bindParam(1,$name,PDO::PARAM_STR);
            $req->execute();
            $data = $req->fetch(PDO::FETCH_ASSOC);
            $id = $data[0];
            return $id;
        }catch(Exception $error){
            return $error->getMessage();
        }
    }

    public function addRace():string{
        try{
            $req = $this->getBdd()->prepare("INSERT INTO race (nom_race) VALUES (?)");
            $name = $this->getNom_race();
            $req->bindParam(1,$name,PDO::PARAM_STR);
            $req->execute();
            return "Nouvelle race ajoutée : $name";
        }catch(Exception $error){
            return $error->getMessage();
        }
    }
}
