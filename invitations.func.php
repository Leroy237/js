<?php
//la fonctions qui va récuperer les invitations

	function recup_invitation(){
		$bd = new PDO('mysql:host=localhost;dbname=rs', 'root', '');
	$pseudo_dest=$_SESSION['pseudo'];
	
	  $res = $bd->query("SELECT pseudo_exp,date_invitation,active,avatar FROM amis INNER JOIN utilisateurs ON utilisateurs.pseudo = amis.pseudo_exp WHERE pseudo_dest ='$pseudo_dest' ORDER BY date_invitation DESC");
	
	  $results = array();
	while ($row = $res->fetchObject()) {
		$results[] = $row;
	}
	return $results;
	}

//la fonction qui va afficher à l'utilisateur si sa demande a été accepter

	function invitation_accepter(){
		$bd = new PDO('mysql:host=localhost;dbname=rs', 'root', '');
	$results = array();
	$pseudo = $_SESSION['pseudo'];
	  $res = $bd->query("SELECT pseudo_dest,avatar FROM amis INNER JOIN utilisateurs ON utilisateurs.pseudo = amis.pseudo_dest WHERE pseudo_exp = '$pseudo' AND active=1");
	

	while ($row = $res->fetchObject()) {
		$results[] = $row;
	}
	return $results;
	}
?>