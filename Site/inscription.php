    <?php
        if (!isset($_SESSION['pseudo'])) {
    ?>
        <div class="row">
          <div class="col-md-10 col-lg-8 mx-auto text-center">

            <i class="far fa-paper-plane fa-2x mb-2 text-white"></i>
            <h2 class="text-white mb-5">Inscrivez vous!</h2>

            <form class="form-inline d-flex">
                <input type="text" class="form-control flex-fill mr-0 mr-sm-2 mb-3 mb-sm-0" id="inputEmail" placeholder="Entrer votre pseudo..." name="pseudo" required>
                <input type="email" class="form-control flex-fill mr-0 mr-sm-2 mb-3 mb-sm-0" id="inputEmail" placeholder="Entrer votre email..." name="email" required>
                <input type="password" class="form-control flex-fill mr-0 mr-sm-2 mb-3 mb-sm-0" id="inputEmail" placeholder="Entrer votre mot de passe..." name="password" required>
                <input type="password_confirm" class="form-control flex-fill mr-0 mr-sm-2 mb-3 mb-sm-0" id="inputEmail" placeholder="Confirmer votre mot de passe..." name="password" required>
              <button type="submit" class="btn btn-primary mx-auto">S'inscrire</button>
            </form>

          </div>
        </div>
            <?php
        }
            ?>
            <?php
            
            
          
            if (isset($_POST['submit'])) { //vérifications formulaire

                if (strlen($_POST['pseudo']) >= 5) {

                    if (strlen($_POST['password']) >= 7) {

                        if ($_POST['password'] == $_POST['password_confirm']) {
                            $bdd = new PDO('mysql:host=localhost;dbname=hagla', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                            $date_inscription=date('d').'/'.date('m').'/'.date('y');
                            $inscription = $bdd->prepare("INSERT INTO membre(login,email,pass_md5,lvlepsi,date_inscription) VALUES('$_POST[pseudo]','$_POST[email]','$_POST[password]','$_POST[lvlepsi]','$date_inscription')");
                            $inscription->execute(array('$_POST[pseudo]','$_POST[email]','$_POST[password]','$_POST[lvlepsi]','$date_inscription'));

                        } else {
                            echo '<p>Les deux mots de passe ne correspondent pas</p>';
                        }
                    } else {
                        echo '<p>Le mot de passe doit être d\'au moins 7 caractères</p>';
                    }
                } else {
                    echo '<p>Le pseudo doit être d\'au moins 5 caractères</p>';
                }
            }

                if (isset($_SESSION['pseudo'])) {
                    echo '<p>Salut '. $_SESSION['pseudo'] .', tu es déjà inscrit !</p>';
                }

            ?>