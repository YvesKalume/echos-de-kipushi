<?php
require_once 'config/connection.php';
$numberbypage=1;
// recuperer tous les évènements
$galeries=$db->query("SELECT id FROM galerie");
$totalnumber=$galeries->rowCount();
$totalpages=ceil($totalnumber/$numberbypage);
if (isset($_GET['p']) AND !empty($_GET['p']) AND $_GET['p'] > 0 AND $_GET['p']<= $totalpages) {
  $page= intval($_GET['p']);
}else {
  $page = 1;
}
$depart=($page-1)*$numberbypage;
$galeries=$db->query('SELECT * FROM galerie ORDER BY posted_at LIMIT '.$depart.','.$numberbypage);
$prev=$page-1;
$next= $page+1

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <?php require_once 'includes/head.php' ?>
    <title>Portfolio- Echos de kipushi</title>
</head>
<body>
    <!-- header -->
    <?php require_once 'includes/header.php' ?>
    <!-- end header -->
    <!--==========================
      Team Section
    ============================-->
    <section id="team">
      <div class="container">
        <div style="margin-top:60px;" class="section-header">
          <h3>Portfolio</h3>
          <p>Les images liées à toutes nos activités</p>
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

      </div>
    </section>
        <!-- pagination -->
        <div class="card-footer py-4">
              <nav aria-label="...">
                <ul class="pagination justify-content-end mb-0">
                  <li class="page-item">
                    <a class="page-link" href="portfolio.php?p=<?=$prev?>" tabindex="-1">
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
                    <a class="page-link" href="portfolio.php?p=<?=$next?>">
                      <i class="ion-ios-arrow-right"></i>
                      <span class="sr-only">Next</span>
                    </a>
                  </li>
                </ul>
              </nav>
            </div>
            <!-- end pagination -->
    <!-- footer -->
    <?php require_once 'includes/footer.php' ?>
</body>
</html>