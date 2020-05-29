<?php
	include('body/topbar.php');
	include('body/header.php');
	include('body/menu.php');
?>
<div class="info">
	<?php
		foreach ($infos as $info) {
		?>	
			<h2 class="header header-form"><?=  $info->pseudo ?></h2><br/>
			<img src="avatar/<?=  $info->avatar ?>" height="200" width="150" alt="avatar">
			<p><b class="icon-mail">Email</b> :<em><?= $info->email ?></em></p>
			<p><b>Sexe</b> :<em><?= $info->sexe ?></em></p>
			<p><b>Situation</b> :<em><?= $info->situation ?></em></p>
			<p><b>A propos de vous</b> :<em><?= $info->apropos ?></em></p>
			<p class="photo"><b><a href="index.php?page=photos" class="icon-picture" style="color: black;">Photos</a></b></p>

			<?php
		}
	?>
	
</div>
<div class="en_ligne">
	<a href="index.php?page=en_ligne">Accèder aux membres en ligne?</a>
</div>