<!doctype html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bluff'UTT</title>
  <link rel="shortcut icon" type="image/png" href="./assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="./assets/css/styles.min.css" />
  <link rel="stylesheet" href="./assets/css/perso.css" />
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
            <li class="sidebar-item selected">
              <a class="sidebar-link active" href="./stats.php" aria-expanded="false">
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

        <div class="col-lg-12">


          <div id="accordion">
            <div class="card">
              <div class="" id="headingOne">
                <button class="btn btn-link card-header w-100 text-decoration-none" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                  <h5 class="mb-0 card-title fw-semibold text-start">Évolution comptes d'argent/soirée
                  </h5>
                </button>
              </div>
              <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="card-body">
                <div class="d-flex align-items-center flex-column flex-md-row w-100">
                    <button id="toggleAll" class="btn btn-primary">Décocher tout</button>
                    <p class="mb-0 mt-3 mt-md-0" style="margin-left: 20px;">Remarque : seuls les joueurs les plus actifs sont affichés</p>
                  </div>
                  <div class="card-body" style="height: 700px!important; padding: 0px!important;">
                    <canvas id="global-chart" width="800" height="700"></canvas>
                  </div>
                </div>
              </div>
            </div>


            <div class="card">
              <div class="" id="headingTwo">
                <button class="btn btn-link card-header w-100 text-decoration-none" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  <h5 class="mb-0 card-title fw-semibold text-start">Évolution nombre de points/soirée
                  </h5>
                </button>
              </div>
              <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                <div class="card-body">
                <div class="d-flex align-items-center flex-column flex-md-row w-100">
                    <button id="toggleAllPoints" class="btn btn-primary">Décocher tout</button>
                    <p class="mb-0 mt-3 mt-md-0" style="margin-left: 20px;">Remarque : seuls les joueurs avec des points sont affichés</p>
                  </div>
                  <div class="card-body" style="height: 700px!important; padding: 0px!important;">
                    <canvas id="points-chart" width="800" height="700"></canvas>
                  </div>
                </div>
              </div>
            </div>


            <div class="card">
              <div class="" id="headingFour">
                <button class="btn btn-link card-header w-100 text-decoration-none" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                  <h5 class="mb-0 card-title fw-semibold text-start">Argent gagné/soirée
                  </h5>
                </button>
              </div>
              <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                <div class="card-body">
                <div class="d-flex align-items-center flex-column flex-md-row w-100">
                    <button id="toggleAllArgentMarques" class="btn btn-primary">Décocher tout</button>
                  </div>
                  <div class="card-body" style="height: 700px!important; padding: 0px!important;">
                    <canvas id="argent-marques-chart" width="800" height="700"></canvas>
                  </div>
                </div>
              </div>
            </div>


            <div class="card">
              <div class="" id="headingThree">
                <button class="btn btn-link card-header w-100 text-decoration-none" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  <h5 class="mb-0 card-title fw-semibold text-start">Points marqués/soirée
                  </h5>
                </button>
              </div>
              <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                <div class="card-body">
                  <div class="d-flex align-items-center flex-column flex-md-row w-100">
                    <button id="toggleAllPointsMarques" class="btn btn-primary">Décocher tout</button>
                  </div>

                  <div class="card-body mt-3" style="height: 700px!important; padding: 0px!important;">
                    <canvas id="points-marques-chart" width="800" height="700"></canvas>
                  </div>
                </div>
              </div>
            </div>


          </div>


          <!--
        <div class="py-6 px-6 text-center">
          <p class="mb-0 fs-4">Design and Developed by <a href="https://adminmart.com/" target="_blank"
              class="pe-1 text-primary text-decoration-underline">AdminMart.com</a> Distributed by <a
              href="https://themewagon.com">ThemeWagon</a></p>
        </div>-->
        </div>
      </div>
    </div>
    <script>
      var ctx = document.getElementById('global-chart').getContext('2d');
      var data = {
        labels: [],
        datasets: []
      };

      <?php
      function getRandomColor()
      {
        return sprintf('#%06X', mt_rand(0, 0xFFFFFF));
      }

      $directory = './soirees/';
      $files = glob($directory . '*.json');

      // Créer un tableau pour stocker les données brutes
      $rawData = [];

      foreach ($files as $file) {
        $json = file_get_contents($file);
        $data = json_decode($json, true);
        $date = basename($file, '.json');
        $date = DateTime::createFromFormat('d-m', $date);
        $rawData[$date->format('Ymd')] = $data;
      }

      // Trier le tableau par clé (date)
      ksort($rawData);

      $labels = [];
      $datasets = [];

      // Créer un tableau pour stocker les données de chaque joueur
      $playerData = [];

      foreach ($rawData as $date => $data) {
        $date = DateTime::createFromFormat('Ymd', $date);
        $labels[] = $date->format('d/m');

        foreach ($data as $player) {
          $nom = $player['nom'] . ' ' . $player['prenom'];
          $argent = $player['argent'];
          $points = $player['points'];
          $derniergain = $player['derniergain'];
          $ensoiree = $player['ensoiree'];
          $color = getRandomColor();
          $nbpresence = $player['nbpresence'];


          if (!isset($playerData[$nom])) {
            $playerData[$nom] = [
              'label' => $nom,
              'data' => [],
              'backgroundColor' => $color,
              'borderColor' => $color,
              'fill' => false,
            ];
          }

          // Remplir les valeurs manquantes avec 10000
          while (count($playerData[$nom]['data']) < count($labels) - 1) {
            $playerData[$nom]['data'][] = 10000;
          }

          if ($playerData[$nom]['nbpresence'] < $nbpresence || $playerData[$nom]['nbpresence'] == null) {
            $playerData[$nom]['nbpresence'] = $nbpresence;
          }

          $playerData[$nom]['data'][] = $argent;
        }
      }


      //on enlève les joueurs qui ont un nbpresence < 2
      foreach ($playerData as $nom => $player) {
        if ($player['nbpresence'] < 2) {
          unset($playerData[$nom]);
        }
      }

      $datasets = array_values($playerData);

      ?>

      data.labels = <?php echo json_encode($labels); ?>;
      data.datasets = <?php echo json_encode($datasets); ?>;



      var myChart = new Chart(ctx, {
        type: 'line',
        data: data,
        options: {
          responsive: true,
          maintainAspectRatio: false,
          scales: {
            y: {
              beginAtZero: false
            }
          }
        }
      });
    </script>


    <script>
      document.getElementById('toggleAll').addEventListener('click', function() {
        var datasets = myChart.data.datasets;

        for (var i = 0; i < datasets.length; i++) {
          datasets[i].hidden = !datasets[i].hidden;
        }

        myChart.update();
      });
    </script>




    <!-- /////////////////////////////////////// autre graph /////////////////////////////////////////// -->



    <script>
      var ctxPoints = document.getElementById('points-chart').getContext('2d');
      var dataPoints = {
        labels: [],
        datasets: []
      };

      <?php
      // Utiliser la même logique que pour le premier graphique, mais en ajustant les données et les propriétés nécessaires

      $playerDataPoints = [];

      foreach ($rawData as $date => $data) {
        $date = DateTime::createFromFormat('Ymd', $date);

        foreach ($data as $player) {
          $nom = $player['nom'] . ' ' . $player['prenom'];


          $points = $player['points'];

          $color = getRandomColor();

          if (!isset($playerDataPoints[$nom])) {
            $playerDataPoints[$nom] = [
              'label' => $nom,
              'data' => [],
              'backgroundColor' => $color,
              'borderColor' => $color,
              'fill' => false,
            ];
          }




          $playerDataPoints[$nom]['data'][] = $points;
        }
      }

      //si il manque des valeurs à des joueurs on remplie les premières manquantes par 0
      foreach ($playerDataPoints as $nom => $player) {
        while (count($playerDataPoints[$nom]['data']) < count($labels)) {
          array_unshift($playerDataPoints[$nom]['data'], 0);
        }
      }

      //on enlève les joueurs qui ont tous leurs points à 0
      foreach ($playerDataPoints as $nom => $player) {
        if (array_sum($playerDataPoints[$nom]['data']) == 0) {
          unset($playerDataPoints[$nom]);
        }
      }



      $datasetsPoints = array_values($playerDataPoints);
      ?>

      dataPoints.labels = <?php echo json_encode($labels); ?>;
      dataPoints.datasets = <?php echo json_encode($datasetsPoints); ?>;

      var myChartPoints = new Chart(ctxPoints, {
        type: 'line',
        data: dataPoints,
        options: {
          responsive: true,
          maintainAspectRatio: false,
          scales: {
            y: {
              beginAtZero: true
            }
          }
        }
      });
    </script>

    <script>
      document.getElementById('toggleAllPoints').addEventListener('click', function() {
        var datasetsPoints = myChartPoints.data.datasets;

        for (var i = 0; i < datasetsPoints.length; i++) {
          datasetsPoints[i].hidden = !datasetsPoints[i].hidden;
        }

        myChartPoints.update();
      });
    </script>





    <!-- /////////////////////////////////////// autre graph /////////////////////////////////////////// -->





    <script>
      var ctxPointsMarques = document.getElementById('points-marques-chart').getContext('2d');
      var dataPointsMarques = {
        labels: [],
        datasets: []
      };

      <?php
      // Utiliser la même logique que pour les autres graphiques, mais en ajustant les données et les propriétés nécessaires

      $playerDataPointsMarques = [];

      $first_fichier = true;

      foreach ($rawData as $date => $data) {
        $date = DateTime::createFromFormat('Ymd', $date);

        foreach ($data as $player) {
          $nom = $player['nom'] . ' ' . $player['prenom'];
          $points = $player['points'];


          $color = getRandomColor();

          if (!isset($playerDataPointsMarques[$nom])) {
            $playerDataPointsMarques[$nom] = [
              'label' => $nom,
              'data' => [],
              'backgroundColor' => $color,
              'borderColor' => $color,
              'fill' => false,
              'showLine' => false,
              'pointRadius' => 7,
            ];
          }

          $dernierGain = $playerDataPointsMarques[$nom]['derniergain'];

          if (!isset($dernierGain)) {
            $dernierGain = 0;
          }

          // Calculer la différence de points
          $pointsMarques = $points - $dernierGain;

          $playerDataPointsMarques[$nom]['data'][] = $pointsMarques;

          $playerDataPointsMarques[$nom]['derniergain'] = $points;
        }
      }

      //si il manque des valeurs à des joueurs on remplie les premières manquantes par 0
      foreach ($playerDataPointsMarques as $nom => $player) {
        while (count($playerDataPointsMarques[$nom]['data']) < count($labels)) {
          array_unshift($playerDataPointsMarques[$nom]['data'], 0);
        }
      }

      //on enlève les joueurs qui ont tous leurs points à 0
      foreach ($playerDataPointsMarques as $nom => $player) {
        if (array_sum($playerDataPointsMarques[$nom]['data']) == 0) {
          unset($playerDataPointsMarques[$nom]);
        }
      }





      $datasetsPointsMarques = array_values($playerDataPointsMarques);
      ?>

      dataPointsMarques.labels = <?php echo json_encode($labels); ?>;
      dataPointsMarques.datasets = <?php echo json_encode($datasetsPointsMarques); ?>;

      var myChartPointsMarques = new Chart(ctxPointsMarques, {
        type: 'line',
        data: dataPointsMarques,
        options: {
          responsive: true,
          maintainAspectRatio: false,
          scales: {
            y: {
              beginAtZero: true
            }
          }
        }
      });
    </script>

    <script>
      document.getElementById('toggleAllPointsMarques').addEventListener('click', function() {
        var datasetsPointsMarques = myChartPointsMarques.data.datasets;

        for (var i = 0; i < datasetsPointsMarques.length; i++) {
          datasetsPointsMarques[i].hidden = !datasetsPointsMarques[i].hidden;
        }

        myChartPointsMarques.update();
      });
    </script>





    <!-- /////////////////////////////////////// autre graph /////////////////////////////////////////// -->





    <script>
      var ctxArgentMarques = document.getElementById('argent-marques-chart').getContext('2d');
      var dataArgentMarques = {
        labels: [],
        datasets: []
      };

      <?php
      // Utiliser la même logique que pour les autres graphiques, mais en ajustant les données et les propriétés nécessaires

      $playerDataArgentMarques = [];

      $first_fichier = true;

      foreach ($rawData as $date => $data) {
        $date = DateTime::createFromFormat('Ymd', $date);

        foreach ($data as $player) {
          $nom = $player['nom'] . ' ' . $player['prenom'];
          $argent = $player['argent'];
          $nbpresence = $player['nbpresence'];


          $color = getRandomColor();

          if (!isset($playerDataArgentMarques[$nom])) {
            $playerDataArgentMarques[$nom] = [
              'label' => $nom,
              'data' => [],
              'backgroundColor' => $color,
              'borderColor' => $color,
              'fill' => false,
              'showLine' => false,
              'pointRadius' => 7,
            ];
          }

          if ($playerDataArgentMarques[$nom]['nbpresence'] < $nbpresence || $playerDataArgentMarques[$nom]['nbpresence'] == null) {
            $playerDataArgentMarques[$nom]['nbpresence'] = $nbpresence;
          }



          $dernierGain = $playerDataArgentMarques[$nom]['derniergain'];

          if (!isset($dernierGain)) {
            $dernierGain = 10000;
          }

          // Calculer la différence de points
          $argentMarques = $argent - $dernierGain;

          $playerDataArgentMarques[$nom]['data'][] = $argentMarques;

          $playerDataArgentMarques[$nom]['derniergain'] = $argent;
        }
      }

      //si il manque des valeurs à des joueurs on remplie les premières manquantes par 0
      foreach ($playerDataArgentMarques as $nom => $player) {
        while (count($playerDataArgentMarques[$nom]['data']) < count($labels)) {
          array_unshift($playerDataArgentMarques[$nom]['data'], 0);
        }
      }




      $datasetsArgentMarques = array_values($playerDataArgentMarques);
      ?>

      dataArgentMarques.labels = <?php echo json_encode($labels); ?>;
      dataArgentMarques.datasets = <?php echo json_encode($datasetsArgentMarques); ?>;

      var myChartArgentMarques = new Chart(ctxArgentMarques, {
        type: 'line',
        data: dataArgentMarques,
        options: {
          responsive: true,
          maintainAspectRatio: false,
          scales: {
            y: {
              beginAtZero: true
            }
          }
        }
      });
    </script>

    <script>
      document.getElementById('toggleAllArgentMarques').addEventListener('click', function() {
        var datasetsArgentMarques = myChartArgentMarques.data.datasets;

        for (var i = 0; i < datasetsArgentMarques.length; i++) {
          datasetsArgentMarques[i].hidden = !datasetsArgentMarques[i].hidden;
        }

        myChartArgentMarques.update();
      });
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