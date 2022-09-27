<?php 
    include_once "app/Views/back/layouts/head.php";
    include_once "app/Views/back/layouts/header.php";
?>
<main class="container">
    <section class="creation-inspi">

        <form method="post" enctype="multipart/form-data" action="">
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
                    <div class="message-confirmation">Votre article a bien était posté !</div>
                </div>
            </div>
            <?php
            endif;
            endif
            ?>
            <div class="input-creation-inspi">
                <div class="input-creation-article">
                <label for="description" class="font-texte">Description:</label>
                    <input type="text" name="description" placeholder="" value="<?php if(isset($_POST["title"]))echo $_POST["title"] ?>">
                </div>
                <div class="input-creation-article">
                <label for="alt" class="font-texte">Alt:</label>
                    <input type="text" name="alt" placeholder="" value="<?php if(isset($_POST["title_desc"]))echo $_POST["title_desc"] ?>">
                </div>

                <div class="input-creation-article">
                <label for="image" class="font-texte">Image présentation DIY:</label>
                    <input type="hidden" name="MAX_FILE_SIZE" value="2097152" />
                    <input type="file"  name="image">
                    <span><?php if(isset($error) && !empty($_FILES)){echo $error;}?></span>
                </div>
            </div>

            <div class="bouton-creation">
                <input class="envoie-contact font-balloo" type="submit" value="Créer" >
            </div>

        </form>

    </section>
</main>
<?php
    include_once "app/Views/back/layouts/head.php";
?>