<?php
    include_once "app/Views/front/layouts/head.php";
    include_once "app/Views/front/layouts/header.php";
?>


<main class="container">


        <section class="diy">

            <h1 class="titre-diy font-titre">Do It Yourself</h1>

        <div class="diy">

        <?php while($article = $diy->fetch()) : ?>

        <article>

            <img src="<?= $article['image_pres'] ?>" alt="<?= $article['alt'] ?>">

                <div class="hoverDIY">
                    <a href="index.php?action=article&id=<?= $article['id'] ?>"><h2 class="font-texte"><?= $article['title_desc'] ?></h2></a>
                </div>

        </article>

        <?php endwhile ?>

        </div>

    </section>


    
</main>


<?php
include_once 'app/Views/front/layouts/footer.php'
?>