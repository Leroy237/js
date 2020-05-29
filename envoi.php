<?php
	
	$db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
		$pseudo_exp = $_SESSION['pseudo'];
		$pseudo_dest = $_GET['pseudo'];
		$query = "INSERT INTO amis(id_invitation,pseudo_exp,pseudo_dest,date_invitation,date_confirmation,date_vue,active) VALUES ('','$pseudo_exp','$pseudo_dest',NOW(),NOW(),NOW(),0)";
		mysqli_query($db, $query);
	header("Location :index.php?page=profil&pseudo=".$_GET['pseudo']);
	
?>