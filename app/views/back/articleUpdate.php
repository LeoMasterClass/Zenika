<?php
    include_once "app/Views/back/layouts/head.php";
    include_once "app/Views/back/layouts/header.php";
?>

<main class="container">
    <section class="panel-article-modif">

    <article class="articles">

    <?php while ($article = $showArticleID->fetch()) : ?>
    
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
                <label for="title" class="font-muli">Titre:</label>
                <p class="font-anton">Texte de base    >    <?= $article['title'] ?></p>
                    <input type="text" name="title" placeholder="<?= $article['title'] ?>" value="<?php if(isset($_POST["title"]))echo $_POST["title"] ?>">
                </div>
                <div class="input-creation-article">
                <label for="title_desc" class="font-muli">Titre de description:</label>
                <p class="font-anton">Texte de base    >    <?= $article['title_desc'] ?></p>
                    <input type="text" name="title_desc" placeholder="<?= $article['title_desc'] ?>" value="<?php if(isset($_POST["title_desc"]))echo $_POST["title_desc"] ?>">
                </div>
                <div class="input-creation-article">
                <label for="extract" class="font-muli">Texte de description de l'article:</label>
                <p class="font-anton">Texte de base    >    <?= $article['extract'] ?></p>
                    <textarea name="extract" cols="40" rows="10" placeholder="<?= $article['extract'] ?>"<?php if(isset($_POST["extract"]))echo $_POST["extract"] ?>></textarea>
                </div>
                <div class="input-creation-article">
                <label for="content" class="font-muli">Texte de l'article:</label>
                <p class="font-anton">Texte de base    >    <?= $article['content'] ?></p>
                    <textarea name="content" cols="40" rows="10" placeholder="<?= $article['content'] ?>"<?php if(isset($_POST["content"]))echo $_POST["content"] ?>></textarea>
                </div>
                <div class="input-creation-article">
                <label for="image" class="font-muli">Image de bannière:</label>
                <p class="font-anton">Image de base    >    <?= $article['image'] ?></p>
                    <input type="hidden" name="MAX_FILE_SIZE" value="2097152" />
                    <input type="file"  name="image">
                    <span><?php if(isset($error) && !empty($_FILES)){echo $error;}?></span>
                </div>
                <div class="input-creation-article">
                <label for="image_pres" class="font-muli">Image présentation DIY:</label>
                <p class="font-anton">Image de base    >    <?= $article['image_pres'] ?></p>
                    <input type="hidden" name="MAX_FILE_SIZE" value="2097152" />
                    <input type="file"  name="image_pres">
                    <span><?php if(isset($error) && !empty($_FILES)){echo $error;}?></span>
                </div>
                <div class="input-creation-article">
                <label for="alt" class="font-muli">Titre de référencement:</label>
                    <p class="font-anton">Texte de base    >    <?= $article['alt'] ?></p>
                    <input type="text" name="alt" placeholder="<?= $article['alt'] ?>" value="<?php if(isset($_POST["alt"]))echo $_POST["alt"] ?>">
                </div>
            </div>

            <div class="bouton-creation">
                <input class="envoie-contact font-balloo" type="submit" value="Modifier" >
            </div>

        </form>

    <?php endwhile ?>

</article>

    </section>
</main>

<?php
    include_once "app/Views/back/layouts/head.php";
?>