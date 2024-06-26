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
            <li class="sidebar-item selected">
              <a class="sidebar-link active" href="./index.php" aria-expanded="false">
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
                <h5 class="card-title fw-semibold mb-4">Classement soirées A24</h5>
                <div class="table-responsive">
                  <table class="table text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                      <tr>
                        <th class="border-bottom-0 m-0" style="padding-right: 0px; padding-left: 0px;">
                          <h6 class="fw-semibold mb-0">Place</h6>
                        </th>

                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Joueur</h6>
                        </th>


                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Points</h6>
                        </th>
                        <th class="border-bottom-0 ordi-affichage">
                          <h6 class="fw-semibold mb-0">Argent</h6>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
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

                      // Fonction de comparaison pour trier les joueurs par points décroissants, puis par argent décroissant
                      function comparePointsAndArgent($a, $b)
                      {
                        // Compare d'abord par points
                        $pointsComparison = $b['points'] - $a['points'];

                        // Si les points sont égaux, compare par argent
                        if ($pointsComparison === 0) {
                          return $b['argent'] - $a['argent'];
                        }

                        return $pointsComparison;
                      }

                      if ($joueurs) {
                        // Triez les joueurs en utilisant la nouvelle fonction de comparaison
                        usort($joueurs, 'comparePointsAndArgent');

                        $color = "primary";
                        $indice = 1;

                        foreach ($joueurs as $joueur) {
                          if ($indice == 1) {
                            $color = "first";
                          } else if ($indice == 2) {
                            $color = "second";
                          } else if ($indice == 3) {
                            $color = "danger";
                          } else {
                            $color = "primary";
                          }
                          $indice++;


                      ?>
                          <tr <?php if ($joueur['ensoiree'] == 'true') {
                                echo 'class="bg-warning"';
                              }


                              ?>>
                            <td class="border-bottom-0 m-0" style="padding-right: 0px; padding-left: 0px;">
                              <h6 class="fw-semibold mb-0"><?php echo $indice - 1; ?></h6>
                            </td>

                            <?php


                            $argent = $joueur['argent'];
                            if ($argent >= 1000) {
                              $argent = number_format($argent, 0, ',', ',');
                            }


                            ?>
                            <td class="border-bottom-0">
                              <h6 class="fw-semibold mb-0"><?php echo $joueur['nom'] . ' ' . $joueur['prenom']; ?></h6>

                              <span class="fw-normal mobile-affichage" style="display: none;"><?php echo $argent; ?>$</span>


                            </td>


                            <td class="border-bottom-0">
                              <div class="d-flex align-items-center gap-2">
                                <span class="badge bg-<?php echo $color; ?> rounded-3 fw-semibold"><?php echo $joueur['points']; ?></span>
                              </div>
                            </td>

                            <td class="border-bottom-0 ordi-affichage">
                              <p class="mb-0 fw-normal"><?php echo $argent; ?>$</p>
                            </td>
                          </tr>
                      <?php
                        }
                      } else {
                        echo "<tr><td colspan='4'>Aucun joueur trouvé.</td></tr>";
                      }
                      ?>







                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>


      </div>
    </div>
  </div>


  <script>
    function change_place_argent() {
      let largeur = window.innerWidth;

      if (largeur <= 500) {
        let argent = document.getElementsByClassName('mobile-affichage');
        let argentArray = Array.from(argent);
        argentArray.forEach(element => {
          element.style.display = 'block';
        });

        let argentordi = document.getElementsByClassName('ordi-affichage');
        let argentordiArray = Array.from(argentordi);
        argentordiArray.forEach(element => {
          element.style.display = 'none';
        });
      } else {
        let argent = document.getElementsByClassName('mobile-affichage');
        let argentArray = Array.from(argent);
        argentArray.forEach(element => {
          element.style.display = 'none';
        });

        let argentordi = document.getElementsByClassName('ordi-affichage');
        let argentordiArray = Array.from(argentordi);
        argentordiArray.forEach(element => {
          element.style.display = 'block';
        });
      }
    }

    window.addEventListener('resize', function() {
      change_place_argent();
    });

    change_place_argent();
  </script>


  <script src="./assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="./assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="./assets/js/sidebarmenu.js"></script>
  <script src="./assets/js/app.min.js"></script>
  <script src="./assets/libs/apexcharts/dist/apexcharts.min.js"></script>
  <script src="./assets/libs/simplebar/dist/simplebar.js"></script>
  <script src="./assets/js/dashboard.js"></script>
</body>

</html>