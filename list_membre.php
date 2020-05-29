<?php
	include('body/topbar.php');
	include('functions/membre.func.php');
	include('body/header.php');
	include('body/menu.php');
?>

<h2 class="header header-form">Les membres</h2><br/>
<?php
	$pseudos_avatars = recuperer_avatar_list_membre();

	if(!empty($pseudos_avatars)){

		foreach ($pseudos_avatars as $pseudo_avatar) {
		  ?>
		  <div class="list_membre">
		  	<a href="index.php?page=profil&pseudo=<?= $pseudo_avatar->pseudo ?>"><img src="avatar/<?= $pseudo_avatar->avatar ?>" height="50" width="50" alt="avatar" class="select"></a>
		  	<p><a href="index.php?page=profil&pseudo=<?= $pseudo_avatar->pseudo ?>"><span><?= $pseudo_avatar->pseudo ?></span></a></p>
		  	<span><?= $pseudo_avatar->email ?></span>
		  </div>
		  <?php
		}
	}else{
		echo "<div class='error'>Vous êtes le seul membre!</div>";
	}

?>