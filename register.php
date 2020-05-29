<?php
	if(islogged() == 1){
		header("Location: index.php?page=membre");

	}


?>
<?php
include('body/topbar.php');
?>
<h2 class="header header-form">Inscription</h2>
<br/><br/>
<?php
	if (isset($_POST['submit'])) {
		$sexe = htmlspecialchars(trim($_POST['sexe']));
		$situation = htmlspecialchars(trim($_POST['situation']));
		$pseudo = htmlspecialchars(trim($_POST['pseudo']));
		$password = htmlspecialchars(trim($_POST['password']));
		$repeatpassword = htmlspecialchars(trim($_POST['repeatpassword']));
		$email = htmlspecialchars(trim($_POST['email']));
		$apropos = htmlspecialchars($_POST['apropos']);
		
		if ($password != $repeatpassword) {
			$errors[] = "Vos deux mots de passe ne sont pas identiques";
		}
		if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
			$errors[] = "Votre adresse email n'est pas correcte";
		}
		
		if (pseudo_existe($pseudo) == 1) {
			$errors[] = "Ce pseudo n'est pas disponible";
		}
		if (email_existe($email) == 1) {
			$errors[] = "Cette email existe déja";
		}
		if (!empty($errors)) {
			foreach ($errors as $error) {
				echo "<div class='error'>".$error."</div>";
			}
		}else{
			inscrire_utilisateur($pseudo, $password, $email, $sexe, $situation, $apropos);
			die('incription terminée, vous pouvez vous  <a href=\'index.php?page=login\'>connecter</a>');
		}
	}

?>

<form method="post" action="" id="regform">
	
	<div class="field">
		<label for="pseudo" class="field-label">Votre pseudo:</label>
		<input type="text" name="pseudo" id="pseudo" class="field-input" value="<?php echo isset($pseudo)? $pseudo:''; ?>">
	</div><br/>
	<br/>
	<div class="field">
		<label for="password" class="field-label">Votre password:</label>
		<input type="password" name="password" id="password" class="field-input">
	</div><br/>
	<br/>
	<div class="field">
		<label for="repeatpassword" class="field-label">Repetez votre mot de passe:</label>
		<input type="password" name="repeatpassword" id="repeatpassword" class="field-input">
	</div><br/>
	<br/>
	<div class="field">
		<label for="email" class="field-label">Votre email:</label>
		<input type="email" name="email" id="email" class="field-input" value="<?php echo isset($email)? $email:''; ?>">
	</div><br/>
	<br/>
	<div class="field">
		<label for='sexe' class="field-label">Sexe</label>
		<select name="sexe" class="field-input">

			<option value="Homme">Homme</option>
			<option value="Femme">Femme</option>
		</select>
	</div><br/><br/>
	<div class="field">
		<label for='situation' class="field-label">Situation</label>
		<select name="situation" class="field-input">
			<opion value="Célibataire">Célibataire</opion>
			<option value="En couple">En couple</option>
			<option value="Divorcé(e)">Divorcé(e)</option>
			<option value="Veuf(ve)">Veuf(ve)</option>
		</select>
	</div><br/><br/>
	<div class="field">
		<label for="apropos" class="field-label">A propos de vous</label>
		<input name="apropos" id="apropos" class="field-input" value="<?php echo isset($apropos)? $apropos:''; ?>" placeholder="évitez les caractères; n'écrire que des lettres; sinon votre compte ne sera pas créer">
	</div><br/><br>
	<button type="submit" name="submit">S'inscrire</button>
</form>
