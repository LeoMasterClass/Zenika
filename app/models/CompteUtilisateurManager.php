<?php

namespace Projet\Models;

class CompteUtilisateurManager extends Manager
{
// gere les infos rentrer par l'utilisateur
    public function infosUser(){
        $bdd = $this->dbConnect();
        $compte = $bdd->prepare("SELECT email, firstName, name FROM users WHERE email = '".$_SESSION['email']."'");
        $compte->execute(array($_SESSION['email']));
        return $compte;
    }
}