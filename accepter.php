<?php
accepter_invitation();
header("Location:index.php?page=profil&pseudo=".$_GET['pseudo']);
?>