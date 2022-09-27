<?php 
    include_once "app/Views/back/layouts/head.php";
    include_once "app/Views/back/layouts/header.php";
?>


<main class="container">

    <section class="article-panel">
    
    <table class="table">
    <tr>
            <th class="font-text">ID</th>
            <th class="font-text">Nom</th>
            <th class="font-text">Email</th>
            <th class="font-text">Objet</th>
            <th class="font-text">Message</th>
            <th class="font-text">Date de réception</th>
            <th class="font-text">Supprimer</th>
        </tr>
    
        <?php while($showContact = $showContacts->fetch()) : ?>
        <tr>
            <td class="text-align"><?= $showContact['id'] ?></td>
            <td><?= $showContact['name'] ?></td>
            <td><?= $showContact['email'] ?></td>
            <td><?= $showContact['objet'] ?></td>
            <td><?= $showContact['content'] ?></td>
            <td><?= date('d-m-Y', strtotime($showContact['created_at'])) ?></td>
            <td><a href="indexBack.php?action=deleteContact&id=<?= $showContact['id'] ?>"><i class="icon-panel fas fa-window-close"></i></a></td>       
        </tr>
        <?php endwhile ?>
        
    </table>
    </section>

</main>


<?php
    include_once "app/Views/back/layouts/head.php";
?>