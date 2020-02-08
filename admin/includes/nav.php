<div class="container-fluid">
    <!-- Toggler -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <!-- Brand zone -->
    <!-- User -->
    <ul class="nav align-items-center d-md-none">
        <li class="nav-item dropdown">
            <div class="media align-items-center">
                <?=$_SESSION['display_name']?>
            </div>
        </li>
    </ul>
    <!-- Collapse -->
    <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Collapse header -->
        <div class="navbar-collapse-header d-md-none">
            <div class="row">
                <div class="col-6 collapse-brand">
                    <!--mobile nav bran zone -->
                </div>
                <div class="col-6 collapse-close">
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                        <span></span>
                        <span></span>
                    </button>
                </div>
            </div>
        </div>
        <!-- Form -->
        <form class="mt-4 mb-3 d-md-none">
            <div class="input-group input-group-rounded input-group-merge">
                <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="Search" aria-label="Search">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <span class="fa fa-search"></span>
                    </div>
                </div>
            </div>
        </form>
        <!-- Navigation -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class=" nav-link" href="index.php"> <i class="ni ni-fat-add text-blue"></i>Nouvel Evènement </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="allevents.php">
                    <i class="ni ni-calendar-grid-58 text-blue"></i>Tous les évènements
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="newgalery.php">
                    <i class="ni ni-image text-blue"></i>Créer une galerie
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="add_admin.php">
                    <i class="ni ni-single-02 text-blue"></i>Ajouter Admin
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="edit_profil.php">
                    <i class="ni ni-settings-gear-65 text-blue"></i>Modifier vos information
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="disconnect.php">
                    <i class="ni ni-button-power text-red"></i>Deconnexion
                </a>
            </li>
        </ul>
        <!-- Divider -->
        <hr class="my-3">
        <!-- Heading -->
        <h6 class="navbar-heading text-muted">Aide <span class="fas fa-question"></span></h6>
        <!-- Navigation -->
        <ul class="navbar-nav mb-md-3">
            <li class="nav-item">
                <!-- aide -->
            </li>
        </ul>
    </div>
</div>