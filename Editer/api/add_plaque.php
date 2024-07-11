<?php
include('api_config.php');

header("Access-Control-Allow-Origin: *");


if( !empty($_GET['password']) and !empty($_GET['plaque']) and !empty($_GET['nom']) and !empty($_GET['modele'])){
	//Si toutes les données sont saisie par le client


    //Et si le mot de passe est le bon
    if($_GET['password'] == bourlay){
    $boolean1 = false;
    $boolean2 = false;
    $pseudo = "System";

    $req = $bdd->prepare('INSERT INTO plaque (plaque,proprietaire,modele,date,par) VALUES(?, ?, ?, NOW() + INTERVAL 1 HOUR,?)');
    $boolean1 = $req->execute(array($_GET['plaque'], $_GET['nom'], $_GET['modele'],$pseudo));


    if($boolean1) {
        $commentaire = 'System : nouveau vehicule';
    
        $req2 = $bdd->prepare('INSERT INTO controle (horodateur,plaque,nom,commentaire,fin,par) VALUES(NOW() + INTERVAL 1 HOUR,?,?,?,NOW() + INTERVAL 30 DAY,?)');
        $boolean2 = $req2->execute(array($_GET['plaque'], $_GET['nom'], $commentaire, $pseudo));


        if ($boolean1 and $boolean2) {
            $success = true;
            $msg = 'Le vehicule a bien ete ajoute';
        } else {
            $msg = "Une erreur s'est produite";
        }
    }else{
        $msg = "Une voiture avec cette plaque existe deja";
    }
     }else {
        $msg = "Le mot de passe est incorrect";
}
} else {
	$msg = "Il manque des informations";
}

reponse_json($success, $data, $msg);