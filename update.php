<?php
	include('body/topbar.php');
	include('functions/membre.func.php');
	include('body/header.php');
	include('body/menu.php');

	if (isset($_POST['submit'])) {
	 
		
		$apropos = htmlspecialchars($_POST['apropos']);
		$sexe = htmlspecialchars($_POST['sexe']);
		$situation = htmlspecialchars($_POST['situation']);


		changer_infos($sexe, $situation, $apropos);
		header("Location: index.php?page=membre");
		
	  
	}

		
	
?>

<h2 class="header header-form">Changer vos informations</h2>
<?php
	foreach ($infos as $info) {
		?>
			<form method="post" action="" id="upform">
				
		<div class="field">
			<label for='sexe' class="field-label">Sexe</label>
			<select name="sexe" class="field-input">

				<option value="Homme">Homme</option>
				<option value="Femme">Femme</option>
			</select>
		</div><br/>
		<div class="field">
			<label for='situation' class="field-label">Situation</label>
			<select name="situation" class="field-input">
				<opion value="Célibataire">Célibataire</opion>
				<option value="En couple">En couple</option>
				<option value="Divorcé(e)">Divorcé(e)</option>
				<option value="Veuf(ve)">Veuf(ve)</option>
			</select>
		</div><br/>
		<div class="field">
			<label for="apropos" class="field-label">A propos de vous</label>
			<textarea rows="6" cols="30" name="apropos" class="field-input"><?php echo isset($info->apropos)? $info->apropos:''; ?></textarea><br/><br>
		</div>
			<button type="submit" name="submit">Modifier</button>
			</form>
		<?php
	}
?>