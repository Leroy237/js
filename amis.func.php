<?php
//la fonction qui afficha la liste d'amis de l'expéditeur

	function liste_amis_exp(){
		$bd = new PDO('mysql:host=localhost;dbname=rs', 'root', '');
	$results = array();
	$pseudo = $_SESSION['pseudo'];
	  $res = $bd->query("SELECT pseudo_dest,avatar FROM amis INNER JOIN utilisateurs ON utilisateurs.pseudo = amis.pseudo_dest WHERE pseudo_exp = '$pseudo' AND active=1");
	

	while ($row = $res->fetchObject()) {
		$results[] = $row;
	}
	return $results;

	}

//la fonction qui afficha la liste d'amis du destinataire

	function liste_amis_dest(){
		$bd = new PDO('mysql:host=localhost;dbname=rs', 'root', '');
	$results = array();
	$pseudo = $_SESSION['pseudo'];
	  $res = $bd->query("SELECT pseudo_exp,avatar FROM amis INNER JOIN utilisateurs ON utilisateurs.pseudo = amis.pseudo_exp WHERE pseudo_dest = '$pseudo' AND active=1");
	

	while ($row = $res->fetchObject()) {
		$results[] = $row;
	}
	return $results;

	}
?>