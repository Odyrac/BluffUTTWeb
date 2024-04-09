<!doctype html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bluff'UTT</title>
  <link rel="shortcut icon" type="image/png" href="./assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="./assets/css/styles.min.css" />
  <link rel="stylesheet" href="./assets/css/perso.css" />
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-center">
          <a href="./index.php" class="text-nowrap logo-img">
            <img src="./assets/images/logos/bluffutt.png" width="100" class="m-3" alt="" />
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer m-3" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Accueil</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./index.php" aria-expanded="false">
                <span>
                  <i class="ti ti-list-numbers"></i>
                </span>
                <span class="hide-menu">Classement</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./stats.php" aria-expanded="false">
                <span>
                  <i class="ti ti-chart-dots"></i>
                </span>
                <span class="hide-menu">Statistiques</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./aide.php" aria-expanded="false">
                <span>
                  <i class="ti ti-help"></i>
                </span>
                <span class="hide-menu">Aide</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" target="_blank" href="./timer/index.html" aria-expanded="false">
                <span>
                  <i class="ti ti-clock"></i>
                </span>
                <span class="hide-menu">Timer</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Divers</span>
            </li>
            <li class="sidebar-item selected">
              <a class="sidebar-link active" href="./admin.php" aria-expanded="false">
                <span>
                  <i class="ti ti-settings"></i>
                </span>
                <span class="hide-menu">Panel</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./archives.php" aria-expanded="false">
                <span>
                  <i class="ti ti-folder"></i>
                </span>
                <span class="hide-menu">Archives</span>
              </a>
            </li>
          </ul>
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
              <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
              </a>
            </li>

          </ul>

        </nav>
      </header>

      <!--  Header End -->
      <div class="container-fluid">
        <!--  Row 1 -->
        <div class="row">

          <div class="col-lg-12 d-flex align-items-stretch">

            <div class="card-body">
              <?php
              include './pass.php';

              if (isset($_GET['error']) && $_GET['error'] == 'auth') {
                echo '<div class="alert alert-danger" role="alert">
                    Vous devez vous authentifier pour effectuer cette action !
                  </div>';
              }
              if (isset($_GET['error']) && $_GET['error'] == 'aucunenjeu') {
                echo '<div class="alert alert-danger" role="alert">
                    Aucune partie en cours !
                  </div>';
              }
              if (isset($_GET['error']) && $_GET['error'] == 'pasenjeu') {
                echo '<div class="alert alert-danger" role="alert">
                    Ce joueur n\'est pas (ou plus) en jeu !
                  </div>';
              }
              if (isset($_GET['error']) && $_GET['error'] == 'pasenjeubis') {
                echo '<div class="alert alert-danger" role="alert">
                    Un des joueurs n\'est pas en jeu (ou a déjà rendu son argent) et ses données n\'ont pas été modifiées ! Pour les autres joueurs en jeu, leurs données ont été modifiées.
                  </div>';
              }
              if (isset($_GET['error']) && $_GET['error'] == 'dejaenjeu') {
                echo '<div class="alert alert-danger" role="alert">
                    Ce joueur est déjà (ou a été) en jeu !
                  </div>';
              }
              if (isset($_GET['error']) && $_GET['error'] == 'wrongauth') {
                echo '<div class="alert alert-danger" role="alert">
                    Mauvais mot de passe !
                  </div>';
              }
              if (isset($_GET['error']) && $_GET['error'] == 'nomprenom') {
                echo '<div class="alert alert-danger" role="alert">
                    Le nom ou le prénom existe déjà ou est vide !
                  </div>';
              }
              if (isset($_GET['error']) && $_GET['error'] == 'pasdejoueurensoiree') {
                echo '<div class="alert alert-danger" role="alert">
                    Aucun joueur en soirée !
                  </div>';
              }
              if (isset($_GET['error']) && $_GET['error'] == 'confirmfermersoiree') {
                echo '<div class="alert alert-danger" role="alert">
                    Vous devez confirmer la fermeture de la soirée !
                  </div>';
              }
              if (isset($_GET['success'])) {
                echo '<div class="alert alert-success" role="alert">
                    Action effectuée !
                  </div>';
              }

              $json_data = file_get_contents('./bdd/joueurs.json');
              $joueurs = json_decode($json_data, true);

              $allfalse = true;
              foreach ($joueurs as $joueur) {
                if ($joueur['ensoiree'] == "true") {
                  $allfalse = false;
                }
              }
              if (!$allfalse) {
                echo '<div class="alert alert-warning" role="alert">
              Une soirée est actuellement en cours !
              </div>';
              }
              ?>

              <h5 class="card-title fw-semibold mb-4">Connexion
                <?php
                if (isset($_COOKIE['password']) && $_COOKIE['password'] == $password_global) {
                  echo '<span class="badge bg-success ms-2">Vous êtes connecté !</span>';
                } else {
                  echo '<span class="badge bg-danger ms-2">Vous n\'êtes pas connecté !</span>';
                }
                ?>
              </h5>
              <div class="card">
                <div class="card-body">
                  <form method="post" action="./action/connexion.php">
                    <?php
                    if (isset($_COOKIE['password']) && $_COOKIE['password'] == $password_global) { ?>
                      <button type="submit" class="btn btn-danger">Déconnexion</button>
                    <?php } else { ?>
                      <div class="mb-3">
                      <label for="password" class="form-label">Mot de passe</label>
                      <input name="password" type="password" class="form-control" id="password">
                    </div>
                      <button type="submit" class="btn btn-primary">Connexion</button>
                    <?php } ?>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-12 d-flex align-items-stretch">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Ajout d'un joueur</h5>
              <div class="card">
                <div class="card-body">

                  <form method="post" action="./action/ajouterjoueur.php">

                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Nom</label>
                      <input type="" class="form-control" id="exampleInputEmail1" name="nom">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Prénom</label>
                      <input type="" class="form-control" id="exampleInputEmail1" name="prenom">
                    </div>

                    <div class="mb-3 form-check">
                      <input checked type="checkbox" class="form-check-input" id="exampleCheck1" name="checkbox">
                      <label class="form-check-label" for="exampleCheck1">Lui retirer 1,000$ immédiatement</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                  </form>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-12 d-flex align-items-stretch">

            <div class="card-body">

              <h5 class="card-title fw-semibold mb-4">Entrée d'un joueur</h5>
              <div class="card">
                <div class="card-body">
                  <form method="post" action="./listejoueur.php?for=entrerjoueur">
                    <button type="submit" class="btn btn-primary">Voir liste joueurs</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-12 d-flex align-items-stretch">

            <div class="card-body">

              <h5 class="card-title fw-semibold mb-4">Sortie d'un joueur</h5>
              <div class="card">
                <div class="card-body">
                  <form method="post" action="./listejoueur.php?for=sortiejoueur">
                    <button type="submit" class="btn btn-primary">Voir liste joueurs</button>
                  </form>
                </div>
              </div>
            </div>
          </div>



          <div class="col-lg-12 d-flex align-items-stretch">

            <div class="card-body">

              <h5 class="card-title fw-semibold mb-4">Recave d'un joueur</h5>
              <div class="card">
                <div class="card-body">
                  <form method="post" action="./listejoueur.php?for=recavejoueur">
                    <button type="submit" class="btn btn-primary">Voir liste joueurs</button>
                  </form>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-12 d-flex align-items-stretch">

            <div class="card-body">

              <h5 class="card-title fw-semibold mb-4">Fermeture soirée</h5>
              <div class="card">
                <div class="card-body">

                  <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#fermersoiree">Fermer la soirée</button>

                </div>
              </div>
            </div>
          </div>

        </div>
      </div>



      <!-- Modal -->
      <div class="modal fade" id="fermersoiree" tabindex="-1" aria-labelledby="fermersoireeLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="fermersoireeLabel">Fermeture de la soirée</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              Êtes-vous sûr de vouloir fermer la soirée ?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
              <form method="post" action="./action/fermersoiree.php">
                <input type="hidden" name="confirm" value="true">
                <button type="submit" class="btn btn-primary">Confirmer</button>
              </form>
            </div>
          </div>
        </div>
      </div>



    </div>
  </div>
  </div>
  <script src="./assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="./assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="./assets/js/sidebarmenu.js"></script>
  <script src="./assets/js/app.min.js"></script>
  <script src="./assets/libs/apexcharts/dist/apexcharts.min.js"></script>
  <script src="./assets/libs/simplebar/dist/simplebar.js"></script>
  <script src="./assets/js/dashboard.js"></script>
</body>

</html>