<?php 
  require_once 'config/connection.php';
  // recuperer tous les évènements
  $events=$database->events()->order("date asc")->limit(6);
  $galeries=$database->galerie()->order("posted_at asc")->limit(4);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <?php require_once 'includes/head.php' ?>
  <title>Acceuil - echos de Kipushi</title>
</head>

<body>

  <!--==========================
    Header
  ============================-->
<?php require_once 'includes/header.php' ?>
  <!-- #header -->

  <!--==========================
    Intro Section
  ============================-->
  <section id="intro">
    <div class="intro-container">
      <div id="introCarousel" class="carousel  slide carousel-fade" data-ride="carousel">

        <ol class="carousel-indicators"></ol>

        <div class="carousel-inner">

          <div class="carousel-item active">
            <div class="carousel-background"><img src="assets/img/facts-bg.jpg" alt=""></div>
            <div class="carousel-container">
              <div class="carousel-content">
                <h2>Echos De Kipushi</h2>
                <a href="about.php" class="btn btn-custom scrollto">Qui sommes-nous ?</a>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>
  <!-- #intro -->
<!--==========================
      Portfolio Section
    ============================-->
    <section id="portfolio"  class="section-bg" >
      <div class="container">

        <header class="section-header">
          <h3 class="section-title">Evenements</h3>
        </header>
        <div class="row portfolio-container">
            <!-- les évènements -->
          <?php foreach ($events as $event) { ?>
            <div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInUp">
              <div class="portfolio-wrap">
                <figure style="background-color:#fff">
                  <a href="event/<?=$event['id']?>">
                    <img src="affiches/<?=$event['flayer']?>" class="img-fluid" alt="">
                  </a>
                </figure>

                <div class="portfolio-info">
                  <h4 class=" "><a href="event/<?=$event['id']?>"><?=$event['titre'] ?></a></h4><br>
                  <p class="float-left date"><?=$event['lieu'] ?></p><br>
                  <p class="float-left date"><?= $event['date']==DATE("Y-m-d")? "Aujourd'hui" : $event['date'].' '.$event['heure'] ?></p>
                </div>
              </div>
            </div>
          <?php } ?>

        </div>
          <center><a class="btn btn-success btn-sm" href="events.php">Plus D'évènements</a></center>
      </div>
    </section>
    <!-- porfolio -->
    <section id="team">
      <div class="container">
        <div class="section-header">
          <h3>Portfolio</h3>
          <h6><i>Chaque image correspond à une activité, cliquez dessus pour voir les images liées à celle-ci</i></h6>
        </div>

        <div class="row">
          <?php foreach ($galeries as $galerie) { ?>
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6">
              <div class="member">
                <a href="galerie/<?=$galerie['id']?>"><img  class="porf-img" src="galerie/<?=$galerie['dossier'].'/'.$galerie['cover'] ?>" class="img-fluid portfolio-img" alt=""></a>
                <div class="member-info">
                  <!-- description image -->
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
        <center><a class="btn btn-success btn-sm" href="portfolio.php">Plus D'images</a></center>
      </div>
    </section>
    <!-- end porfolio -->
    <?php require_once 'includes/footer.php' ?>
</body>
</html>
