<?php
//la fonction qui va supprimer un amis

	function supprimer_amis(){
		$db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
		$pseudo_exp = $_SESSION['pseudo'];
		$pseudo_dest = $_GET['pseudo'];
		$query = "DELETE FROM amis WHERE pseudo_exp='$pseudo_exp' AND pseudo_dest='$pseudo_dest' OR pseudo_exp='$pseudo_dest' AND pseudo_dest='$pseudo_exp'";
		mysqli_query($db, $query);
	}
?>