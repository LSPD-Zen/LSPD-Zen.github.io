<?php
include('api_config.php');

header("Access-Control-Allow-Origin: *");


if( !empty($_GET['password']) and !empty($_GET['plaques'])){
	//Si toutes les données sont saisie par le client


    //Et si le mot de passe est le bon
    if($_GET['password'] == bourlay){
    $boolean1 = false;

    $plaquedecode = urldecode($_GET['plaques']);
    //print $plaquedecode;

    $array = explode(',',$plaquedecode);
    //print_r($array);

    $resray = Array();



    foreach ($array as $value){
        // Get contents of the lspd table
        $reponse = $bdd->query('SELECT MAX(fin) AS fin FROM controle WHERE plaque = '.$value);

        // Display each entry one by one
        while ($data = $reponse->fetch()) {

            if ($data['fin'] == null){
                $resray[str_replace("'", "", $value)] = Array("modele"=>"non defini","controle"=>"le plus rapidement possible");

            }else {
                $reponse2 = $bdd->query('SELECT modele FROM plaque WHERE plaque = '.$value);

                // Display each entry one by one
                while ($data2 = $reponse2->fetch()) {
                    $resray[str_replace("'", "", $value)] = Array("modele"=>$data2['modele'],"controle"=>$data['fin']);
                }
                $reponse2->closeCursor(); // Complete query
            }
        }
        $reponse->closeCursor(); // Complete query
    }

    //print_r($resray);

    //$sql = 'SELECT  FROM controle WHERE plaque IN ('.$plaquedecode.')';
    //print $sql;

    $msg = "voici la liste des controle";
    $data = $resray;
    $success = true;
     }else {
        $msg = "Le mot de passe est incorrect";
}
} else {
	$msg = "Il manque des informations";
}

reponse_json($success, $data, $msg);