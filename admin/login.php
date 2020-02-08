<?php
require_once '../config/connection.php';
require_once '../vendor/autoload.php';
if (!session_id()) @session_start();
$msg = new \Plasticbrain\FlashMessages\FlashMessages();

if (isset($_POST['submit'])) {
    $email=htmlspecialchars($_POST['email']);
    $password=sha1($_POST['password']);
    $user=$db->prepare("SELECT * FROM users WHERE email=?");
    $user->execute(array($email));
    $user=$user->fetch();
    if ($user['password']==$password) {
        session_start();
        $_SESSION['is_admin']=$user['is_admin'];
        $_SESSION['status']=200;
        $_SESSION['id']=$user['id'];
        $_SESSION['display_name']=$user['display_name'];
        header('Location: ./index.php');
    }else {
      $msg->error('Mot de passe ou nom d\' utilisateur invalide ','login.php');
    }

}
  
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Login</title>
  <!-- Favicon -->
  <link href="./assets/img/brand/favicon.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="./assets/js/plugins/nucleo/css/nucleo.css" rel="stylesheet" />
  <link href="./assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="./assets/css/argon-dashboard.css?v=1.1.0" rel="stylesheet" />
</head>

<body class="bg-default">
  <div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-horizontal navbar-expand-md navbar-dark">
      <div class="container px-4">
        <a class="navbar-brand" href="../index.php">
          <img src="./assets/img/brand/white.png" />
        </a>
      </div>
    </nav>
    <!-- Header -->
    <div class="header bg-gradient-primary py-7 py-lg-8">
      <div class="container">
        <div class="header-body text-center mb-7">
          <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6">
              <h1 class="text-white">Bienvenue !</h1>
            </div>
          </div>
        </div>
      </div>
      <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </div>
    <!-- login box -->
    <div class="container mt--8 pb-5">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
          <div class="card bg-secondary shadow border-0">
            <div class="card-body px-lg-5 py-lg-5">
              <div class="text-center text-muted mb-4">
              <!-- afficher un message flash -->
                  <?php $msg->display(); ?>
                <small>Connexion </small>
              </div>
              <form method="post">
                <div class="form-group mb-3">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control" type="text" name="email" placeholder="Votre adresse email">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" type="password" name="password" placeholder="Mot de passe">
                  </div>
                </div>
                <div class="custom-control custom-control-alternative custom-checkbox">
                  <input name="rememberMe" class="custom-control-input" id=" customCheckLogin" type="checkbox">
                  <label class="custom-control-label" for=" customCheckLogin">
                    <span class="text-muted">Se souvenir de moi</span>
                  </label>
                </div>
                <div class="text-center">
                  <button name="submit" type="submit" class="btn btn-primary my-4">Se Connecter</button>
                </div>
              </form>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-6">
              <a href="#" class="text-light"><small>Mot de passe oublié ?</small></a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer class="py-5">
      <div class="container">
        <div class="row align-items-center justify-content-xl-between">
          <div class="col-xl-6">
            <div class="copyright text-center text-xl-left text-muted">
              © <?=DATE('Y')?> <a href=" " class="font-weight-bold ml-1" >Noblart</a>
            </div>
          </div>
          <div class="col-xl-6">
            <ul class="nav nav-footer justify-content-center justify-content-xl-end">
              <li class="nav-item">
                <a href=" " class="nav-link" target=" ">À Propos</a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">Contact</a>
              </li>
              <li class="nav-item">
                <a href="../index.php" class="nav-link" >Acceuil</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
  </div>
  <!--   Core   -->
  <script src="./assets/js/plugins/jquery/dist/jquery.min.js"></script>
  <script src="./assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!--   Optional JS   -->
  <!--   Argon JS   -->
  <script src="./assets/js/argon-dashboard.min.js?v=1.1.0"></script>
</body>

</html>