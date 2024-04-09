<?php
include './../pass.php';
if (!isset($_COOKIE['password']) || $_COOKIE['password'] != $password_global) {
    header('Location: ../admin.php?error=auth');
    exit();
}

// On demande confirmation avant de fermer la soirée
if (!isset($_POST['confirm'])) {
    header('Location: ../admin.php?error=confirmfermersoiree');
    exit();
}


// Relire le fichier JSON mis à jour
$json_data = file_get_contents('../bdd/joueurs.json');
$joueurs = json_decode($json_data, true);

// Si tous les joueurs ont ensoiree = false, on ne fait rien
$allfalse = true;
foreach ($joueurs as $joueur) {
    if ($joueur['ensoiree'] == "true") {
        $allfalse = false;
    }
}
if ($allfalse) {
    header('Location: ../admin.php?error=pasdejoueurensoiree');
    exit();
}



function compareDernierGain($a, $b)
{
    if ($a['derniergain'] == $b['derniergain']) {
        // Si les derniers gains sont égaux, on compare par le montant d'argent
        return $b['argent'] - $a['argent'];
    }
    // Sinon, on compare par les derniers gains
    return $b['derniergain'] - $a['derniergain'];
}


if ($joueurs) {
 

    usort($joueurs, 'compareDernierGain');

    $indice = 1;


    foreach ($joueurs as &$joueur) {
        if ($indice == 1 && $joueur['ensoiree'] == "true") {
            $joueur['points'] = $joueur['points'] + 25;
        } else if ($indice == 2 && $joueur['ensoiree'] == "true") {
            $joueur['points'] = $joueur['points'] + 18;
        } else if ($indice == 3 && $joueur['ensoiree'] == "true") {
            $joueur['points'] = $joueur['points'] + 15;
        } else if ($indice == 4 && $joueur['ensoiree'] == "true") {
            $joueur['points'] = $joueur['points'] + 12;
        } else if ($indice == 5 && $joueur['ensoiree'] == "true") {
            $joueur['points'] = $joueur['points'] + 10;
        } else if ($indice == 6 && $joueur['ensoiree'] == "true") {
            $joueur['points'] = $joueur['points'] + 8;
        } else if ($indice == 7 && $joueur['ensoiree'] == "true") {
            $joueur['points'] = $joueur['points'] + 6;
        } else if ($indice == 8 && $joueur['ensoiree'] == "true") {
            $joueur['points'] = $joueur['points'] + 4;
        } else if ($indice == 9 && $joueur['ensoiree'] == "true") {
            $joueur['points'] = $joueur['points'] + 2;
        } else if ($indice == 10 && $joueur['ensoiree'] == "true") {
            $joueur['points'] = $joueur['points'] + 1;
        }
        $indice++;
    }
}



// Réencodez les données JSON mises à jour
$json_data = json_encode($joueurs);

// Écrivez les données JSON mises à jour dans le fichier
file_put_contents('../bdd/joueurs.json', $json_data);



$json_data = file_get_contents('../bdd/joueurs.json');
$joueurs = json_decode($json_data, true);

// Mettre à jour l'attribut 'ensoiree' de tous les joueurs
foreach ($joueurs as &$joueur) {
    $joueur['derniergain'] = 0;
    $joueur['recavecesoir'] = 0;
    $joueur['ensoiree'] = "false";
    $joueur['arenducesoir'] = "false";
}

$json_data = json_encode($joueurs);
file_put_contents('../bdd/joueurs.json', $json_data);

// On créé un fichier json dans ../soirees/ pour stocker les infos de la soirée fermée (utilisé pour les stats)
$titre = date('d-m');
$titre = $titre . ".json";
$titre = "../soirees/" . $titre;
file_put_contents($titre, $json_data);





header('Location: ../admin.php?success=soireefermee');