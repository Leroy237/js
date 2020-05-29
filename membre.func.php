<?php

//la fonction qui recupère les infos de la personne connecter
function infos_membre(){
	$bd = new PDO('mysql:host=localhost;dbname=rs', 'root', '');
	$infos = array();
	$pseudo = $_SESSION['pseudo'];
	  $res = $bd->query("SELECT * FROM utilisateurs WHERE pseudo = '$pseudo'");
	

	while ($row = $res->fetchObject()) {
		$infos[] = $row;
	}
	return $infos;
}

function nombre_membre(){
	$bd = new PDO('mysql:host=localhost;dbname=rs', 'root', '');
     		$res = $bd->query("SELECT COUNT(id_pseudo) AS nbr FROM utilisateurs");
     		$don = $res->fetch();
     		$res->closeCursor();

     		return $don['nbr'];
}
?>