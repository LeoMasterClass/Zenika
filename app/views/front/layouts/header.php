<!-- Header -->
<header class="header">
    <!-- Barre de connexion pour le compte utilisateur -->
        <div class="barre-connexion">
            <ul>

                <?php if(isset($_SESSION['email'])) : ?>
                <li><a href="compte" class="font-balloo-chettan">Mon compte</a></li>
                <li><a href="deconnexion" class="font-balloo-chettan">Deconnexion</a></li>
                <?php else : ?>
                <li><a href="inscription" class="font-balloo-chettan">Inscription</a></li>
                <li><a href="connexion" class="font-balloo-chettan">Connexion</a></li>
                <?php endif ?>
            </ul>
        </div>

    <!-- Logo du site -->
        <a class="bandeau-header" href="/"><img src="app/public/img/image/Bandeaulogo.png" alt="Logo CatEvents"></a>

    <!-- barre de navigation du site -->
        <nav class="barre-navigation">
            <input type="checkbox" id="navigation-mobile" role="button">
            <label for="navigation-mobile" class="navigation-mobile"><img src="app/public/img/image/burger-menu-icon-14.jpg"
                    alt="menu button"></label>
            <ul>
                <a href="/" class="font-nav"><li>Accueil</li></a>
                <a href="concept" class="font-nav"><li>Le concept</li></a>
                <a href="quisuisje" class="font-nav"><li>Qui suis-je ?</li></a>
                <a href="DIY" class="font-nav"><li>DIY</li></a>
                <a href="inspirations" class="font-nav"><li>Inspirations</li></a>
                <a href="travaux" class="font-nav"><li>La boutique</li></a>
                <a href="contact" class="font-nav"><li>Me contacter</li></a>
            </ul>
        </nav>

    </header>