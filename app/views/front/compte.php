<?php
    include_once "app/Views/front/layouts/head.php";
    include_once "app/Views/front/layouts/header.php";

?>
<main class="container">


<section class="compte_utilisateur information_utilisateur">

    <h2 class="font-titre">Vos informations</h2>
    <?php while($info = $compte->fetch()) : ?>

        <p class="font-texte">Votre adresse email:  <?= $info['email'] ?></p>
        <p class="font-texte">Votre nom:  <?= $info['firstName'] ?></p>
        <p class="font-texte">Votre prénom:  <?= $info['name'] ?></p>

    <?php endwhile ?>

</section>

<section class="compte_utilisateur information_commande">

    <h2 class="font-titre">Vos commandes</h2>  
        
        <p>A venir..</p>

</section>

</main>
<?php
include_once 'app/Views/front/layouts/footer.php'
?>