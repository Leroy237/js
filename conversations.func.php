<?php
//la function qui va récuperer les conversations

	function recup_conversation(){
		$bd = new PDO('mysql:host=localhost;dbname=rs', 'root', '');
	$results = array();
	$pseudo = $_SESSION['pseudo'];
	  $res = $bd->query("SELECT conversations.id_conversation, conversations.sujet_conversation,utilisateurs.pseudo,utilisateurs.avatar,conversations_messages.date_message FROM conversations LEFT JOIN conversations_messages ON conversations.id_conversation = conversations_messages.id_conversation INNER JOIN conversations_membres ON conversations.id_conversation = conversations_membres.id_conversation INNER JOIN utilisateurs ON utilisateurs.pseudo = conversations_messages.pseudo_exp WHERE pseudo_dest = '$pseudo' GROUP BY conversations.id_conversation ORDER BY conversations_messages.date_message DESC") or die(mysql_error());
	

	while ($row = $res->fetchObject()) {
		$results[] = $row;
	}
	return $results;
	}
?>