<?php
	$info = afficher_info();
	$infobulle = afficher_infobulle();
	if ($infobulle != 0) {
		?>
			<div class="infobulle">
				<?php
					echo $infobulle;
				?>
			</div>
		<?php
	}

	if ($info != 0) {
		?>
			<div class="infob">
				<?php
					echo $info;
				?>
			</div>
		<?php
	}
?>
<div class="meno">
	<span class="men">
	
		<a href="index.php?page=membre" class="<?php echo($page=='membre') ? 'active':'' ?>"><b class="icon-home">Accueil</b></a>
		<a href="index.php?page=actualites" class="<?php echo($page=='actualites') ? 'active':'' ?>"><b class="icon-globe">Actualités</b></a>
		<a href="index.php?page=list_membre" class="<?php echo($page=='list_membre') ? 'active':'' ?>"><b class="icon-amis">Les membres</b></a>
		<a href="index.php?page=amis" class="<?php echo($page=='amis') ? 'active':'' ?>"><b class="icon-users-1">Vos amis</b></a>
		<a href="index.php?page=invitations" class="<?php echo($page=='invitations') ? 'active':'' ?>"><b class="icon-mail-alt">Invitations</b></a>
		<a href="index.php?page=conversations" class="<?php echo($page=='conversations') ? 'active':'' ?>"><b class="icon-mail">Messages</b></a>
		<a href="index.php?page=notifications" class="<?php echo($page=='notifications') ? 'active':'' ?>"><b class="icon-flag-checkered">Notifications</b></a>
		<a href="index.php?page=parametres" class="<?php echo($page=='parametres') ? 'active':'' ?>"><b class="icon-cog">Paramètres</b></a>
	
	
	</span>
</div>