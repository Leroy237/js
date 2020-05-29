<?php
	include('body/topbar.php');
	include('functions/membre.func.php');
	include('body/header.php');
	include('body/menu.php');

?>

<h2 class="header header-form">Modifier mon mot de passe</h2>
<br/><br/>

<?php
	if (isset($_POST['submit'])) {
		$password = sha1($_POST['password']);
		$repeatpassword = sha1($_POST['repeatpassword']);
		if ($password != $repeatpassword){
			$errors[] = "Vos deux mots de passe ne correspondent pas";
		}
		if (!empty($errors)) {
			foreach ($errors as $error) {
				echo "<div class='error'>".$error."</div>";
			}
		}else{
			update_password($password);
			die("<div class='success'>votre mot de passe a été changer avec succès</div>");
			header("Location: index.php?page=membre");
		}
	}
?>

<form method="post" action="" id="upmdp">
	<div class="field">
			<label for="password" class="field-label">Votre nouveau mot de passe</label>
			<input type="password" name="password" id="password" class="field-input" >
		</div><br/>
	<div class="field">
			<label for="repeatpassword" class="field-label">Repeter nouveau mot de passe</label>
			<input type="password" name="repeatpassword" id="repeatpassword" class="field-input" >
		</div><br/><br/>
		<button type="submit" name="submit">Modifier</button>
</form>