<?php
	include('body/topbar.php');
	include('functions/membre.func.php');
	include('body/header.php');
	include('body/menu.php');
?>

<h2 class="header header-form">Photos de <?=$_GET['pseudo']?></h2><br/>

<?php
	foreach (photo_amis() as $photo) {
		?>
			<img src="avatar/<?=  $photo->avatar ?>" height="400" width="350" alt="avatar">

		<?php
	}

	foreach (recup_post() as $article) {
		?>
			<span><a href="index.php?page=visual_publication&id=<?= $article->id ?>">
									<img src="miniature/<?= $article->id ?>.jpg" width="350" height="400">
									</a></span>
		<?php
	}

?>