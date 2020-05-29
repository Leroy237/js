<?php

	function inscrire_utilisateur($pseudo, $password, $email, $sexe, $situation, $apropos){
		$db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
		$password = sha1($password);
		$query = "INSERT INTO utilisateurs(pseudo,password,email,sexe,situation,apropos,avatar) VALUES ('$pseudo','$password','$email','$sexe','$situation','$apropos','default.png')";
		mysqli_query($db, $query);
	}
//la function qui verifie si l'utilisateur existe
	function pseudo_existe($pseudo){
		$bd = new PDO('mysql:host=localhost;dbname=rs', 'root', '');
     		$res = $bd->query("SELECT COUNT(id_pseudo) AS nbr FROM utilisateurs WHERE pseudo='$pseudo'");
     		$don = $res->fetch();
     		$res->closeCursor();

     		return $don['nbr'];

	}

	function email_existe($email){
		$bd = new PDO('mysql:host=localhost;dbname=rs', 'root', '');
     		$res = $bd->query("SELECT COUNT(id_pseudo) AS nbr FROM utilisateurs WHERE email='$email'");
     		$don = $res->fetch();
     		$res->closeCursor();

     		return $don['nbr'];
    }
?>
