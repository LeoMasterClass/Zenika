<?php

namespace Projet\Models;

class MembresAdminManager extends Manager
{
    //Va permettre de voir tout les articles de la table articles
    public function showMembreManage(){
        $bdd = $this->dbConnect();
        $showArticleManage = $bdd->prepare("SELECT id, email, firstName, name, admin, created_at FROM users ORDER BY id ASC");
        $showArticleManage->execute(array());
        return $showArticleManage;
    }
    // Va permettre la modification des articles de la table articles
    public function upgradeMembreManage($id){
        $bdd = $this->dbConnect();
        $updateArticleManage = $bdd->prepare("UPDATE users SET admin = 1 WHERE id = ?");
        $updateArticleManage->execute(array($id));
        return $updateArticleManage;
    }
    public function reduceMembreManage($id){
        $bdd = $this->dbConnect();
        $updateArticleManage = $bdd->prepare("UPDATE users SET admin = 0 WHERE id = ?");
        $updateArticleManage->execute(array($id));
        return $updateArticleManage;
    }
    // Va permettre de créer des articles dans table articles
    public function createMembreManage($firstName,$name,$email,$password){
        $bdd = $this->dbConnect();
        $createArticleManage = $bdd->prepare("INSERT INTO users (firstName, name, email, password) VALUES ( :firstName, :name, :email, :password)");
        $createArticleManage->execute([
            "firstName" => htmlentities($firstName),
            "name" => htmlentities($name),
            "email" => htmlentities($email),
            "password" => password_hash($password, PASSWORD_DEFAULT)
        ]);
        return $createArticleManage;
    }
    // Va permettre de supprimer des articles de la table articles
    public function deleteMembreManage($id){
        $bdd = $this->dbConnect();
        $deleteArticleManage = $bdd->prepare("DELETE FROM users WHERE id = ?");
        $deleteArticleManage->execute(array($id));
        $deleteArticleManage->fetch();
        return $deleteArticleManage;
    }

}