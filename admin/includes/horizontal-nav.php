<nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
     
        <!-- User -->
          <ul class="navbar-nav align-items-center d-none d-md-flex">
              <li class="nav-item dropdown">
                  <div class="media align-items-center">
                      <div style="color:white" class="media-body ml-2 d-none d-lg-block"><?= (Date('H')+1 < 17)? 'Bonjour ! ' : 'Bonsoir ! ' ?>
                          <span class="mb-0 text-sm  font-weight-bold"><?=$_SESSION['display_name']?></span>
                      </div>
                  </div>
              </li>
          </ul>
      </div>
</nav>