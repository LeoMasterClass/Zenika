<?php

namespace Projet\Models;

class ContactAdminManager extends Manager
{
// gere les infos rentrer par l'utilisateur
    public function showContactManage(){
        $bdd = $this->dbConnect();
        $contact = $bdd->prepare("SELECT * FROM post_contact ORDER BY id ASC");
        $contact->execute(array());
        return $contact;
    }
    public function deleteContactManage($id){
        $bdd = $this->dbConnect();
        $deleteContactManage = $bdd->prepare("DELETE FROM post_contact WHERE id = ?");
        $deleteContactManage->execute(array($id));
        $deleteContactManage->fetch();
        return $deleteContactManage;
    }
}