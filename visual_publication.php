<?php
include('body/topbar.php');
	include('functions/membre.func.php');
	
	
	
	if (isset($_GET['id']) AND !empty($_GET['id'])) {
		$get_id = htmlspecialchars($_GET['id']);

		$bd = new PDO('mysql:host=localhost;dbname=rs', 'root', '');
		$article = $bd->prepare('SELECT * FROM articles WHERE id = ?');
		$article->execute(array($get_id));


		if ($article->rowCount() == 1) {
			$article = $article->fetch();
			$id = $article['id'];
			$titre = $article['titre'];
			$contenu = $article['contenu'];

			$likes = $bd->prepare('SELECT id FROM likes WHERE id_publication = ?');
			$likes->execute(array($id));
			$likes = $likes->rowCount();

			$dislikes = $bd->prepare('SELECT id FROM dislikes WHERE id_publication = ?');
			$dislikes->execute(array($id));
			$dislikes = $dislikes->rowCount();

			$commentaire = $bd->prepare('SELECT id_commentaire FROM commentaires WHERE id_post = ?');
			$commentaire->execute(array($id));
			$commentaire = $commentaire->rowCount();
		}else{
			die('cet publication n\'existe pas');
		}
	}else{
		die('une erreur est survenue');
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		body{
			background-color: #383838;
		}
	</style>
</head>
<body>
	<center>
		<p><?= $contenu ?></p>
	<img src="miniature/<?= $id ?>.jpg" width="400" height="500"><br/>
	<a href="index.php?page=action&type=1&id=<?= $id ?>" class="icon-heart"></a> (<?= $likes ?>)
	<a href="index.php?page=action&type=2&id=<?= $id ?>">je n'aime pas </a> (<?= $dislikes ?>)
	<a href="index.php?page=commentaire&id=<?= $id ?>">commentaire</a> (<?= $commentaire ?>)
	</center>
</body>
</html>