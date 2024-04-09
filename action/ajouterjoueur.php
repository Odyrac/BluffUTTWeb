<?php

include './../pass.php';

if (!isset($_COOKIE['password']) || $_COOKIE['password'] != $password_global) {
    header('Location: ../admin.php?error=auth');
    exit();
}

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];

$nom = strtoupper($nom);
$prenom = ucfirst(strtolower($prenom));

$argent = 10000;
$ensoiree = "false";
$nbpresence = 0;
if (isset($_POST['checkbox'])) {
    $argent = 9000;
    $ensoiree = "true";
    $nbpresence = 1;
}

//on récupère le contenu de joueurs.json
$json_data = file_get_contents('../bdd/joueurs.json');
$joueurs = json_decode($json_data, true);



$alreadyexist = false;

foreach ($joueurs as $joueur) {
    if ($joueur['nom'] == $nom && $joueur['prenom'] == $prenom) {
        $alreadyexist = true;
    }
}

if ($alreadyexist) {
    header('Location: ../admin.php?error=nomprenom');
} else if ($nom == "" || $prenom == "") {
    header('Location: ../admin.php?error=nomprenom');
} else {

    //on ajoute un nouveau joueur dans le tableau joueurs
    $joueurs[] = array(
        'nom' => $nom,
        'prenom' => $prenom,
        'argent' => $argent,
        'points' => 0,
        'derniergain' => 0,
        'ensoiree' => $ensoiree,
        'nbpresence' => $nbpresence,
        'recavecesoir' => 0

    );

    //on réencode en json
    $json_data = json_encode($joueurs, JSON_PRETTY_PRINT);

    //on réécrit le fichier joueurs.json
    file_put_contents('../bdd/joueurs.json', $json_data);

    //on redirige vers admin.php
    header('Location: ../admin.php?success=ajoutjoueur');
}