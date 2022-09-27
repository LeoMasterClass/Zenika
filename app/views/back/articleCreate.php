<?php 
    include_once "app/Views/back/layouts/head.php";
    include_once "app/Views/back/layouts/header.php";
if(!empty($_POST)){
    $errors = $createArticle;
}
?>
<main class="container">
    <section class="panel-article-creation">

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
            <div class="">
                <div class="input-creation-article">
                <label for="title" class="font-texte">Titre:</label>
                    <input type="text" name="title" placeholder="" value="<?php if(isset($_POST["title"]))echo $_POST["title"] ?>">
                </div>
                <div class="input-creation-article">
                <label for="title_desc" class="font-texte">Titre de description:</label>
                    <input type="text" name="title_desc" placeholder="" value="<?php if(isset($_POST["title_desc"]))echo $_POST["title_desc"] ?>">
                </div>
                <div class="input-creation-article">
                <label for="extract" class="font-texte">Texte de description de l'article:</label>
                    <textarea name="extract" cols="40" rows="10" placeholder=""<?php if(isset($_POST["extract"]))echo $_POST["extract"] ?>></textarea>
                </div>
                <div class="input-creation-article">
                <label for="content" class="font-texte">Texte de l'article:</label>
                    <textarea name="content" cols="40" rows="10" placeholder=""<?php if(isset($_POST["content"]))echo $_POST["content"] ?>></textarea>
                </div>
                <div class="input-creation-article">
                <label for="image" class="font-texte">Image de bannière:</label>
                    <input type="hidden" name="MAX_FILE_SIZE" value="2097152" />
                    <input type="file"  name="image">
                    <span><?php if(isset($error) && !empty($_FILES)){echo $error;}?></span>
                </div>
                <div class="input-creation-article">
                <label for="image_pres" class="font-texte">Image présentation DIY:</label>
                    <input type="hidden" name="MAX_FILE_SIZE" value="2097152" />
                    <input type="file"  name="image_pres">
                    <span><?php if(isset($error) && !empty($_FILES)){echo $error;}?></span>
                </div>
                <div class="input-creation-article">
                <label for="alt" class="font-texte">Titre de référencement:</label>
                    <input type="text" name="alt" placeholder="" value="<?php if(isset($_POST["alt"]))echo $_POST["alt"] ?>">
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