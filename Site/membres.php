<?php session_start();

if (!isset($_SESSION['pseudo'])) {
                    header('Location: index.php');
}

?>

<!DOCTYPE html>
<html Fr="en fr">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Hagla</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/grayscale.min.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Hagla-Organisation de tournois</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fas fa-bars"></i>
        </button>
         <?php include("menu.php"); ?>
      </div>
    </nav>

    <!-- Header -->

    <!-- About Section -->
    <section id="about" class="about-section text-center">
            <h2 class="text-white mb-4"></h2>
              <p class="text-white-50"></p>


    </section>

    <!-- Projects Section -->
    <section id="projects" class="projects-section bg-light">
      <div class="container">
        Bienvenue <?php echo $_SESSION['pseudo']; ?> !<br />

        <?php
            $bdd = new PDO('mysql:host=localhost;dbname=hagla', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            $reponse = $bdd->query('SELECT * FROM `membre`');
          ?>
              <table>
                 <tr>
                    <td>Pseudo</td>
                    <td>Jeux</td>
                    <td>Date d'inscription</td>
                    <td>Niveau à l'EPSI</td>
                  </tr>
                  <?php while ($donnees = $reponse->fetch())
                      { ?>
                  <tr>
                      <td><?php echo $donnees['login']; ?></td>
                      <td>
                    <?php $repJeu = $bdd->query("SELECT * FROM `jeu`, `membre_jeu` WHERE MEMBRE_JEU.ID_MEMBRE = ".$donnees['id']." AND JEU.ID_JEU = MEMBRE_JEU.ID_JEU LIMIT 3"); ?>
                                <?php while ($donneesJeu = $repJeu->fetch()) { echo '<a href=jeu'.$donneesJeu['id_jeu'].'>'.$donneesJeu['libelle_jeu'].'</a> | '; } ?>
                      </td>
                      <td><?php echo $donnees['date_inscription']; ?></td>
                      <td><?php echo $donnees['lvlepsi']; ?></td>
                 </tr>
                  <?php } ?>
            </table>
        <?php
            $reponse->closeCursor();
        ?>
    </div>
    </section>

    <!-- Footer -->
    <?php include "inc/footer.php"?>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/grayscale.min.js"></script>

  </body>

</html>