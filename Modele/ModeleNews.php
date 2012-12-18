<?php

require_once 'Modele/Modele.php';

/**
 * Classe modélisant une news
 *
 * @author Lagrange
 */
class ModeleNews extends Modele
{

    public function lireTout()
    {
        $sql = 'select NEWS_ID, NEWS_DATE, NEWS_TITRE, NEWS_CONTENU, CAT_NOM
                FROM t_news JOIN t_categorie
                ON t_news.cat_id = t_categorie.cat_id
                order by NEWS_DATE desc';
        
        return $this->executerLecture($sql);
    }
    
    public function ajouterNews($titre, $contenu, $idCategorie)
    {
        $sql = "INSERT INTO t_news(NEWS_DATE, NEWS_TITRE, NEWS_CONTENU, CAT_ID)
                VALUES(NOW(), ?, ?, ?)";
        
        $this->executerModification($sql, array($titre, $contenu, $idCategorie));
    }

}