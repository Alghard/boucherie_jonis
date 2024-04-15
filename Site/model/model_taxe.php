<?php

class Taxe {
    private ?int $id;
    private ?int $taux_tva;
    private ?string $date_debut;
    private ?string $date_fin;
    private ?PDO $bdd;

    //GETTERS AND SETTERS
    public function getId(): ?int { return $this->id; }
    public function setId(?int $id): Taxe { $this->id = $id; return $this;}

    public function getTaux_tva(): ?int { return $this->taux_tva;}
    public function setTaux_tva(?int $taux_tva): Taxe { $this->taux_tva = $taux_tva; return $this;}

    public function getDate_debut(): ?string { return $this->date_debut; }
    public function setDate_debut(?string $date_debut): Taxe { $this->date_debut = $date_debut; return $this;}

    public function getDate_fin(): ?string { return $this->date_fin; }
    public function setDate_fin(?string $date_fin): Taxe { $this->date_fin = $date_fin; return $this;}

    public function getBdd(): ?PDO { return $this->bdd; }
    public function setBdd(?PDO $bdd): Taxe { $this->bdd = $bdd; return $this;}

    //METHODS

    public function getTauxTaxe():int|string{
        try{
            $req = $this->getBdd()->prepare("SELECT taxe.id_taxe, taxe.taux_tva FROM taxe");
            $req->execute();
            $data = $req->fetch(PDO::FETCH_ASSOC);
            $taux = $data["taux_tva"];
            return $taux;
        }catch(Exception $error){
            return $error->getMessage();
        }
    }
}