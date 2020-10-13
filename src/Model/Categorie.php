<?php
namespace src\Model;

class categorie {
    private $id;
    private $libelle;
    private $icone;

    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $Id
     * @return categorie
     */
    public function setId($Id)
    {
        $this->Id = $Id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * @param mixed $Titre
     * @return categorie
     */
    public function setLibelle($Libelle)
    {
        $this->Titre = $Libelle;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIcone()
    {
        return $this->icone;
    }

    /**
     * @param mixed $Description
     * @return categorie
     */
    public function setIcone($Icone)
    {
        $this->Icone = $Icone;
        return $this;
    }

    public function SqlAjout(\PDO $bdd){
        try {
            $requete = $bdd->prepare("INSERT INTO categorie (libelle, icone) VALUES(:libelle, :icone)");

            $requete->execute([
                "libelle" => $this->getLibelle(),
                "icone" => $this->getIcone(),
            ]);
            return $bdd->lastInsertId();
        }catch (\Exception $e){
            return $e->getMessage();
        }

    }

    public function SqlGetAll(\PDO $bdd){
        $requete = $bdd->prepare("SELECT * FROM articles");
        $requete->execute();
        //$datas =  $requete->fetchAll(\PDO::FETCH_ASSOC);
        $datas =  $requete->fetchAll(\PDO::FETCH_CLASS,'src\Model\Article');
        return $datas;

    }




}