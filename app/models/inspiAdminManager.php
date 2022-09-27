<?php

namespace Projet\Models;

class InspiAdminManager extends Manager
{
// gere les infos rentrer par l'utilisateur
    public function showInspiManage()
    {
        $bdd = $this->dbConnect();
        $inspi = $bdd->prepare("SELECT id, description, alt FROM inspirations ORDER BY id ASC");
        $inspi->execute(array());
        return $inspi;
    }
    public function createInspiManage($img, $image, $description, $alt)
    {
        $bdd = $this->dbConnect();
        $createInspiManage = $bdd->prepare("INSERT INTO inspirations (image, description, alt) VALUES (?, ?, ?)");
        $createInspiManage->execute(array($image, $description, $alt));
        return $createInspiManage;
    }
    public function deleteInspiManage($id){
        $bdd = $this->dbConnect();
        $deleteInspiManage = $bdd->prepare("DELETE FROM inspirations WHERE id = ?");
        $deleteInspiManage->execute(array($id));
        $deleteInspiManage->fetch();
        return $deleteInspiManage;
    }
}