<?php
include_once "app/Views/front/layouts/head.php";
include_once "app/Views/front/layouts/header.php";

?>

<main class="container">

<article class="articles">

    <?php while($article = $articles->fetch()) : ?>

    <img src="<?= $article['image'] ?>" alt="">

    <h2 class="font-texte"><?= $article['title'] ?></h2>

    <p class="font-texte"><?= $article['content'] ?></p>

    <?php endwhile ?>

</article>

</main>

<?php
include_once "app/Views/front/layouts/footer.php"
?>