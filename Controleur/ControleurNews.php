<?php

require_once 'Modele/ModeleNews.php';
require_once 'Modele/ModeleCategorie.php';

require_once 'Controleur/Controleur.php';

/**
 * Contrôleur des actions liées aux news
 *
 * @author Lagrange
 */
class ControleurNews extends Controleur
{
    private $modeleNews;
    private $modeleCategorie;
    
    public function __construct()
    {
        $this->modeleNews = new ModeleNews();
        $this->modeleCategorie = new ModeleCategorie();
    }
    
    public function listerNews()
    {
        $news = $this->modeleNews->lireTout();  
        
        $this->genererVue('listeNews', 
                array('news' => $news));
    }
    
    public function afficherAjoutNews()
    {
        // On récupère les catégories
        
        $categories = $this->modeleCategorie->lireTout();
        
        $this->genererVue('ajoutNews', array (
            'categories' => $categories
        ));
    }
    
    public function ajouterNews($auteur, $contenu, $idCategorie)
    {
        $this->modeleNews->ajouterNews($auteur, $contenu, $idCategorie);
        
        // On reliste tous les news
        $this->listerNews();
    }
}