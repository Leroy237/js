<?php
include('body/topbar.php');
	include('functions/membre.func.php');
	$bd = new PDO('mysql:host=localhost;dbname=rs', 'root', '');

	if (isset($_GET['id']) AND !empty($_GET['id'])) {
		$getid = $_GET['id'];
		$check = $bd->prepare('SELECT * FROM articles WHERE id = ?');
		$check->execute(array($getid));
		$check = $check->fetch();

		$commentaires = $bd->prepare('SELECT * FROM commentaires WHERE id_post = ?');
		$commentaires->execute(array($getid));

	if (isset($_POST['envoi_commentaire'])) {
		if (isset($_POST['commentaire']) AND !empty($_POST['commentaire'])) {
			$pseudo = $_SESSION['pseudo'];
			$commentaire = htmlspecialchars($_POST['commentaire']);
			$ins = $bd->prepare('INSERT INTO commentaires (id_post,pseudo_commentaire,contenu_commentaire,date_commentaire) VALUES (?,?,?,NOW())');
			$ins->execute(array($getid,$pseudo,$commentaire));
		}else{
			$error = "veuillez éccrire un commentaire";
		}
	}

	}

		$commentaires = $bd->prepare('SELECT * FROM commentaires WHERE id_post = ?');
		$commentaires->execute(array($getid));

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h2 class="header header-form">les commentaires</h2><br/>
	<img src="miniature/<?= $check['id'] ?>.jpg" width="250" height="300"><br/><br/>

	<?php
		while ($comment = $commentaires->fetch()) {
			?>
				<p><strong><?= $comment['pseudo_commentaire'] ?></strong>:<?= $comment['contenu_commentaire'] ?></p>

			<?php
		}

	?>

	<form method="post">
		<input type="text" value="<?= $_SESSION['pseudo'] ?>" disabled="disabled">
		<input type="text" name="commentaire"><br/>
		<input type="submit" name="envoi_commentaire" class="icon-paper-plane">
		
	</form>
	<?php if (isset($error)) {
		echo $error;
	} ?>
</body>
</html>