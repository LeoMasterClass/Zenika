<?php

namespace Projet\Models;

class DiyManager extends Manager
{
    // affiche les images de la table articles
    public function diy(){
        $bdd = $this->dbConnect();
        $req = $bdd->prepare("SELECT id, title_desc, image_pres, alt FROM articles ORDER BY id DESC LIMIT 4 ");
        $req->execute(array());
        return $req;
    }


}