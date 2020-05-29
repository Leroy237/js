<?php
	include('body/topbar.php');
	include('functions/membre.func.php');
	include('body/header.php');
	include('body/menu.php');

?>
<h2 class="header header-form">Vos amis</h2> <br/>

<?php
$liste_amis_exp = liste_amis_exp();
$liste_amis_dest = liste_amis_dest();

	foreach ($liste_amis_exp as $liste_ami_exp) {
		?>
			<div class="list_membre">
			<a href="index.php?page=profil&pseudo=<?= $liste_ami_exp->pseudo_dest ?>"><img src="avatar/<?= $liste_ami_exp->avatar ?>" height="100" width="100" alt="avatar"  class="select"></a>
			<p><a href="index.php?page=profil&pseudo=<?= $liste_ami_exp->pseudo_dest ?>"><?= $liste_ami_exp->pseudo_dest ?></a></p>
			</div>
		<?php
	}
	foreach ($liste_amis_dest as $liste_ami_dest) {
		?>
			<div class="list_membre">
			<a href="index.php?page=profil&pseudo=<?= $liste_ami_dest->pseudo_exp ?>"><img src="avatar/<?= $liste_ami_dest->avatar ?>" height="100" width="100" alt="avatar"  class="select"></a>
			<p><a href="index.php?page=profil&pseudo=<?= $liste_ami_dest->pseudo_exp ?>"><?= $liste_ami_dest->pseudo_exp ?></a></p>
		</div>
		<?php
	}

if (empty($liste_amis_exp) && empty($liste_amis_dest)) {
	?>
		<div class="error">Vous n'avez pas d'amis</div>
	<?php
}
?>