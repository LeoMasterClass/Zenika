<?php 
    include_once "app/Views/back/layouts/head.php";
    include_once "app/Views/back/layouts/header.php";
    if(!empty($_POST)){
        $errors = $inscription;
    }
    // $delai=1; 
    // $url='indexBack.php?action=gestionMembre';
    // header("Refresh: $delai;url=$url");
?>


<main class="container">

    <section class="membre-panel">


    <table class="table">

        <tr>

            <th class="font-text">ID</th>
            <th class="font-text">Email</th>
            <th class="font-text">Nom de famille</th>
            <th class="font-text">Prénom</th>
            <th class="font-text">Date de création</th>
            <th class="font-text">Admin</th>
            <th class="font-text">Accès panel</th>
            <th class="font-text">Supprimer</th>

        </tr>


        <?php while($showUser = $showUsers->fetch()) : ?>
        <tr>

            <td class="text-align"><?= $showUser['id'] ?></td>
            <td><a href="index.php?action="><?= $showUser['email'] ?></a></td>
            <td><?= $showUser['firstName'] ?></td>
            <td><?= $showUser['name'] ?></td>
            <td class="text-align"><?= date('d-m-Y', strtotime($showUser['created_at'])) ?></td>
            <?php if($showUser['admin'] == 1) : ?>
            <td class="text-align">Oui</td>
            <?php else : ?>
            <td class="text-align">Non</td>
            <?php endif; ?>
            <td class="icon_updown_admin"><a href="indexBack.php?action=upgradeMembre&id=<?= $showUser['id'] ?>"><i class="icon-panel fas fa-plus"></i></a><a href="indexBack.php?action=reduceMembre&id=<?= $showUser['id'] ?>"><i class="icon-panel fas fa-minus"></i></a></td>
            <td><a href="indexBack.php?action=deleteMembre&id=<?= $showUser['id'] ?>"><i class="icon-panel fas fa-window-close"></i></a></td>       

        </tr>
        <?php endwhile ?>
        
    </table>

  

    <div class="create-member">

    <form method="post" action="">

<?php 
if(isset($errors)):
      if($errors) :  
        foreach($errors as $error) :
    ?>

            <div class="message-erreur"><?= $error ?></div>

    <?php 
    endforeach;
    else :
    
    ?>

            <div class="message-confirmation">L'inscription est validé </div>

<?php 
endif; 
endif

      
?>

    <div class="input-inscription">
            <label for="firstName" class="font-titre">Nom</label>
            <input type="text" name="firstName" placeholder="" value="<?php if(isset($_POST["firstName"]))echo $_POST["firstName"] ?>">

            <label for="name" class="font-titre">Prénom</label>
            <input type="text" name="name" placeholder="" value="<?php if(isset($_POST["name"]))echo $_POST["name"] ?>">

            <label for="email" class="font-titre">Adresse mail</label>
            <input type="text" name="email" placeholder="" value="<?php if(isset($_POST["email"]))echo $_POST["email"] ?>">

            <label for="emailverif" class="font-titre">Confirmer l'adresse mail</label>
            <input type="text" name="emailverif" placeholder="" value="<?php if(isset($_POST["emailverif"]))echo $_POST["emailverif"] ?>">

            <label for="password" class="font-titre">Mot de passe</label>
            <input type="password" name="password" placeholder="" value="<?php if(isset($_POST["password"]))echo $_POST["password"] ?>">

            <label for="passwordverif" class="font-titre">Confirmer le mot de passe</label>
            <input type="password" name="passwordverif" placeholder="" value="<?php if(isset($_POST["passwordverif"]))echo $_POST["passwordverif"] ?>">


    </div>

        <div class="envoieinscri">
            <input class="font-titre" type="submit" value="Inscrire un nouveau membre">
        </div>

</form>
    
    </div>

    </section>

</main>


<?php
    include_once "app/Views/back/layouts/head.php";
?>