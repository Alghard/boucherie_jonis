<?php

class Poids {
    private ?int $id;
    private ?int $valeur_poids;
    private ?PDO $bdd;

    //GETTERS AND SETTERS

    public function getId(): ?int { return $this->id; }
    public function setId(?int $id): Poids{ $this->id = $id; return $this; }

    public function getValeur_poids(): ?int {return $this->valeur_poids;}
    public function setValeur_poids(?int $poids): Poids { $this->valeur_poids = $poids; return $this;}

    public function getBdd(): ?PDO { return $this->bdd; }
    public function setBdd(?PDO $bdd): Poids{ $this->bdd = $bdd; return $this; }

    //METHODS

    public function getPoids():array|string{
        try{
            $req = $this->getBdd()->prepare("SELECT poids.id_poids, poids.valeur_poids FROM poids");
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }catch(Exception $error){
            return $error->getMessage();
        }
    }

    public function addPoids():string{
        try{
            $req = $this->getBdd()->prepare("INSERT INTO poids (valeur_poids) VALUES (?)");
            $poids = $this->getValeur_poids();
            $req->bindParam(1,$poids, PDO::PARAM_INT);
            $req->execute();
            return "Nouveau poids ajouté : $poids";
        }catch(Exception $error){
            return $error->getMessage();
        }
    }
}
