<?php

namespace Projet\Controllers;

class ControllerBack
{

    function adminBack()
    {
        

        require 'app/Views/back/admin.php';
    }
    

    function loginAdmin(){

        function connexionAdmin(){
            extract ($_POST);

            $errors = []; 
            
            $email = !empty($_POST['email']) ? $_POST['email'] : NULL;
            $password = !empty($_POST['password']) ? $_POST['password'] : NULL;
            $admin = !empty($_POST['admin']) ? $_POST['admin'] : NULL;




            $connexionManager = new \Projet\Models\ConnexionAdminManager();
            $connexion = $connexionManager->adminConnexion($email,$password,$admin);
            $resultat = $connexion->fetch();

            $isPasswordCorrect = password_verify($password, $resultat['password']);


            if ($isPasswordCorrect) {
                $_SESSION['email'] = $resultat['email']; // transformation des variables recupérées en session
                $_SESSION['password'] = $resultat['password'];
                $_SESSION['id'] = $resultat['id'];
                $_SESSION['admin'] = $resultat['admin'];
                if ($_SESSION['admin'] == 1) {
                    header('Location: dashboard');
                }else{
                    header('Location: /');
                }
            } else {
                 return $errors;
            }
        }
        $connexion = connexionAdmin();

        require 'app/Views/back/loginAdmin.php';
    }



//**
// 
//          GESTION DE LA PARTIE ARTICLES
// 
//**



    // Va permettre de voir tout les articles de la table articles
    function showArticle(){
        
        $showArticleManage= new \Projet\Models\ArticlesAdminManager();
        $showTables = $showArticleManage->showArticleManage();

        require 'app/Views/back/articlesAdmin.php';

    }


    // Va permettre la modification des articles de la table articles
    function updateArticle(){

        $id = $_GET['id'];
        $showArticle = new \Projet\Models\ArticlesAdminManager();
        $showArticleID = $showArticle->showUpdateArticleManage($id);


        if (isset($_POST['title'], $_POST['title_desc'], $_POST['extract'], $_POST['content'], $_FILES['image'], $_FILES['image_pres'], $_POST['alt']) && !empty($_POST)) {

            $img = $_FILES['image'];
            $img_pres = $_FILES['image_pres'];
            $title=htmlentities($_POST['title']);
            $title_desc=htmlentities($_POST['title_desc']);
            $extract=htmlentities($_POST['extract']);
            $content=htmlentities($_POST['content']);
            $alt=htmlentities($_POST['alt']);

            $image= "app/public/img/image/" . strtolower($img['name']);
            $image_pres= "app/public/img/image/" . strtolower($img_pres['name']);


            $imageun = finfo_open(FILEINFO_MIME_TYPE);
            $imageun = finfo_file($imageun, $img['tmp_name']);
            $imagedeux = finfo_open(FILEINFO_MIME_TYPE);
            $imagedeux = finfo_file($imagedeux, $img_pres['tmp_name']);
            
            if ($imageun === 'image/png' || $imageun === 'image/jpeg' && $imagedeux === 'image/png' || $imagedeux === 'image/jpeg') {

                
                $createArticle = new \Projet\Models\ArticlesAdminManager();
                $createArticle->updateArticleManage($img, $img_pres, $title, $title_desc, $extract, $content, $image, $image_pres, $alt, $id);
                move_uploaded_file($img['tmp_name'], "app/public/img/image/" . $img['name']);
                move_uploaded_file($img_pres['tmp_name'], "app/public/img/image/" . $img_pres['name']);

                header('Location: indexBack.php?action=articlesAdmin');
            } elseif ($imageun === false && $imagedeux === false) {

                $error = "Le format n'est pas détecté";
                echo $error;

            } else {

                $error = "Le format n'est pas jpeg ou png";
                echo $error;

            }
        }
        
        require 'app/Views/back/articleUpdate.php';
        
    }
    // Va permettre de supprimer des articles de la table articles
    function deleteArticle($id){

        $articlesManager = new \Projet\Models\ArticlesAdminManager;
        $deleteArticle = $articlesManager->deleteArticleManage($id);

        header('Location: indexBack.php?action=articlesAdmin');

        require 'app/Views/back/articlesAdmin.php';
    
    }

    // Va permettre de créer des articles dans table articles
    function articleCreate(){
        extract($_POST);
        
        if (isset($_POST['title'], $_POST['title_desc'], $_POST['extract'], $_POST['content'], $_FILES['image'], $_FILES['image_pres'], $_POST['alt']) && !empty($_POST)) {

            $img = $_FILES['image'];
            $img_pres = $_FILES['image_pres'];
            $title=htmlentities($_POST['title']);
            $title_desc=htmlentities($_POST['title_desc']);
            $extract=htmlentities($_POST['extract']);
            $content=htmlentities($_POST['content']);
            $alt=htmlentities($_POST['alt']);

            $image= "app/public/img/image/" . strtolower($img['name']);
            $image_pres= "app/public/img/image/" . strtolower($img_pres['name']);


            $imageun = finfo_open(FILEINFO_MIME_TYPE);
            $imageun = finfo_file($imageun, $img['tmp_name']);
            $imagedeux = finfo_open(FILEINFO_MIME_TYPE);
            $imagedeux = finfo_file($imagedeux, $img_pres['tmp_name']);
            
            if ($imageun === 'image/png' || $imageun === 'image/jpeg' && $imagedeux === 'image/png' || $imagedeux === 'image/jpeg') {

                $createArticle = new \Projet\Models\ArticlesAdminManager();
                $createArticle->createArticleManage($img, $img_pres, $title, $title_desc, $extract, $content, $alt, $image, $image_pres);
                move_uploaded_file($img['tmp_name'], "app/public/img/image/" . $img['name']);
                move_uploaded_file($img_pres['tmp_name'], "app/public/img/image/" . $img_pres['name']);

            } elseif ($imageun === false && $imagedeux === false) {

                $error = "Le format n'est pas détecté";
                echo $error;

            } else {

                $error = "Le format n'est pas jpeg ou png";
                echo $error;

            }
        }
        
        require 'app/Views/back/articleCreate.php';
    }
    
    



//**
// 
//          GESTION DE LA PARTIE MEMBRES
// 
//**



    function gestionMembre(){
         // Va permettre de voir tout les membres de la table users
        function showUsers(){
            $showMembreManage= new \Projet\Models\MembresAdminManager();
            $showUsers = $showMembreManage->showMembreManage();


            return $showUsers;
        }
        $showUsers = showUsers();

        // Va permettre de créer des créers des membres dans la table users
        function createUsers(){
                extract ($_POST);
    
                $validation = true;
                

                $errors = [];
                if(empty($firstName) || empty($name) || empty($email) || empty($emailverif) || empty($password) || empty($passwordverif)){
                    $validation = false;
                    $errors[] = "Tous les champs sont obligatoire !" ;
                }
                else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    $validation = false;
                    $errors[] = "L'adresse email n'est pas valide !";
                }
                else if($emailverif != $email){
                    $validation = false;
                    $errors[] = "L'adresse email de confirmation n'est pas valide !";
                }
                else if($passwordverif != $password){
                    $validation = false;
                    $errors[] = "Le mot de passe de confirmation est incorrect !";
                }   
    
                else if($validation){
    
                    $firstName = $_POST['firstName'];
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $passwordR = $_POST['password'];
    
    
     
                    $inscriptionManager = new \Projet\Models\MembresAdminManager();
                    $inscriptionManager->createMembreManage($firstName,$name,$email,$password);
    
    
                    header('Location: indexBack.php?action=gestionMembre');
               
            }
            return $errors;

        }
        $inscription = createUsers();
  
        require 'app/Views/back/gestionMembre.php';
        
    }

    function upgradeUsers($id){

        $CrochetManager = new \Projet\Models\MembresAdminManager;
        $updateUser = $CrochetManager->upgradeMembreManage($id);

        header('Location: indexBack.php?action=gestionMembre');

        require 'app/Views/back/gestionMembre.php';
    
    }

    function reduceUsers($id){

        $CrochetManager = new \Projet\Models\MembresAdminManager;
        $updateUser = $CrochetManager->reduceMembreManage($id);

        header('Location: indexBack.php?action=gestionMembre');

        require 'app/Views/back/gestionMembre.php';
    
    }

    function deleteUsers($id){

        $CrochetManager = new \Projet\Models\MembresAdminManager;
        $deleteUser = $CrochetManager->deleteMembreManage($id);

        header('Location: indexBack.php?action=gestionMembre');

        require 'app/Views/back/gestionMembre.php';
    
    }



//**
// 
//          GESTION DE LA PARTIE CONTACT
// 
//**



//  Function d'affichage des messages reçu
    function showContact()
    {
        $showContactManage= new \Projet\Models\ContactAdminManager();
        $showContacts = $showContactManage->showContactManage();

        require 'app/Views/back/showContact.php';
    }

    function deleteContact($id){

        $deleteManager = new \Projet\Models\ContactAdminManager;
        $deleteUser = $deleteManager->deleteContactManage($id);

        header('Location: indexBack.php?action=showContact');

        require 'app/Views/back/showContact.php';
    
    }



//**
// 
//          Gestion de la partie INSPÏRATION
// 
//**



    function showInspi()
    {
        $showInspiManage = new \Projet\Models\InspiAdminManager();
        $showInspis = $showInspiManage->showInspiManage();

        require 'app/Views/back/showInspi.php';
    }
    
    function createInspi()
    {
        extract($_POST);
        
        if (isset($_POST['description'], $_POST['alt'], $_FILES['image']) && !empty($_POST)) {

            $img = $_FILES['image'];
            $description=htmlentities($_POST['description']);
            $alt=htmlentities($_POST['alt']);

            $image= "app/public/img/image/" . strtolower($img['name']);


            $imageun = finfo_open(FILEINFO_MIME_TYPE);
            $imageun = finfo_file($imageun, $img['tmp_name']);
            
            if ($imageun === 'image/png' || $imageun === 'image/jpeg') {

                $createInspi = new \Projet\Models\InspiAdminManager();
                $createInspi->createInspiManage($img, $image, $description, $alt );
                move_uploaded_file($img['tmp_name'], "app/public/img/image/" . $img['name']);

            } elseif ($imageun === false) {

                $error = "Le format n'est pas détecté";
                echo $error;

            } else {

                $error = "Le format n'est pas jpeg ou png";
                echo $error;

            }
        }

        require 'app/Views/back/createInspi.php';
    }

    function deleteInspi($id)
    {
        $deleteInspiManage= new \Projet\Models\InspiAdminManager();
        $deleteInspi = $deleteInspiManage->deleteInspiManage($id);

        header('Location: indexBack.php?action=showInspi');

        require 'app/Views/back/showInspi.php';
    }



//**
// 
//          GESTION DE L'ACCES AU PANEL
// 
//**



    function decoAdmin(){
        session_destroy();
        header('Location: /');

        require 'app/Views/back/decoAdmin.php';
    }
}