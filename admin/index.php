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
          <div class="card bg-secondary shadow">
          <!-- afficher un message flash -->
          <?php $msg->display(); ?>
            <div class="card-body">
              <form method="post" enctype="multipart/form-data">
                <h4 class="heading-small mb-4">Nouvel evenement</h4>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Titre :</label>
                        <input type="text" id="titre" class="form-control" type="text" name="titre" placeholder="nom de l'évènement" required="required">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Lieu</label>
                        <input class="form-control " type="text" name="lieu" required="required" placeholder="lieu">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Date :</label>
                        <input id="input-first-name" class="form-control" type="date" name="date" required="required">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Heure :</label>
                        <input id="input-last-name" class="form-control" type="time" name="heure" required="required">
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Address -->
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-address">Affiche de l'évènement</label>
                        <input id="input-address" class="form-control" type="file" name="flayer" placeholder="L'affiche" required="required">
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Description -->
                <div class="pl-lg-4">
                  <div class="form-group">
                    <label>Description de l'évènement</label>
                    <textarea id="editeur" rows="4" class="form-control" id="editeur" name="description" placeholder="description" required="required"></textarea>
                  </div>
                </div>
                <!-- boutton envoyer et reset -->
                <div class="col-lg-3 float-right">
                      <div class="form-group">
                        <input class="btn btn-md btn-success" type="submit" name="submit">
                        <input class="btn btn-md btn-danger" type="reset">
                      </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- end edit zone -->
      <!-- Footer -->
<?php require_once 'includes/footer.php'; ?>
</body>

</html>


