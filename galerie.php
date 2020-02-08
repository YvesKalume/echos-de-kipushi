<?php
require_once './config/connection.php';
if (isset($_GET['id']) AND !empty($_GET['id'])) {
    $id=htmlspecialchars($_GET['id']);
    $galerie=$database->galerie[$id];
    $dossier=$galerie['dossier'];
    $dir='galerie/'.$dossier.'/*.{jpg,jpeg,png}';
    $files=glob($dir,GLOB_BRACE);
}else {
  die("la galerie est indisponible");
  }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <?php require_once 'includes/head.php' ?>
    <title>Portfolio- Echos de kipushi</title>
    <style>
        .grid-item {
        float: left;
        margin-left:5px;
        margin-bottom:5px;
        width:100px;
        
      }
    </style>
</head>
<body>
    <!-- header -->
    <?php require_once 'includes/header.php' ?>
    <!-- end header -->
    <!--==========================
      Team Section
    ============================-->
    <section id="team">
      <div class="container-fluid">
        <div style="margin-top:60px;" class="section-header">
          <h3>Portfolio</h3>
        </div>
          <div class="masonry-grid container">
        <!-- images -->
          <?php
          foreach ($files as $file) { ?>
            
                <img src="<?= $file ?>" alt="">
            
          <?php } ?>
          </div>        
      </div>
    </section><!-- #team -->

    <!-- footer -->
    <?php require_once 'includes/footer.php' ?>
</body>
</html>