<?php

session_start();

require_once __DIR__ . '/vendor/autoload.php';

try {
// appele au controllerBack
$controllerBack = new \Projet\Controllers\ControllerBack();
if(isset($_GET['action'])){
    // Renvoie a la page demander + test si log en admin
    if($_GET['action'] == 'admin'){
        if ($_SESSION['admin'] == 1) {
            $controllerBack->adminBack();
        }else{
            header('Location: /');
        }
    }
    elseif($_GET['action'] == 'articlesAdmin'){
        if ($_SESSION['admin'] == 1) {
        $controllerBack->showArticle();
        }else{
            header('Location: /');
        }
    }
    elseif($_GET['action'] == 'articlesCreate'){
        if ($_SESSION['admin'] == 1) {
        $controllerBack->articleCreate();
        }else{
            header('Location: /');
        }
    }
    elseif($_GET['action'] == 'articleUpdate'){
        if ($_SESSION['admin'] == 1) {
        $controllerBack->updateArticle();
        }else{
            header('Location: /');
        }
    }
    elseif($_GET['action'] == 'gestionMembre'){
        if ($_SESSION['admin'] == 1) {
        $controllerBack->gestionMembre();
        }else{
            header('Location: /');
        }
    }
    elseif($_GET['action'] == 'showContact'){
        if ($_SESSION['admin'] == 1) {
        $controllerBack->ShowContact();
        }else{
            header('Location: /');
        }
        
    }
    elseif ($_GET['action'] == 'deleteContact'){
        if ($_SESSION['admin'] == 1) {
        $id = $_GET['id'];
        $controllerBack->deleteContact($id);
        }else{
            header('Location: /');
        }
    }
    elseif ($_GET['action'] == 'deleteMembre'){
        if ($_SESSION['admin'] == 1) {
        $id = $_GET['id'];
        $controllerBack->deleteUsers($id);
        }else{
            header('Location: /');
        }
    }
    elseif ($_GET['action'] == 'upgradeMembre'){
        if ($_SESSION['admin'] == 1) {
        $id = $_GET['id'];
        $controllerBack->upgradeUsers($id);
        }else{
            header('Location: /');
        }
    }
    elseif ($_GET['action'] == 'reduceMembre'){
        if ($_SESSION['admin'] == 1) {
        $id = $_GET['id'];
        $controllerBack->reduceUsers($id);
        }else{
            header('Location: /');
        }
    }
    elseif ($_GET['action'] == 'decoAdmin'){
        if ($_SESSION['admin'] == 1) {
        $controllerBack->decoAdmin();
        }else{
            header('Location: /');
        }
    }
    elseif ($_GET['action'] == 'deleteArticle'){
        if ($_SESSION['admin'] == 1) {
        $id = $_GET['id'];
        $controllerBack->deleteArticle($id);
        }else{
            header('Location: /');
        }
    }
    elseif ($_GET['action'] == 'showInspi'){
        if ($_SESSION['admin'] == 1) {
        $controllerBack->showInspi();
        }else{
            header('Location: /');
        }
    }
    elseif ($_GET['action'] == 'createInspi'){
        if ($_SESSION['admin'] == 1) {
        $controllerBack->createInspi();
        }else{
            header('Location: /');
        }
    }
    elseif ($_GET['action'] == 'deleteInspi'){
        if ($_SESSION['admin'] == 1) {
        $id = $_GET['id'];
        $controllerBack->deleteInspi($id);
        }else{
            header('Location: /');
        }
    }
}else{
    // chemin par defaut du routeur Back
    $controllerBack->loginAdmin();
}

}catch(Exception $e){
    
} 
