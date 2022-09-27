<?php

namespace Projet\Models;

class InspirationManager extends Manager
{
    // affiches les images de la table inspirations
    public function PostInspiFront()
    {
        $bdd= $this->dbConnect();
        $req= $bdd->prepare('SELECT id, image, alt FROM inspirations ORDER BY id DESC LIMIT 10');
        $req->execute(array());
        return $req;
    }
}