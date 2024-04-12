<?php

class Type {
    private ?int $id;
    private ?string $nom_type;
    private ?PDO $bdd;

    // GETTERS AND SETTERS

    public function getId(): ?int { return $this->id; }
    public function setId(?int $id): Type { $this->id = $id; return $this;}

    public function getNom_type(): ?string { return $this->nom_type; }
    public function setNom_type(?string $nom_type): Type { $this->nom_type = $nom_type; return $this;}

    public function getBdd(): ?PDO { return $this->bdd; }
    public function setBdd(?PDO $bdd): Type { $this->bdd = $bdd; return $this;}

    //METHODS

    public function getTypes():array|string{
        try{
            $req = $this->getBdd()->prepare("SELECT type_article.id_type, type_article.nom_type FROM type_article");
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }catch(Exception $error){
            return $error->getMessage();
        }
    }

    public function getTypeByName():array|string{
        try{
            $req = $this->getBdd()->prepare("SELECT type_article.id_type, type_article.nom_type FROM type_article WHERE type_article.nom_type = ?");
            $name = $this->getNom_type();
            $req->bindParam(1,$name,PDO::PARAM_STR);
            $req->execute();
            $data = $req->fetch(PDO::FETCH_ASSOC);
            return $data;
        }catch(Exception $error){
            return $error->getMessage();
        }
    }

    public function addType():string{
        try{
            $req = $this->getBdd()->prepare("INSERT INTO type_article (nom_type) VALUES (?)");
            $name = $this->getNom_type();
            $req->bindParam(1,$name,PDO::PARAM_STR);
            $req->execute();
            return "Nouveau type d'article ajouté : $name";
        }catch(Exception $error){
            return $error->getMessage();
        }
    }
}