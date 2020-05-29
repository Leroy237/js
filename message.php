<?php
	include('body/topbar.php');
	include('functions/membre.func.php');
	include('body/header.php');
	include('body/menu.php');

?>


<?php
	$messages = recup_messages();
	foreach ($messages as $message) {
		?>
		<h2 class="header header-form"><img src="avatar/<?= $message->avatar ?>" height="50" width="50" style="border-radius: 5px;"><a href="index.php?page=profil&pseudo=<?= $message->pseudo ?>" style="text-decoration: none; color: black;"><?= $message->pseudo ?></a></h2><br/>
			<div class="messages">
				
				<p><em><?= $message->corps_message ?></em></p>
				<em>envoyé le:<?= $message->date_message ?></em>
			</div>

		
		<br/><br/>
		<a href="index.php?page=new_message&pseudo=<?php echo $_GET['pseudo'];?>"><button>Répondre</button></a>
		<?php
	}
?>