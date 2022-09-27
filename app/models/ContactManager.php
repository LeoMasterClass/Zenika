<?php

namespace Projet\Models;

class ContactManager extends Manager
{
// envoie les informations rentrer dans le contact en base de donnée
    public function postContact($name,$email,$objet,$content)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare("INSERT INTO post_contact ( name, email, objet, content) VALUES ( ?, ?, ?, ?)");
        $req->execute(array($name,$email,$objet,$content));
        return $req; 
    }

}
