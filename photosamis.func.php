<?php
//la function qui va récuperer les photos des amis

	function photo_amis(){
		$bd = new PDO('mysql:host=localhost;dbname=rs', 'root', '');
	$results = array();
	$pseudo = $_GET['pseudo'];
	  $res = $bd->query("SELECT avatar FROM utilisateurs WHERE pseudo = '$pseudo'");
	

	while ($row = $res->fetchObject()) {
		$results[] = $row;
	}
	return $results;
	}

	function recup_post(){
		$bd = new PDO('mysql:host=localhost;dbname=rs', 'root', '');
	$results = array();
	$pseudo = $_GET['pseudo'];
	  $res = $bd->query("SELECT * FROM articles WHERE pseudo_post = '$pseudo'");
	

	while ($row = $res->fetchObject()) {
		$results[] = $row;
	}
	return $results;

	}

?>