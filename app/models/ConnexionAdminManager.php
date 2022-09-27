<?php

namespace Projet\Models;

class ConnexionAdminManager extends Manager
{
    // verifie les identifiants
    public function adminConnexion($email,$password)
    {

        $bdd = $this->dbConnect();
        $req = $bdd ->prepare('SELECT id, email, password, admin FROM users WHERE email = ?');
        $req->execute(array($email));

        return $req;

    }



}