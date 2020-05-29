<?php
//la fonction qui va vérifier si le pseudo et le mot de passe existe
function verifier_pm($pseudo, $password){
	$db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
	$pseudo = htmlspecialchars(trim($_POST['pseudo']));
	$password = htmlspecialchars(trim($_POST['password']));
	$password = sha1($password);

	$query = "SELECT pseudo, password FROM utilisateurs WHERE pseudo = '$pseudo' AND password = '$password'";
	$res=mysqli_query($db, $query);
	$rows = mysqli_num_rows($res);
	return $rows;
}

?>