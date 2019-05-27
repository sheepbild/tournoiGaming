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
            <h2 class="text-white mb-4"></h2>
              <p class="text-white-50"></p>


    </section>

    <!-- Projects Section -->
    <section id="projects" class="projects-section bg-light">
      <div class="container">
        <h1>Inscription</h1>
        <form method="post" action="signup.php">
            <p>
                <?php if (!isset($_POST['submit'])) { ?>
                <fieldset>
                    <legend>Compte</legend>
                    <label for="login">Pseudo : </label><input type="text" name="login" required/> <br /><br />
                    <label for="email">Email : </label><input type="email" name="email" required/> <br /><br />
                    <label for="password">Mot de passe : </label><input type="password" name="password" required/> <br /><br />
                </fieldset>
                <fieldset>
                    <legend>Plus..</legend>
                    <label>Elève EPSI : </label><br />
                    <input type="radio" name="lvlepsi" value="b1" id="b1" /> <label for="b1">EPSI Bachelor 1</label>
                    <input type="radio" name="lvlepsi" value="b2" id="b2" /> <label for="b2">EPSI Bachelor 2</label>
                    <input type="radio" name="lvlepsi" value="i3" id="i3" /> <label for="i3">EPSI Ingénieur 3</label>
                    <input type="radio" name="lvlepsi" value="i4" id="i4" /> <label for="i4">EPSI Ingénieur 4</label>
                    <input type="radio" name="lvlepsi" value="i5" id="i5" /> <label for="i5">EPSI Ingénieur 5</label><br />
                    <label>Ou alors : </label><br />
                    <input type="radio" name="lvlepsi" value="prof" id="prof" /> <label for="prof">Enseignant</label>
                    <input type="radio" name="lvlepsi" value="ext" id="ext" /> <label for="ext">Externe</label><br /><br />
                </fieldset>
                <input type="submit" name="submit" value="Inscription" />
                <?php } ?>
            </p>
            
            <?php
            if (isset($_POST['submit'])) { //vérifications formulaire
                if (strlen($_POST['login'])>=5) {
                    if (strlen($_POST['password'])>=7) {
                        $login = $_POST['login'];
                        $email = $_POST['email'];
                        $password = $_POST['password'];
                        $lvlepsi = $_POST['lvlepsi'];
                        $date = date("d-m-Y");

                        $connexion = new PDO('mysql:host=localhost;dbname=hagla', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

                        $req = $connexion->prepare('INSERT INTO membre(id, login, email, pass_md5, date_inscription, lvlepsi) VALUES(:id, :login, :email, :password, :date_inscription, :lvlepsi)');
                        $req->execute(array(
                            'id' => NULL,
                            'login' => $login,
                            'email' => $email,
                            'password' => $password,
                            'date_inscription' => $date,
                            'lvlepsi' => $lvlepsi
                            ));

                        
                        echo "Inscription réussie ! Vous allez être redirigé... <br /><a href='login.php'>Connexion</a>";
                        header("refresh:2;url=login.php");
                    } else {
                        echo "Le mot de passe doit faire au minimum 7 caractères";
                    }
                } else { 
                    echo "Le pseudo doit faire au minumum 5 caractères";
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

