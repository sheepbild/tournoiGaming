<div class="collapse navbar-collapse" id="navbarResponsive">
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="projects.php">Tournois</a>
        </li>
        
        
        <?php
            if (!isset($_SESSION['pseudo'])) {
        ?>
        
        
        <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="signup.php">Inscription</a>
        </li>
        <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="login.php">Connexion</a>
        </li>
        
        
        <?php
            } else {
        ?>
        
        
        <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="moncompte.php">Mon compte</a>
        </li>
        <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="membres.php">Communauté</a>
        </li>
        <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="deconnexion.php">Deconnexion</a>
        </li>
        
        
        <?php
            }
        ?>
        
        
    </ul>
</div>