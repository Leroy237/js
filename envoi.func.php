<?php
//la fonction qui va enregister l'invatation dans la base de donnée

	function enregistre_invitation(){

		$db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
		$pseudo_exp = $_SESSION['pseudo'];
		$pseudo_dest = $_GET['pseudo'];
		$query = "INSERT INTO amis(id_invitation,pseudo_exp,pseudo_dest,date_invitation,date_confirmation,active) VALUES ('','$pseudo_exp','$pseudo_dest',NOW(),NOW(),0)";
		mysqli_query($db, $query);
	}