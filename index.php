<?php

session_start();



require_once __DIR__ . '/vendor/autoload.php';

try {
// appele au controllerFront
$controllerFront = new \Projet\Controllers\ControllerFront();
if(isset($_GET['action'])){
    // amene a la page lié a l'action demander
    if($_GET['action'] == 'contact'){
        $controllerFront->contactFront();
    }elseif($_GET['action'] == 'concept'){
        $controllerFront->conceptFront();
    }elseif($_GET['action'] == 'quisuisje'){
        $controllerFront->quisuisjeFront();
    }elseif($_GET['action'] == 'inspiration'){
        $controllerFront->inspirationFront();
    }elseif($_GET['action'] == 'travaux'){
        $controllerFront->travauxFront();
    }elseif($_GET['action'] == 'diy'){
        $controllerFront->diyFront();
    }elseif($_GET['action'] == 'connexion'){
        $controllerFront->connexionFront();
    }elseif($_GET['action'] == 'inscription'){
        $controllerFront->inscriptionFront();
    }elseif($_GET['action'] == 'compte'){    
        $controllerFront->compteFront();
    }elseif($_GET['action'] == 'article'){
        $controllerFront->articlesFront();
    }elseif($_GET['action'] == 'deconnexion'){
        $controllerFront->deconnexionFront();
    }
}else{
    // Par défaut amene sur la page home.php
    $controllerFront->home();
}

}catch(Exception $e){
    
}
