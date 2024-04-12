<?php

class Origine {
    private ?int $id;
    private ?string $pays_origine;

    private ?PDO $bdd;

    public function getId(): ?int { return $this->id; }
    public function setId(?int $id): Origine { $this->id = $id; return $this;}

    public function getPays_origine(): ?string { return $this->pays_origine; }
    public function setPays_origine(?string $pays_origine): Origine { $this->pays_origine = $pays_origine; return $this;}

    public function getBdd(): ?PDO { return $this->bdd; }
    public function setBdd(?PDO $bdd): Origine { $this->bdd = $bdd; return $this;}

    public function getOrigine():array|string{
        try {
            $req = $this->getBdd()->prepare("SELECT origine.id_origine, origine.pays_origine FROM origine");
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }catch(Exception $error){
            return $error->getMessage();
        }
    }

    public function getOrigineByCountry():array|string{
        try{
            $req = $this->getBdd()->prepare("SELECT origine.id_origine, origine.pays_origine FROM origine WHERE origine.pays_origine = ?");
            $country = $this->getPays_origine();
            $req->bindParam(1, $country, PDO::PARAM_STR);
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }catch(Exception $error){
            return $error->getMessage();
        }
    }

    public function getIdByCountry():int|string{
        try{
            $req = $this->getBdd()->prepare("SELECT origne.id_origine FROM origine WHERE origine.nom_origine = ?");
            $country = $this->getPays_origine();
            $req->bindParam(1,$country,PDO::PARAM_STR);
            $req->execute();
            $data = $req->fetch(PDO::FETCH_ASSOC);
            $id = $data[0];
            return $id;
        }catch(Exception $error){
            return $error->getMessage();
        }
    }

    public function addOrigine():string{
        try {
            $req = $this->getBdd()->prepare("INSERT INTO origine (pays_origine) VALUES (?)");
            $country = $this->getPays_origine();
            $req->bindParam(1, $country, PDO::PARAM_STR);
            $req->execute();
            return "Nouveau pays d'origine ajouté : $country";
        }catch(Exception $error){
            return $error->getMessage();
        }
    }
}