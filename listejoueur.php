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
                                <h5 class="card-title fw-semibold mb-4">Liste joueurs</h5>
                                <div class="table-responsive">
                                    <table class="table text-nowrap mb-0 align-middle">
                                        <thead class="text-dark fs-4">
                                            <tr>
                                                <th class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0">Joueur</h6>
                                                </th>


                                                <th class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0">Action</h6>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php




                                            $json_data = file_get_contents('./bdd/joueurs.json');
                                            $joueurs = json_decode($json_data, true);


                                            function comparePrenom($a, $b)
                                            {
                                                return strcasecmp($a['prenom'], $b['prenom']);
                                            }

                                            if ($joueurs) {
                                                // Triez les joueurs en utilisant la fonction de comparaison
                                                usort($joueurs, 'comparePrenom');


                                                echo '<form action="./action/sortiejoueur.php" method="post">';
                                                foreach ($joueurs as $joueur) {

                                            ?>

                                                    <tr <?php if ($joueur['ensoiree'] == 'true' && $joueur['arenducesoir'] != "true" && isset($_GET['for']) && $_GET['for'] == 'sortiejoueur') {
                                                            echo 'class="bg-success"';
                                                        } else if ($joueur['ensoiree'] == 'true' && isset($_GET['for']) && $_GET['for'] == 'entrerjoueur') {
                                                            echo 'class="bg-danger"';
                                                        } else if ($joueur['ensoiree'] == 'true' && $joueur['arenducesoir'] != "true" && isset($_GET['for']) && $_GET['for'] == 'recavejoueur') {
                                                            echo 'class="bg-success"';
                                                        }


                                                        ?>>
                                                        <td class="border-bottom-0">
                                                            <h6 class="fw-semibold mb-0"><?php echo $joueur['nom'] . ' ' . $joueur['prenom']; ?></h6>
                                                        </td>

                                                        <td class="border-bottom-0">
                                                            <?php

                                                            if (isset($_GET['for']) && $_GET['for'] == 'sortiejoueur') {
                                                                echo '<input class="form-control" type="number" name="' . $joueur['prenom'] . '||||' . $joueur['nom'] . '" placeholder="Jetons rendus">';
                                                            }

                                                            if (isset($_GET['for']) && $_GET['for'] == 'entrerjoueur') {


                                                                echo '<a href="./action/entrerjoueur.php?nom=' . $joueur['nom'] . '&prenom=' . $joueur['prenom'] . '" class="btn btn-primary">Entrer</a>';
                                                            }

                                                            if (isset($_GET['for']) && $_GET['for'] == 'recavejoueur') {


                                                                echo '<a href="./action/recavejoueur.php?nom=' . $joueur['nom'] . '&prenom=' . $joueur['prenom'] . '" class="btn btn-primary">Recaver</a>';
                                                            }

                                                            ?>
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

                                    <?php
                                    if (isset($_GET['for']) && $_GET['for'] == 'sortiejoueur') {

                                        echo '<button type="submit" class="btn btn-primary">Sortir les joueurs</button>';
                                        echo '</form>';
                                    }
                                    ?>

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