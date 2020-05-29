<?php
	include('body/topbar.php');
	include('functions/membre.func.php');
	include('body/header.php');
	include('body/menu.php');


?>
<h2 class="header header-form">Envoyer un message</h2><br/>
<?php
	if (isset($_GET['pseudo']) && !empty($_GET['pseudo']) && pseudo_incorrect() == 1) {
		if (isset($_POST['submit'])) {
			$sujet = htmlspecialchars(trim($_POST['sujet']));
			$message = htmlspecialchars(trim($_POST['message']));
				if (!empty($sujet) && !empty($message)) {
					creer_conversation($sujet,$message);
					?>
						<div class="success">Votre message a été envoyé</div>
					<?php
				}else{
					?>
						<div class="error">Le sujet et le message sont obligatoires</div>
					<?php
				}
		}
}else{
	header("Location: index.php?page=membre");
}
?>
<form method="post" action="" id="mesform">
	<div class="field">
		<label for="à" class="field-label">à:</label>
		<input type="text" name="a" id="a" class="field-input" value="<?php echo $_GET['pseudo'] ?>" disabled="disabled"><br/>
	</div>
	<div class="field">
		<label for="sujet" class="field-label">Sujet:</label>
		<input type="text" name="sujet" id="sujet" class="field-input"><br/>
	</div>
	<div class="field">
		<label for="message" class="field-label">Votre message:</label>
		<textarea rows="6" cols="30" name="message" id="message" class="field-input" placeholder="évitez les caractères; n'ecrivez que des lettres ou chiffres; sinon le message sera envoyer mais il ne verra pas votre message"></textarea><br/><br/>
	</div>
	<button type="submit" name="submit" class="icon-paper-plane"></button>
	
</form>