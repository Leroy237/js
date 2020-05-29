<div class="entete">
	<?php
		$infos = infos_membre();

		foreach ($infos as $info) {
			
		 ?>
		Bienvenue <strong><?= $info->pseudo ?>!</strong>
		<span class="nbr">(<?php echo nombre_membre() > 1 ? nombre_membre().' membres' : nombre_membre().' membre'; ?>)</span>
		<?php
	}
	if (!isset($_SESSION['pseudo'])) {
		header("Location: index.php?page=login");
	}
	?>
		
</div>