<?php
include_once "app/Views/front/layouts/head.php";
include_once "app/Views/front/layouts/header.php";
include_once 'app/controllers/ControllerFront.php';
if(!empty($_POST)){
    $errors = $contact;
}
?>

<main class="container">

    <div class="contact-split">

    <section class="contact">

    <div class="alert"></div>

    <form id="contact-form" method="post" action="">
        <?php
            if(isset($errors)) :
            if($errors) :
            foreach($errors as $error) : 
        ?>
            <div class="row">
                <div class="col-xs-12">
                    <div class="message-erreur"><?= $error ?></div>
                </div>
            </div>
            <?php
            endforeach;
            else :
            ?>
            <div class="row">
                <div class="col-xs-12">
                    <div class="message-confirmation">Votre message a bien était envoyé !</div>
                </div>
            </div>
            <?php
            endif;
            endif
            ?>

                <div class="input-contact">
                <label for="nom" class="font-texte">Votre Nom(obligatoire)</label>
                    <input type="text" id="name" name="nom" placeholder="" value="<?php if(isset($_POST['nom']))echo $_POST['nom'] ?>">
                </div>
                <div class="input-contact">
                <label for="email" class="font-texte">Votre Email(obligatoire)</label>
                    <input type="text" id="email" name="email" placeholder="" value="<?php if(isset($_POST['email']))echo $_POST['email'] ?>">
                </div>
                <div class="input-contact">
                <label for="objet" class="font-texte">Objet</label>
                    <input type="text" id="objet" name="objet" placeholder="" value="<?php if(isset($_POST['objet']))echo $_POST['objet'] ?>">
                </div>
                <div class="input-contact">
                <label for="texte" class="font-texte">Votre message</label>
                    <textarea name="texte" cols="40" rows="10" id="message" placeholder=""<?php if(isset($_POST['content']))echo $_POST['content'] ?>></textarea>
                </div>

            <input class="envoie-contact font-balloo" type="submit" id="submit" value="Envoyer">

        </form>

        </section>
        <div class="map">
            <h2 class="font-titre">Ou me trouver:</h2>
            <div id="map"></div>
        </div>

    </div>

</main>


<?php
include_once 'app/Views/front/layouts/footer.php'
?>