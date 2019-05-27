<?php session_start(); ?>

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
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto">
            <h2 class="text-white mb-4"></h2>
            <p class="text-white-50">


    </section>

    <!-- Projects Section -->
    <section id="projects" class="projects-section bg-light">
      <div class="container">
          
        <h1>Connexion</h1>
        <form method="post" action="login.php">
            <p>
                <label for="email">Email : </label><input type="email" name="email" required/> <br /><br />
                <label for="password">Mot de passe : </label><input type="password" name="password" required/> <br /><br />
                <input type="submit" name="submit" value="Connexion" />
            </p>
            
            <?php
            if (isset($_POST['submit'])) { //vérifications formulaire
                $email = $_POST['email'];
                $password = $_POST['password'];
                $connexion = new PDO('mysql:host=localhost;dbname=hagla', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                $requete = 'SELECT * FROM membre WHERE email = "'.$email.'"';
                
                foreach ($connexion->query($requete) as $row) {
                    if ($password == $row['pass_md5']) {
                        echo "Vous êtes connecté !";
                        $_SESSION['id'] = $row['id'];
                        $_SESSION['pseudo'] = $row['login'];
                        $_SESSION['email'] = $row['email'];
                        $_SESSION['password'] = $row['pass_md5'];
                        $_SESSION['lvlepsi'] = $row['lvlepsi'];
                        $_SESSION['date_inscription'] = $row['date_inscription'];
                    }
                }
            }
            if (isset($_SESSION['pseudo'])) {
                header('Location: moncompte.php');
            }
            ?>
        </form>
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

