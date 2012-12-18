<?php

require_once 'Modele/Modele.php';

/**
 * Classe modélisant une catégorie
 *
 * @author Lagrange
 */
class ModeleCategorie extends Modele
{

    public function lireTout()
    {
        $sql = 'select CAT_ID, CAT_NOM 
                FROM t_categorie
                order by CAT_NOM desc';
        
        return $this->executerLecture($sql);
    }

}