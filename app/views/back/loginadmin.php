<?php
    include_once "app/Views/back/layouts/head.php";
    include_once "app/Views/back/layouts/header.php";
?>

<main class="container">

    <section class="loginAdmin">
    <h1 class="font-titre">Connexion</h1>

<form method="post" action="">

<?php
if (isset($error)) :
?>

        <div class="">
            <div class="message-erreur">Vos identifiants sont mauvais</div>
        </div>

<?php
endif
?>

        <div class="input-connexion">
            <label for="email" class="font-text">Adresse mail</label>
            <input type="text" name="email" placeholder="" value="<?php if (isset($_POST['email'])) {
    echo $_POST['email'];
} ?>">

            <label for="password" class="font-text">Mot de passe</label>
            <input type="password" name="password" placeholder="" value="<?php if (isset($_POST['password'])) {
    echo $_POST['password'];
} ?>"> 
        </div>

        
        <input class="boutton-co boutton-validation" type="submit" value="Se connecter">
        


</form>

    </section>

</main>

<?php
    include_once "app/Views/back/layouts/head.php";
?>