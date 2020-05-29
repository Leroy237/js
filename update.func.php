<?php
//la fonction qui va changer les informations de l'utisateurs
	function changer_infos($sexe, $situation, $apropos){
		$db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
		$sess = $_SESSION['pseudo'];
		$query = "UPDATE utilisateurs SET pseudo='$pseudo' email='$email',sexe='$sexe',situation='$situation',apropos='$apropos' WHERE pseudo='$sess'";
		mysqli_query($db, $query);
	}
?>