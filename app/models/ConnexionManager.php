<?php

namespace Projet\Models;

class ConnexionManager extends Manager
{
    // verifie les identifiants
    public function postConnexion($email,$password)
    {

        $bdd = $this->dbConnect();
        $req = $bdd ->prepare('SELECT id, email, password FROM users WHERE email = ?');
        $req->execute(array($email));

        return $req;

    }


}