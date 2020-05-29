<?php
//function qui va dire les personnes qui ont like ta photos posté

	function dire_like(){
		$bd = new PDO('mysql:host=localhost;dbname=rs', 'root', '');
	$results = array();
	$pseudo = $_SESSION['pseudo'];
	
	  $res = $bd->query("SELECT articles.id,likes.id_publication,articles.pseudo_post,likes.pseudo_membre FROM articles INNER JOIN likes ON likes.id_publication = articles.id WHERE articles.pseudo_post = '$pseudo' AND likes.pseudo_membre != '$pseudo'");
	

	while ($row = $res->fetchObject()) {
		$results[] = $row;
	}
	return $results;
	}

//la fonction qui va dire les personnes qui ont commenté votre photo

	function dire_commentaires(){
		$bd = new PDO('mysql:host=localhost;dbname=rs', 'root', '');
	$results = array();
	$pseudo = $_SESSION['pseudo'];
	
	  $res = $bd->query("SELECT articles.id,commentaires.id_post,articles.pseudo_post,commentaires.pseudo_commentaire FROM articles INNER JOIN commentaires ON commentaires.id_post = articles.id WHERE articles.pseudo_post = '$pseudo' AND commentaires.pseudo_commentaire != '$pseudo'");
	

	while ($row = $res->fetchObject()) {
		$results[] = $row;
	}
	return $results;
	}


?>