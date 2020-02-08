<?php 
  require_once './config/connection.php';
  
  $numberbypage=1;
  // recuperer tous les évènements
  $events=$db->query("SELECT id FROM events");
  $totalnumber=$events->rowCount();
  $totalpages=ceil($totalnumber/$numberbypage);
  if (isset($_GET['p']) AND !empty($_GET['p']) AND $_GET['p'] > 0 AND $_GET['p']<= $totalpages) {
    $page= intval($_GET['p']);
  }else {
    $page = 1;
  }
  $depart=($page-1)*$numberbypage;
  $events=$db->query('SELECT * FROM events ORDER BY date LIMIT '.$depart.','.$numberbypage);
  $prev=$page-1;
  $next= $page+1;
  
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
    <section id="portfolio"  class="section-bg" >
      <div class="container">
        <header style="margin-top:60px;" class="section-header">
          <h3 class="section-title">Tous les Evenements</h3>
        </header>
        <div class="row portfolio-container">
            <!-- les évènements -->
            <?php foreach ($events as $event) { ?>
            <div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInUp">
              <div class="portfolio-wrap">
                <figure style="background-color:#fff">
                  <a href="single.php?id=<?=$event['id']?>">
                    <img src="./affiches/<?=$event['flayer']?>" class="img-fluid" alt="">
                  </a>
                </figure>

                <div class="portfolio-info">
                  <h4 class=" "><a href="single.php?id=<?=$event['id']?>"><?=$event['titre'] ?></a></h4><br>
                  <p class="float-left date"><?=$event['lieu'] ?></p><br>
                  <p class="float-left date"><?=$event['date'].' '.$event['heure'] ?></p>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
    </section>
    <!-- pagination -->
    <div class="card-footer py-4">
              <nav aria-label="...">
                <ul class="pagination justify-content-end mb-0">
                  <li class="page-item">
                    <a class="page-link" href="events.php?p=<?=$prev?>" tabindex="-1">
                      <i class="ion-ios-arrow-left"></i>
                      <span class="sr-only">Previous</span>
                    </a>
                  </li>
                  <?php for ($i=1; $i<=$totalpages ; $i++) { ?>
                  <li class="page-item>">
                      <?php
                      if ($i == $page){
                          echo '<button class=" btn btn-success">'.$i.'</button>';
                      }
                      else{
                          echo '<a class="page-link" href="events.php?p='.$i.'">'.$i.'</a>';
                      }
                      ?>
                  </li>
                  <?php } ?>
                  <li class="page-item">
                    <a class="page-link" href="events.php?p=<?=$next?>">
                      <i class="ion-ios-arrow-right"></i>
                      <span class="sr-only">Next</span>
                    </a>
                  </li>
                </ul>
              </nav>
            </div>
            <!-- end pagination -->
    <?php require_once 'includes/footer.php' ?>
</body>
</html>
