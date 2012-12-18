<?php

require 'Controleur/ControleurNews.php';

/**
 * Description of ControleurFrontal
 *
 * @author Lagrange
 */
class ControleurFrontal extends Controleur {

    private $ctrlNews;

    public function __construct()
    {
        $this->ctrlNews = new ControleurNews();
    }

    public function routerRequete()
    {
        try {
            if (!empty($_POST)) {
                $this->routerRequetePost();
            }
            elseif (!empty($_GET)) {
                $this->routerRequeteGet();
            }
            else {
                $this->ctrlNews->listerNews();  // action par défaut
            }
        }
        catch (Exception $e) {
            $this->afficherErreur($e->getMessage());
        }
    }

    private function routerRequetePost()
    {
        if (isset($_POST['titre']) AND isset($_POST['contenu']) AND isset($_POST['categorie']))
        {
            $titre = strip_tags($_POST['titre']);
            $contenu = strip_tags($_POST['contenu']);
            $categorie = strip_tags($_POST['categorie']);
            if ($titre != "" AND $contenu != "" AND $categorie != "")
            {
                $this->ctrlNews->ajouterNews($titre, $contenu, $categorie);
            }
            else
            {
                throw new Exception('Les champs doivent tous être saisis');
            }
        }
        else
        {
            throw new Exception('Paramètres $_POST non reconnus');
        }
    }

    private function routerRequeteGet()
    {
        
        if (isset($_GET['action']))
        {
            if ($_GET['action'] == 'ajouterNews')
            {
                $this->ctrlNews->afficherAjoutNews();
            }
            else
            {
                throw new Exception("Action non valide");
            }
        }
    }
}

