<?php
	include('body/topbar.php');
	include('functions/membre.func.php');
	include('body/header.php');
	include('body/menu.php');

?>

<h2 class="header header-form">Modifier mon email</h2>
<br/><br/>

<?php
	if (isset($_POST['submit'])) {
		$email = htmlspecialchars(trim($_POST['email']));
		if (email_existe($email) == 1) {
			$errors[] = "Cette email existe déja";
		}
		if (!empty($errors)) {
			foreach ($errors as $error) {
				echo "<div class='error'>".$error."</div>";
			}
		}else{
			update_email($email);
			die("<div class='success'>votre adresse mail a été changer avec succès</div>");
			header("Location: index.php?page=membre");
		}
	}
?>

<form method="post" action="" id="upem">
	<div class="field">
			<label for="email" class="field-label">Votre nouvelle email</label>
			<input type="email" name="email" id="email" class="field-input" >
		</div><br/><br/>
		<button type="submit" name="submit">Modifier</button>
</form>