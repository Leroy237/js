<?php
include('body/topbar.php');
include('functions/membre.func.php');
	include('body/header.php');
	include('body/menu.php');
$bd = new PDO('mysql:host=localhost;dbname=rs', 'root', '');

$temps_session = 15;
$temps_actuel = date("U");
$ip_user = $_SERVER['REMOTE_ADDR'];
$pseudo = $_SESSION['pseudo'];

$req_ip_exisst = $bd->prepare('SELECT * FROM en_ligne WHERE ip_membre = ?');
$req_ip_exisst->execute(array($ip_user));
$ip_existe = $req_ip_exisst->rowCount();

if ($ip_existe == 0) {
	$add_ip = $bd->prepare('INSERT INTO en_ligne (pseudo_en_ligne,ip_membre,date_en_ligne) VALUES (?,?,?)');
	$add_ip->execute(array($pseudo,$ip_user,$temps_actuel));
}else{
	$update_ip = $bd->prepare('UPDATE en_ligne SET date_en_ligne = ? WHERE ip_membre = ?');
	$update_ip->execute(array($temps_actuel,$ip_user));
	$update_ip2 = $bd->prepare('UPDATE en_ligne SET pseudo_en_ligne = ? WHERE ip_membre = ?');
	$update_ip2->execute(array($pseudo,$ip_user));
}

$session_delete_time = $temps_actuel - $temps_session;
$del_ip = $bd->prepare('DELETE FROM en_ligne WHERE date_en_ligne < ?');
$del_ip->execute(array($session_delete_time));

$show_user_nbr =$bd->query('SELECT * FROM en_ligne');

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h2 class="header header-form">Les membres en ligne</h2> <br/>
	<?php
		while ($show = $show_user_nbr->fetch()) {
			?>
			<div>
				<?= $show['pseudo_en_ligne']; ?><img src="images/vert.png">
			</div>

			<?php
		}
	?>
</body>
</html>