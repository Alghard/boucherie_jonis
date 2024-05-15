<?php 

class Article {

    private ?int $id;
    private ?string $nom_article;
    private ?float $prix_unit_article;
    private ?float $prix_kg_article;
    private ?string $description_article;
    private ?bool $stock_article;
    private ?float $quantite_article;
    private ?int $temps_conservation;

    private ?Type $type;
    private ?Animal $animal;
    private ?Taxe $taxe;
    private ?array $poids = [];
    private ?PDO $bdd;

//GETTERS AND SETTERS
    public function getId(): ?int { return $this->id; }
    public function setId(?int $id): Article { $this->id = $id; return $this;}

    public function getNom_article(): ?string { return $this->nom_article; }
    public function setNom_article(?string $nom_article): Article { $this->nom_article = $nom_article; return $this;}

    public function getPrixUnit(): ?float {return $this->prix_unit_article;}
    public function setPrixUnit(?float $prix_unit): Article { $this->prix_unit_article = $prix_unit; return $this;}

    public function getPrixKg(): ?float {return $this->prix_kg_article;}
    public function setPrixKg(?float $prix_kg): Article { $this->prix_kg_article = $prix_kg; return $this;}

    public function getDescription(): ?string { return $this->description_article; }
    public function setDescription(?string $description): Article { $this->description_article = $description; return $this; }

    public function getStock(): ?bool { return $this->stock_article; }
    public function setStock(?bool $stock): Article { $this->stock_article = $stock; return $this; }

    public function getQuantite(): ?float{return$this->quantite_article;}
    public function setQuantite(?float $qty): Article {$this->quantite_article = $qty; return $this; }

    public function getDLC(): ?int { return $this->temps_conservation; }
    public function setDLC(?int $temps_conservation): Article { $this->temps_conservation = $temps_conservation; return $this;}

    public function getType(): ?Type { return $this->type; }
    public function setType(?Type $type): Article { $this->type = $type; return $this; }

    public function getAnimal(): ?Animal { return $this->animal; }
    public function setAnimal(?Animal $animal): Article { $this->animal = $animal; return $this; }

    public function getTaxe(): ?Taxe { return $this->taxe; }
    public function setTaxe(?Taxe $taxe): Article { $this->taxe = $taxe; return $this; }

    public function getPoids(): ?array {return $this->poids;}
    public function setPoids(?array $poids): Article {$this->poids = $poids; return $this;}

    public function getBdd(): ?PDO { return $this->bdd; }
    public function setBdd(?PDO $bdd): Article { $this->bdd = $bdd; return $this;}

//METHODS
    function searchArticle($search):array|string{
        try{
            $req = $this->getBdd()->prepare("SELECT article.nom_article, article.prix_unit_article, article.prix_kg_article, animal.nom_animal, images.url_image, origine.pays_origine, race.nom_race, images.alt_image FROM article JOIN animal ON article.id_animal = animal.id_animal JOIN race ON animal.id_race = race.id_race JOIN origine ON animal.id_origine = origine.id_origine JOIN images ON article.id_article = images.id_article WHERE nom_article LIKE CONCAT('%', ?, '%') OR description_article LIKE CONCAT('%', ?, '%') ");  //Requete pour rechercher un article qui "ressemble" a ce que j'ai tapé dans ma barre de recherche
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

    function updateArticle(int $id):string{
        try{
            $req = $this->getBdd()->prepare("UPDATE article SET nom_article = ?, description_article = ?, prix_unit_article = ?, prix_kg_article = ?, quantite = ? WHERE article.id_article = ?");
            $name = $this->getNom_article();
            $prix_unit = $this->getPrixUnit();
            $prix_kg = $this->getPrixKg();
            $description = $this->getDescription();
            $qty = $this->getQuantite();
            $req->bindParam(1,$name,PDO::PARAM_STR);
            $req->bindParam(2,$description,PDO::PARAM_STR);
            $req->bindParam(3,$prix_unit,PDO::PARAM_STR);
            $req->bindParam(4,$prix_kg,PDO::PARAM_STR);
            $req->bindParam(5,$qty,PDO::PARAM_STR);
            $req->bindParam(6,$id,PDO::PARAM_INT);
            $req->execute();
            return "Modification de l'article effectué";
        }
        catch(Exception $error){
            die($error->getMessage());
        }
    }
    
    function getArticleById(int $id):array{
        try{
            $req = $this->getBdd()->prepare("SELECT id_article, nom_article, prix_unit_article, prix_kg_article, description_article, quantite, temps_conservation FROM article WHERE article.id_article = ?");
            $req->bindParam(1,$id,PDO::PARAM_INT);
            $req -> execute();
            $list = $req->fetch(PDO::FETCH_ASSOC);
            return $list;
        }
        catch(Exception $error){
            die($error->getMessage());
        }
    }
    function getAllArticles():array|string{
        try{
            $req = $this->getBdd()->prepare("SELECT article.id_article, article.nom_article, article.prix_unit_article, article.prix_kg_article, article.stock_article FROM article");
            $req -> execute();
            $list = $req->fetchAll(PDO::FETCH_ASSOC);
            return $list;
        }
        catch(Exception $error){
            die($error->getMessage());
        }
    }

    function getBestSeller():array|string{
        try{
            $req =$this->getBdd()->prepare("SELECT article.nom_article, article.prix_unit_article, article.prix_kg_article, animal.nom_animal, images.url_image, origine.pays_origine, race.nom_race, images.alt_image FROM article JOIN animal ON article.id_animal = animal.id_animal JOIN race ON animal.id_race = race.id_race JOIN origine ON animal.id_origine = origine.id_origine JOIN images ON article.id_article = images.id_article WHERE article.id_article = 6 OR article.id_article = 8 OR article.id_article = 10 OR article.id_article = 11 OR article.id_article = 12");
            $req->execute();
            $list = $req->fetchAll(PDO::FETCH_ASSOC);
            return $list;
        }
        catch(Exception $error){
            die($error->getMessage());
        }
    }
    
    function applyTaxes(int $price):int{
        $ttc= $price*$this->getTaxe()->getTaux_tva()/100;
        return $ttc;
    }
    
    function addArticle():string{
        try{
            $req = $this->getBdd()->prepare("INSERT INTO article (nom_article, description_article, prix_unit_article, prix_kg_article, id_animal, quantite) VALUES (?,?,?,?,?,?)");
            $name = $this->getNom_article();
            $prix_unit = $this->getPrixUnit();
            $prix_kg = $this->getPrixKg();
            $description = $this->getDescription();
            $idAnimal = $this->getAnimal()->getId();
            $qty = $this->getQuantite();
            $req->bindParam(1,$name,PDO::PARAM_STR);
            $req->bindParam(2,$description,PDO::PARAM_STR);
            $req->bindParam(3,$prix_unit,PDO::PARAM_STR); //obligé d'utiliser param str pour des nb decimaux
            $req->bindParam(4,$prix_kg,PDO::PARAM_STR);
            $req->bindParam(5,$idAnimal,PDO::PARAM_INT);
            $req->bindParam(6,$qty,PDO::PARAM_STR);
            $req->execute();
            return "Article $name ajouté avec succés !";
        }catch(Exception $error){
            return $error->getMessage();
        }
    }

    // function addPoidsParArticle():string{
    //     $id_article = $this->getId();
    //     $poids = new Poids;
    //     $arrayPoids = $poids->setBdd(connect())->getPoids(); //récupère tous les poids existants
    //     foreach($arrayPoids as $value){
    //         try{
    //             $req = $this->getBdd()->prepare("INSERT INTO peser (id_article, id_poids) VALUES (?,?)");
    //             $req->bindParam(1,$id_article,PDO::PARAM_INT);
    //             
    //             $req->bindParam(2,$value['id_poids'],PDO::PARAM_INT);
    //         }
    //     }
    // }

}
