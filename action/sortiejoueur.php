<?php
include './../pass.php';
if (!isset($_COOKIE['password']) || $_COOKIE['password'] != $password_global) {
    header('Location: ../admin.php?error=auth');
    exit();
}

// Chargez le contenu du fichier JSON
$json_data = file_get_contents('../bdd/joueurs.json');
$joueurs = json_decode($json_data, true);

$erreur = false;

// Parcourez les données POST pour mettre à jour les joueurs
foreach ($_POST as $key => $value) {
    if ($value !== '') {
        $value = intval($value);
        // Parcourez les joueurs pour trouver le joueur correspondant
        foreach ($joueurs as &$joueur) {
            //si le joueur a un espace dans son nom ou prénom, on le remplace par _ pour éviter les erreurs
            $valPrenom = str_replace(' ', '_', $joueur['prenom']);
            $valNom = str_replace(' ', '_', $joueur['nom']);

            if ($valPrenom . '||||' . $valNom == $key) {
                if ($joueur['ensoiree'] == "true" && $joueur['arenducesoir'] != "true") {
                    $joueur['argent'] += $value;
                    $joueur['arenducesoir'] = "true";
                    $joueur['derniergain'] = $joueur['derniergain'] + $value;
                } else {
                    $erreur = true;
                }
            }
        }
        // N'oubliez pas de supprimer la référence après la boucle pour éviter des effets non désirés
        unset($joueur);
    }
}


// Encodez les données mises à jour en JSON
$json_data = json_encode($joueurs, JSON_PRETTY_PRINT);
// Enregistrez les données dans le fichier JSON
file_put_contents('../bdd/joueurs.json', $json_data);

if ($erreur == true) {
    header('Location: ../admin.php?error=pasenjeubis');
    exit();
}

header('Location: ../admin.php?success=sortiejoueur');