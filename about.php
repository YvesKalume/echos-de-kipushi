<?php 
  require_once 'config/connection.php';
  // recuperer tous les évènements
  $events=$database->events();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <?php require_once 'includes/head.php' ?>
  <title>Evènements - echo de Kipushi</title>
</head>

<body>

  <!--==========================
    Header
  ============================-->
<?php require_once 'includes/header.php' ?>
  <!-- #header -->

<!--==========================
      Portfolio Section
    ============================-->
    <section id="about"  class="section-bg" >
      <div class="container">

        <header style="margin-top:60px;" class="section-header">
          <h3 class="section-title">À Propos de nous</h3>
        </header>
        <div class="row portfolio-container">
            <div style="text-align: justify;" class="col-lg-12 portfolio-item filter-app wow fadeInUp">
                Kipushi est une petite ville perché à 1200 mètres d'altitudes sur le haut plateau  katangais. Elle doit son existence à ce qui était un des plus beaux fleurons de l'union minière:la mine prince léopard et son célèbre Puit V (mine de Kipushi). L'association sans but lucratif "ECHOS DE KIPUSHI ASBL " est née en 2012 pour redonner la vie à cette cité de kipushi qui se mourait. Nous avons créer cette association pour un rapprochement qui contribuerait à l'épanouissement des enfants et amis de Kipushi.
                Nous sommes une association apolitique, tout en sachant respecter les convictions religieuses de tout les membres.
                Nous sommes aussi un groupe d'échange intellectuel pour contribuer au développement de la vie sociale, spirituelle,culturelle, économique et environnementale de Kipushi.
                Nous avons aussi un carrefour "ECHOS DE KIPUSHI" sur Facebook, un carrefour  de retrouvaille, d amitié, de partage , de discussion intellectuelle,et blague.
                Ce carrefour nous permet de nous réunir avec tout les enfants de Kipushi à travers le monde.
                Et surtout, Echos de Kipushi Asbl est là, pour la concrétisation des activités de l'épanouissement de Kipushi.
            </div>
        </div>

      </div>
    </section>
    <?php require_once 'includes/footer.php' ?>
</body>
</html>
