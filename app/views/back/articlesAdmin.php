<?php 
    include_once "app/Views/back/layouts/head.php";
    include_once "app/Views/back/layouts/header.php";
?>


<main class="container">

    <section class="article-panel">
    
    <table class="table">
    <tr>
            <th class="font-text">ID</th>
            <th class="font-text">Titre</th>
            <th class="font-text">Description</th>
            <th class="font-text">Date de création</th>
            <th class="font-text">Modifier</th>
            <th class="font-text">Supprimer</th>
        </tr>
    
        <?php while($showTable = $showTables->fetch()) : ?>
        <tr>
            <td class="text-align"><?= $showTable['id'] ?></td>
            <td><a href="index.php?action=article&id=<?= $showTable['id'] ?>"><?= $showTable['title'] ?></a></td>
            <td><?= $showTable['extract'] ?></td>
            <td><?= date('d-m-Y', strtotime($showTable['created_at'])) ?></td>
            <td><a href="edition-article-<?= $showTable['id'] ?>"><i class="icon-panel fas fa-edit"></i></a></td>
            <td><a href="indexBack.php?action=deleteArticle&id=<?= $showTable['id'] ?>"><i class="icon-panel fas fa-window-close"></i></a></td>       
        </tr>
        <?php endwhile ?>
        
    </table>
    <div class="bouton-add"><a href="article-creation"><button class="add">Ajouter</button></a></div>

    </section>

</main>


<?php
    include_once "app/Views/back/layouts/head.php";
?>