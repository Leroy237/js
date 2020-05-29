<?php
	if(islogged() == 1){
		header("Location: index.php?page=membre");

	}


?>
<?php
include('body/topbar.php');
?>
<h2 class="header header-form">Connexion</h2>
<br/><br/>
<?php
	if (isset($_POST['submit'])) {
		if (empty($_POST['pseudo'])) {
			$errors_pseudo = "Veuillez saisir votre pseudo";
		}
		if(empty($_POST['password'])){
			$errors_password = "Veuillez saisir votre mot de passe";
		}
		
		if (verifier_pm($_POST['pseudo'], $_POST['password']) == 0) {
				$errors = "Pseudo ou mot de passe incorrect";
		}else{
			$_SESSION['pseudo'] = $_POST['pseudo'];
			header("Location: index.php?page=membre");
		}
	}
?>
<form method="post" action="" id="logform">
	<div class="field">
		<label for="pseudo" class="field-label">Votre pseudo:</label>
		<input type="text" name="pseudo" class="field-input" id="pseudo"><br/><br/>
	</div>
	<div class="field">
		<label for="password" class="field-label">Votre mot de passe:</label>
		<input type="password" name="password" class="field-input" id="password">
	</div>
	<br/><br/>
	<p class="error"><?php echo(isset($errors)) ? $errors: ''; ?></p>
	<button type="submit" name="submit">Se connecter</button>
	
</form>
