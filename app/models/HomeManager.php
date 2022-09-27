<?php

namespace Projet\Models;

class HomeManager extends Manager
{
    // affiches les articles
    public function articlesFront()
    {
        $bdd= $this->dbConnect();
        $req= $bdd->prepare('SELECT id, title, extract, image, alt FROM articles ORDER BY id DESC LIMIT 4');
        $req->execute();
        return $req;
    }
    // affiches les articles a vendres
    public function articlesventesFront()
    {
        $bdd= $this->dbConnect();
        $req= $bdd->prepare('SELECT id, image, title, alt FROM articles_ventes ORDER BY id DESC LIMIT 3');
        $req->execute(array());
        return $req;
    }
    public function lienSliderFront()
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT id FROM articles');
        $req->execute(array());
        return $req;
    }
}