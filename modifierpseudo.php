<?php
	include('body/topbar.php');
	include('functions/membre.func.php');
	include('body/header.php');
	include('body/menu.php');

?>

<h2 class="header header-form">Modifier mon pseudo</h2>
<br/><br/>

<?php
	if (isset($_POST['submit'])) {
		$pseudo = htmlspecialchars(trim($_POST['pseudo']));
		if (pseudo_existe($pseudo) == 1) {
			$errors[] = "Ce pseudo n'est pas disponible";
		}
		if (!empty($errors)) {
			foreach ($errors as $error) {
				echo "<div class='error'>".$error."</div>";
			}
		}else{

    		update_pseudo($pseudo);
			header("Location: index.php?page=membre");
		}

		
	}
?>

<form method="post" action="" id="upps">
	<div class="field">
			<label for="pseudo" class="field-label">Votre nouveau pseudo</label>
			<input type="pseudo" name="pseudo" class="field-input" id="pseudo">
		</div><br/><br/>
		<button type="submit" name="submit">Modifier</button>
</form>