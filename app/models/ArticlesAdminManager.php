<?php

namespace Projet\Models;

class ArticlesAdminManager extends Manager
{
    //Va permettre de voir tout les articles de la table articles
    public function showArticleManage(){
        $bdd = $this->dbConnect();
        $showArticleManage = $bdd->prepare("SELECT id, title, extract, content, image, created_at FROM articles ORDER BY id ASC");
        $showArticleManage->execute(array());
        return $showArticleManage;
    }
    // Va permettre la modification des articles de la table articles
    public function updateArticleManage($img, $img_pres, $title, $title_desc, $extract, $content, $image, $image_pres, $alt, $id){

        $bdd = $this->dbConnect();
        $updateArticleManage = $bdd->prepare("UPDATE `articles` SET `title` = :title, `title_desc` = :title_desc, `extract` = :extract, `content` = :content, `image` = :image, `image_pres` = :image_pres, `alt` = :alt WHERE `id` = :id");
        $updateArticleManage->execute(array(
            ":title" => $title,
            ":title_desc" => $title_desc,
            ":extract" => $extract,
            ":content" => $content,
            ":image" => $image,
            ":image_pres" => $image_pres,
            ":alt" => $alt,
            ":id" => $id,
        ));
    }
    public function showUpdateArticleManage($id){
        $bdd = $this->dbConnect();
        $showArticlesID = $bdd->prepare("SELECT id, title, title_desc, extract, content, image, image_pres, alt FROM articles WHERE id = ?");
        $showArticlesID->execute(array($id));
        return $showArticlesID;
    }
    // Va permettre de créer des articles dans table articles
    public function createArticleManage($img, $img_pres, $title, $title_desc, $extract, $content, $alt, $image, $image_pres){
        $bdd = $this->dbConnect();
        var_dump($image);
        var_dump($image_pres);
        $createArticleManage = $bdd->prepare("INSERT INTO articles (title, title_desc, extract, content, image, image_pres, alt) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $createArticleManage->execute(array($title, $title_desc, $extract, $content, $image, $image_pres, $alt));
        return $createArticleManage;
    }
    // Va permettre de supprimer des articles de la table articles
    public function deleteArticleManage($id){
        $bdd = $this->dbConnect();
        $deleteArticleManage = $bdd->prepare("DELETE FROM articles WHERE id = ?");
        $deleteArticleManage->execute(array($id));
        $deleteArticleManage->fetch();
        return $deleteArticleManage;
    }

}