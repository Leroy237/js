<?php
//la fonction qui recupère le message

	function recup_messages(){
		$bd = new PDO('mysql:host=localhost;dbname=rs', 'root', '');
	$messages = array();
	$pseudo = $_SESSION['pseudo'];
	$getid = $_GET['id'];
	  $res = $bd->query("SELECT conversations_messages.date_message, conversations_messages.corps_message,conversations.sujet_conversation,utilisateurs.pseudo,utilisateurs.avatar FROM conversations_messages INNER JOIN utilisateurs ON utilisateurs.pseudo = conversations_messages.pseudo_exp INNER JOIN conversations_membres ON conversations_messages.id_conversation = conversations_membres.id_conversation INNER JOIN conversations ON conversations_messages.id_conversation = conversations.id_conversation WHERE conversations_messages.id_conversation = '$getid' AND conversations_membres.pseudo_dest = '$pseudo' ORDER BY conversations_messages.date_message DESC") or die(mysql_error());
	

	while ($row = $res->fetchObject()) {
		$messages[] = $row;
	}
	return $messages;
	}
	

?>