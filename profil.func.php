<?php
// la fonction qui va recuperer les informations de la personne chois

	function recupere_info_membre_choisi(){
		$bd = new PDO('mysql:host=localhost;dbname=rs', 'root', '');
	$results = array();
	$pseudo = $_GET['pseudo'];
	  $res = $bd->query("SELECT * FROM utilisateurs WHERE pseudo = '$pseudo'");
	

	while ($row = $res->fetchObject()) {
		$results[] = $row;
	}
	return $results;
	}

//la function qui va vérifier si une demande existe entre les 2 membres

	function demande_existe(){
		$bd = new PDO('mysql:host=localhost;dbname=rs', 'root', '');
		$pseudo_exp = $_SESSION['pseudo'];
		$pseudo_dest = $_GET['pseudo'];
     		$res = $bd->query("SELECT COUNT(id_invitation) AS nbr FROM amis WHERE pseudo_exp='$pseudo_exp' AND pseudo_dest='$pseudo_dest' OR pseudo_exp='$pseudo_dest' AND pseudo_dest='$pseudo_exp'");
     		$don = $res->fetch();
     		$res->closeCursor();

     		return $don['nbr'];
	}

//la function qui va vérifier si le destinataire a accepté la demande

	function accepter_demande(){
		$bd = new PDO('mysql:host=localhost;dbname=rs', 'root', '');
		$pseudo_exp = $_SESSION['pseudo'];
		$pseudo_dest = $_GET['pseudo'];
     		$res = $bd->query("SELECT active FROM amis WHERE pseudo_exp='$pseudo_exp' AND pseudo_dest='$pseudo_dest' OR pseudo_exp='$pseudo_dest' AND pseudo_dest='$pseudo_exp'");
     		
     		while ($row = $res->fetch()) {
		if ($row['active'] == 0) {
			return false;
		}else{
			return true;
		}
	}
	
	}

//la fonction qui va vérifier si le membre connecté est l'expéditeur

	function verifier_expediteur(){
		$bd = new PDO('mysql:host=localhost;dbname=rs', 'root', '');
		$pseudo_exp = $_SESSION['pseudo'];
		$pseudo_dest = $_GET['pseudo'];
     		$res = $bd->query("SELECT COUNT(id_invitation) AS nbr FROM amis WHERE pseudo_exp='$pseudo_exp' AND pseudo_dest='$pseudo_dest'");
     		$don = $res->fetch();
     		$res->closeCursor();

     		return $don['nbr'];
	}
?>