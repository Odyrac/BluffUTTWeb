<?php

//on récupère le paramètre nom et prenom de l'url et on enleve dans bdd/joueurs.json 1000 à l'argent du joueur
include './../pass.php';
if (!isset($_COOKIE['password']) || $_COOKIE['password'] != $password_global) {
    header('Location: ../admin.php?error=auth');
    exit();
}

// Chargez le contenu du fichier JSON
$json_data = file_get_contents('../bdd/joueurs.json');

$joueurs = json_decode($json_data, true);

// Parcourez les joueurs pour trouver le joueur correspondant

foreach ($joueurs as &$joueur) {
    if ($joueur['prenom'] == $_GET['prenom'] && $joueur['nom'] == $_GET['nom']) {
        if ($joueur['ensoiree'] == "true") {
            header ('Location: ../admin.php?error=dejaenjeu');
            exit();
        }
        $joueur['argent'] -= 1000;
        $joueur['derniergain'] -= 1000;
        $joueur['ensoiree'] = "true";
        $joueur['nbpresence'] = $joueur['nbpresence'] + 1;
    }
}
// N'oubliez pas de supprimer la référence après la boucle pour éviter des effets non désirés
unset($joueur);

// Encodez les données mises à jour en JSON
$json_data = json_encode($joueurs, JSON_PRETTY_PRINT);

// Enregistrez les données dans le fichier JSON
file_put_contents('../bdd/joueurs.json', $json_data);

header ('Location: ../admin.php?success=recavejoueur');



?>