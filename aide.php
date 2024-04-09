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
            <li class="sidebar-item selected">
              <a class="sidebar-link active" href="./aide.php" aria-expanded="false">
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
            <li class="sidebar-item">
              <a class="sidebar-link" href="./admin.php" aria-expanded="false">
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
      <!--  Header Start -->
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
            <div class="card w-100">
              <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4">Explications</h5>


                <p>Ce nouveau classement prend en compte des points. Pour en gagner, il faut finir parmi les meilleurs d'une soirée. En effet, comme pour la Formule 1, à chaque soirée, les 10 plus gros gagnants seront récompensés. Ce changement permet de minimiser l'impact d'une seule bonne soirée pour un joueur sur le classement semestriel !</p>

                <p>Pour les nouveaux, nous vous rappelons qu'au début de chaque semestre, 10,000$ vous sont attribués et ce "compte fictif" vous suit à chaque soirée. Ce système est bien conservé, mais il ne représente plus le classement prioritaire !</p>


                <p>Voici le barème des points :</p>
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th scope="col">Place en fin de soirée</th>
                      <th scope="col">Points</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">1er</th>
                      <td>25</td>
                    </tr>
                    <tr>
                      <th scope="row">2ème</th>
                      <td>18</td>
                    </tr>
                    <tr>
                      <th scope="row">3ème</th>
                      <td>15</td>
                    </tr>
                    <tr>
                      <th scope="row">4ème</th>
                      <td>12</td>
                    </tr>
                    <tr>
                      <th scope="row">5ème</th>
                      <td>10</td>
                    </tr>
                    <tr>
                      <th scope="row">6ème</th>
                      <td>8</td>
                    </tr>
                    <tr>
                      <th scope="row">7ème</th>
                      <td>6</td>
                    </tr>
                    <tr>
                      <th scope="row">8ème</th>
                      <td>4</td>
                    </tr>
                    <tr>
                      <th scope="row">9ème</th>
                      <td>2</td>
                    </tr>
                    <tr>
                      <th scope="row">10ème</th>
                      <td>1</td>
                    </tr>
                  </tbody>
                </table>

                <p>Les suivants ne gagnent pas de points. En cas d'égalité, le joueur ayant le plus d'argent sur son compte fictif gagne la place la plus haute.</p>

              </div>
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