<?php
//la fonction qui va vérifier si le pseudo existe et si la personne n'essaie pas de s'auto envoyer un message

	function pseudo_incorrect(){
		$bd = new PDO('mysql:host=localhost;dbname=rs', 'root', '');
		$pseudo_exp = $_SESSION['pseudo'];
		$pseudo_dest = $_GET['pseudo'];
		
     		$res = $bd->query("SELECT COUNT(pseudo) AS nbr FROM utilisateurs WHERE pseudo='$pseudo_dest' AND pseudo!='$pseudo_exp'");
     		$don = $res->fetch();
     		$res->closeCursor();

     		return $don['nbr'];
	}

//la fonction qui va creer la conversation et le message qui va avec

	function creer_conversation($sujet,$message){
		$db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
		
		$query = "INSERT INTO conversations (id_conversation,sujet_conversation) VALUES ('','$sujet')";
		mysqli_query($db, $query);

		
		$id = mysqli_insert_id($db);
		$pseudo_exp = $_SESSION['pseudo'];
		$res = "INSERT INTO conversations_messages (id_conversation,pseudo_exp,corps_message,date_message) VALUES ('$id','$pseudo_exp','$message',NOW())";
		mysqli_query($db, $res);
		$id = mysqli_insert_id($db);
		$pseudo_dest = $_GET['pseudo'];
		$req = "INSERT INTO conversations_membres (id_conversation,pseudo_dest) VALUES ('$id','$pseudo_dest')";
		mysqli_query($db, $req);
	}
?>