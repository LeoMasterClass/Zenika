<?php

namespace Projet\Models;

class InscriptionManager extends Manager
{
    // envoie les données d'inscription en base de donnée 
    public function postRegister($firstName,$name,$email,$password)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare("INSERT INTO users ( firstName, name, email, password) VALUES ( :firstName, :name, :email, :password)");
        $req->execute([
            "firstName" => htmlentities($firstName),
            "name" => htmlentities($name),
            "email" => htmlentities($email),
            "password" => password_hash($password, PASSWORD_DEFAULT)
        ]);
        return $req;

    }
}




// array(htmlentities($firstName),htmlentities($name),htmlentities($email),password_hash($password, PASSWORD_DEFAULT))