<?php
include_once "app/Views/front/layouts/head.php";
include_once "app/Views/front/layouts/header.php"
?>


<main class="container">

    <section class="inspiration">  
        <h1 class="font-titre">Inspirations</h2>
        <article>
            <?php while($postimage = $postimages->fetch()) : ?>

            <img src="<?= $postimage['image'] ?>" alt="<?= $postimage['alt'] ?>">

            <?php endwhile ?>
        </article>
    </section>

</main>


<?php
include_once 'app/Views/front/layouts/footer.php'
?>