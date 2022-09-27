<?php

namespace Projet\Models;

class ArticlesManager extends Manager
{
// gere la séléction des articles par l'id
    public function article($id){
        $bdd = $this->dbConnect();
        $articlesid = $bdd->prepare("SELECT id, title, content, image, created_at FROM articles WHERE id = ?");
        $articlesid->execute(array($id));
        return $articlesid;

    }

}