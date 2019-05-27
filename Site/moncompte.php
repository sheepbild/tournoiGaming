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
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto">
            <h2 class="text-white mb-4"></h2>
            <p class="text-white-50">


    </section>

    <!-- Projects Section -->
    <section id="projects" class="projects-section bg-light">
      <div class="container">
          
        <?php
        echo '<h1>Mon compte - '. $_SESSION['pseudo'] .'</h1>';
        ?>
          <hr />
          <h2>Mes jeux</h2>
          
          <?php 
          $bdd = new PDO('mysql:host=localhost;dbname=hagla', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            
            $reponse = $bdd->query("SELECT *
                                    FROM `jeu`, `membre_jeu`
                                    WHERE MEMBRE_JEU.ID_MEMBRE = ".$_SESSION['id']." AND JEU.ID_JEU = MEMBRE_JEU.ID_JEU");
            
            while ($donnees = $reponse->fetch()) { echo '&#x274C; ' . $donnees['libelle_jeu']."<br />"; }
          ?>
          
          <!-- AJOUTER UN JEU -->
          
          <h2>Ajouter un jeu</h2>
          <form method="post" action="moncompte.php">
            <p>
              <?php
                $repJeu = $bdd->query("SELECT * FROM `jeu` ORDER BY LIBELLE_JEU");
              ?>
                <select name="jeu" id="jeu">
                <?php while ($donneesJeu = $repJeu->fetch()) { ?>
                        <option value="<?php echo $donneesJeu['id_jeu'] ?>"><?php echo $donneesJeu['libelle_jeu']?></option>
                <?php } ?>
                    </select>
                </select>
                <input type="submit" name="ajoutJeu" value="Ajouter" />
               <?php
                    if (isset($_POST['ajoutJeu'])) {
                        $count = $base->prepare("SELECT COUNT(*) AS nbr FROM membre_jeu WHERE id_membre=15 AND id_jeu=3");
                        $count->execute(array($_POST['']));
                        $req  = $count->fetch(PDO::FETCH_ASSOC);

                        if($req['nbr']==0) {
                            $idMembre = $_SESSION['id'];
                            $idJeu = $_POST['jeu'];
                            $requete = $bdd->prepare('INSERT INTO membre_jeu(id_membre, id_jeu) VALUES(:idMembre, :idJeu)');
                            $requete->execute(array(
                                'idMembre' => $idMembre,
                                'idJeu' => $idJeu
                            ));
                            header("refresh:0.1;url=moncompte.php");
                        }
                    }
                ?>
            </p>
        </form>
            <h2>Proposer un tournoi</h2>
            <p>
                <form method="post" action="moncompte.php">
                    <select name="jeu" id="jeu">
                        <?php $repJeu = $bdd->query("SELECT *
                                                    FROM `jeu`, `membre_jeu`
                                                    WHERE MEMBRE_JEU.ID_MEMBRE = ".$_SESSION['id']." AND JEU.ID_JEU = MEMBRE_JEU.ID_JEU");
                        while ($donneesJeu = $repJeu->fetch()) { ?>
                            <option value="<?php echo $donneesJeu['id_jeu'] ?>"><?php echo $donneesJeu['libelle_jeu']?></option>
                        <?php } ?>
                    </select><br />
                    Nombre de participants max. : 
                    <input type="number" name="nbParticipants" min='2' max='20'/><br />
                    <input type="submit" name="creerTournoi" value="Créer" />
                    <?php
                    if (isset($_POST['creerTournoi'])) { //vérifications formulaire
                        if (isset($_POST['jeu'])) {
                            if (isset($_POST['nbParticipants'])) {
                                $idJeu = $_POST['jeu'];
                                $nbParticipants = $_POST['nbParticipants'];
                                $date = date("d-m-Y");
                                
                                $req = $bdd->prepare('INSERT INTO tournoi(id, idJeu, idCreateur, maxiJoueurs, date, confirme) VALUES(:id, :idJeu, :idCreateur, :maxiJoueurs, :date, :confirme)');
                                $req->execute(array(
                                    'id' => NULL,
                                    'idJeu' => $_POST['jeu'],
                                    'idCreateur' => $_SESSION['id'],
                                    'maxiJoueurs' => $_POST['nbParticipants'],
                                    'date' => $date,
                                    'confirme' => 0
                                    ));

                            }
                        }
                    } ?>
                </form>
            </p>
          </div>
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

