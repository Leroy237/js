<?php
	include('body/topbar.php');
	include('functions/membre.func.php');
	include('body/header.php');
	include('body/menu.php');

?>

<h2 class="header header-form">Paramètres</h2>

<div>
	<p class="icon-user-delete"><a href="index.php?page=logout">se déconnecter</a></p>
	<p class="icon-pencil"><a href="index.php?page=update">Changer vos informations</a></p>
	
	<p class="icon-mail"><a href="index.php?page=modifieremail">Changer votre email</a></p>
	<p class="icon-lock-open"><a href="index.php?page=modifiermdp">Changer votre mot de passe</a></p>
	<p class="icon-user"><a href="index.php?page=update_avatar">Changer votre photo de profil</a></p>
</div>