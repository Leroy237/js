<?php
	function publier_post(){
		$bd = new PDO('mysql:host=localhost;dbname=rs', 'root', '');
		$results = array();
		$articles = $bd->query('SELECT * FROM articles INNER JOIN utilisateurs ON utilisateurs.pseudo = articles.pseudo_post ORDER BY date_publication DESC');

		while ($row = $articles->fetchObject()) {
		$results[] = $row;
	}
	return $results;
	}
	
	function post_profil(){
		$bd = new PDO('mysql:host=localhost;dbname=rs', 'root', '');
	$results = array();
	
	  $res = $bd->query("SELECT avatar FROM articles INNER JOIN utilisateurs ON utilisateurs.pseudo = articles.pseudo_post ");
	

	while ($row = $res->fetchObject()) {
		$results[] = $row;
	}
	return $results;
	}
?>