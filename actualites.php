<?php
include('body/topbar.php');
	include('functions/membre.func.php');
	include('body/header.php');
	include('body/menu.php');
	$articles = publier_post();
	

?>
<h2 class="header header-form">Actualités</h2> <br/>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	
	<center>
		<p id="poster"><a href="index.php?page=post_photo" class="icon-picture" id="arrondi">
	<strong >Publier quelque chose! </strong></a><br/><br/></p>
	<div class="publication">
		<?php
			foreach ($articles as $article) {
				
					
				
					?>
						<table>
							<tr style="background-color: grey;">
								<td><a href="index.php?page=profil&pseudo=<?= $article->pseudo ?>"><img src="avatar/<?=  $article->avatar ?>" height="50" width="50" alt="avatar" style="border-radius: 50%"></a><strong><?= $article->pseudo_post ?></strong></td>
								
							</tr>
							<tr>
								<td><em><?= $article->contenu ?></em></td>
							</tr>
							<tr>
								<td coldiv="2">
									<a href="index.php?page=visual_publication&id=<?= $article->id ?>">
									<img src="miniature/<?= $article->id ?>.jpg" width="350" height="400">
									</a>
								</td>
							</tr>
						</table><br/><br/>
						
						
						
					<?php
				
			}
		?>
	
	</center>
	</div>
</body>
</html>