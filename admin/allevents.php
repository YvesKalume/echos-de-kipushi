<?php
session_start();

require_once '../vendor/autoload.php';
if (!session_id()) @session_start();
$msg = new \Plasticbrain\FlashMessages\FlashMessages();

if (!isset($_SESSION) OR $_SESSION['is_admin']!=1 OR $_SESSION['status']!=200) {
    header('Location: login.php');
}else {

  require_once '../config/connection.php';
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
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <?php require_once 'includes/head.php'; ?>
  <title>Tous les evenements</title>
</head>

<body>
<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
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
          <!-- Card stats -->
          <div class="row">
          <!-- header space -->
          <?php
          echo isset($_SESSION['message'])? $_SESSION['message'] : NULL;
          ?>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid mt--7">
      <div class="row">
        <!-- Dernières Chans -->
        <div class="col-xl-12 mb-5 mb-xl-0">
            <div class="card shadow">
              <div class="card-header border-0">
                <div class="row align-items-center">
                  <div class="col">
                  <!-- afficher un message flash -->
                    <?php $msg->display(); ?>
                    <h3 class="mb-0">Toutes les Chansons</h3>
                  </div>
                </div>
              </div>
              <div class="table-responsive">
                <!-- table -->
                <table class="table align-items-center table-flush">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col">Titre</th>
                      <th scope="col">Lieu</th>
                      <th scope="col">Date le</th>
                      <th scope="col">Heure</th>
                      <th scope="col">Posté Par</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach($events as $event){
                  $auteur_id = $event['users_id'];
                  $auteur=$db->query("SELECT * FROM users WHERE id=$auteur_id");
                   $auteur=$auteur->fetch();
                  ?>
                    <tr>
                      <th scope="row"><?=$event['titre']?></th>
                      <td><?=$event['lieu']?></td>
                      <td><?=$event['date']?></td>
                      <td><?=$event['heure']?></td>
                      <td><?=$auteur['display_name']?></td>
                      <td><a class="btn btn-sm btn-success" href="update.php?id=<?=$event['id']?>" target="_blank">Modifier </a>
                          <a class="btn btn-sm btn-danger" href="delete.php?id=<?=$event['id']?>" target="_blank"> Suprimer</a></td>
                    </tr>
                  <?php } ?>
                  </tbody>
                </table>
              </div>
              <!-- pagination -->
              <div class="card-footer py-4">
              <nav aria-label="...">
                <ul class="pagination justify-content-end mb-0">
                  <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">
                      <i class="fas fa-angle-left"></i>
                      <span class="sr-only">Previous</span>
                    </a>
                  </li>
                <?php for ($i=1; $i<=$totalpages ; $i++) { ?>
                  <li class="page-item active">
                      <?php
                      if ($i == $page){
                          echo '<button style="background-color: green" class="page-link">'.$i.'</button>';
                      }
                      else{
                          echo '<a class="page-link" href="allevents.php?p='.$i.'">'.$i.'</a>';
                      }
                      ?>
                  </li>
                  <?php } ?>
                  <li class="page-item">
                    <a class="page-link" href="#">
                      <i class="fas fa-angle-right"></i>
                      <span class="sr-only">Next</span>
                    </a>
                  </li>
                </ul>
              </nav>
            </div>
              <!-- and pagination -->
            </div>
          </div>
              <!-- Footer -->
<?php require_once 'includes/footer.php'; ?>
</body>

</html>