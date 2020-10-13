<?php
namespace src\Controller;

use src\Model\categorie;
use src\Model\BDD;

class CategorieController extends AbstractController {

    public function Ajout(){
        if($_POST){
            $objCategorie = new Categorie();
            $objCategorie->setLibelle($_POST["Libelle"]);
            $objCategorie->setIcone($_POST["Icone"]);
            //Exécuter l'insertion
            $id = $objCategorie->SqlAjout(BDD::getInstance());
            //var_dump($id);

            // Redirection
               header("Location:/Categorie/show/$id");
        }else{
            return $this->twig->render("Categorie/ajout.html.twig");
        }

    }

    public function All(){
        $articles = new Categorie();
        $datas = $articles->SqlGetAll(BDD::getInstance());

        return $this->twig->render("Article/all.html.twig", [
            "articleList"=>$datas
        ]);
    }
}
