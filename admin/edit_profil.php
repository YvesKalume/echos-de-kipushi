<?php
session_start();
require_once '../vendor/autoload.php';
if (!session_id()) @session_start();
$msg = new \Plasticbrain\FlashMessages\FlashMessages();
if (!isset($_SESSION) OR $_SESSION['is_admin']!=1 OR $_SESSION['status']!=200) {
    header('Location: login.php');
}
require_once '../config/functions.php';
require_once '../config/connection.php';
if (isset($_POST['submit'])) {
    if (!empty($_POST['titre']) AND !empty($_POST['date']) AND !empty($_POST['heure']) AND !empty($_POST['lieu']) AND !empty($_POST['description'])) {
        $titre=htmlspecialchars($_POST['titre']);
        $date=htmlspecialchars($_POST['date']);
        $heure=htmlspecialchars($_POST['heure']);
        $lieu=htmlspecialchars($_POST['lieu']);
        $description=htmlspecialchars($_POST['description']);
        $flayer=formatname($titre.' du '.$date);
        $tmpflayer=$_FILES['flayer']['tmp_name'];
        // l'extension du fichier affiche
        $flayer_extension= pathinfo($_FILES['flayer']['name'])['extension'] ;
        // les extension authorisées
        $flayerfile_authorized= array('jpg', 'png','PNG','JPG','JPEG');
        // on verife si les extension des fichiers correspondent aux extensions authorisées
        if (in_array($flayer_extension, $flayerfile_authorized))
        {
            if (!file_exists('../affiches/'.$flayer.'.'.$flayer_extension)) {
                try {
                    $database->events()->insert(array(
                        'titre'=>$titre,
                        'date'=>$date,
                        'heure'=>$heure,
                        'lieu'=>$lieu,
                        'description'=>$description,
                        'flayer'=>$flayer.'.'.$flayer_extension,
                        'users_id'=>$_SESSION['id'],
                    ));
                    move_uploaded_file($tmpflayer,'../affiches/'.$flayer.'.'.$flayer_extension);
                    $msg->success('Evènement enregistré','index.php');
                } catch (Exception $e) {
                  $msg->error('erreur serveur, veuillez réessayer','index.php');
                }
            }else {
              $msg->error('cet évènement existe déjà','index.php');
            }
        }else {
          $msg->error ('l\'affiche de votre évènement doit être une image au format valide','index.php');
        }
    }else {
      $msg->error('veuillez remplir correctement tous les camps','index.php');
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <?php require_once 'includes/head.php'; ?>
      <link rel="stylesheet" href="assets/css/wbbtheme.css">
      <script src="assets/js/plugins/jquery/dist/jquery.min.js"></script>
      <!-- script pour editeur wysiwyg -->
      <script src="assets/js/jquery.wysibb.min.js"></script>
      <script src="js/lang/fr.js"></script>
      <script>
            $(document).ready(function() {
	          $("#editeur").wysibb(wbbOpt);
	          });
      </script>
  <title>Admin</title>
</head>

<body>
<nav class="navbar navbar-vertical fixed-left navbar-expand-md bg-white" id="sidenav-main">
    <?php require_once 'includes/nav.php'; ?>
</nav>
  <div class="main-content">
    
    <!-- Navbar horizontal -->
  <?php require_once 'includes/horizontal-nav.php'; ?>
    <!-- End Navbar -->
    <!-- Header -->
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
      <div class="container-fluid">
        <div class="header-body">
          <!-- Space -->
        </div>
      </div>
    </div>
      <!-- edit zone -->
      <div class="container-fluid mt--7">
      <div class="row">
        <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
          <!--right space -->
        </div>
        <div class="col-xl-8 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Modifier Mes coordonnées</h3>
                </div>
                <form method="post">
                <div class="col-4 text-right float-right">
                  <input type="submit" class="btn btn-sm btn-primary" value="Enregistrer"S>
                </div>
              </div>
            </div>
            <div class="card-body">
                <h6 class="heading-small text-muted mb-4">User information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Nom & Post-Nom</label>
                        <input name="name" type="text" id="input-username" class="form-control form-control-alternative" placeholder="Nom & Post-Nom">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Email</label>
                        <input type="email" name="email" id="input-email" class="form-control form-control-alternative" placeholder="Addresse mail">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Nouveau Mot de passe</label>
                        <input type="password" name="password" id="input-first-name" class="form-control form-control-alternative" placeholder="Password">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Confirmer Mot de passe</label>
                        <input type="password" name="password_confirmation" id="input-last-name" class="form-control form-control-alternative" placeholder="Password">
                      </div>
                    </div>
                  </div>
                </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
        <!-- end edit zone -->
      <!-- Footer -->
<?php require_once 'includes/footer.php'; ?>
</body>

</html>


