<?php
//la fonction qui va récupérer l'avatar et les membres du site

function recuperer_avatar_list_membre(){
	$bd = new PDO('mysql:host=localhost;dbname=rs', 'root', '');
	$results = array();
	$pseudo = $_SESSION['pseudo'];
	  $res = $bd->query("SELECT pseudo,email,avatar FROM utilisateurs WHERE pseudo != '$pseudo'");
	

	while ($row = $res->fetchObject()) {
		$results[] = $row;
	}
	return $results;
}

?>