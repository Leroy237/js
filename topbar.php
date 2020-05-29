<div class="topbar">
	<a class="app-name" href="index.php">MBINDI TCHAT</a>

	<span class="menu">
		 <?php
				if(islogged() == 1){
					?>	

					<a href="index.php?page=logout" class="<?php echo($page=='logout') ? 'active':'' ?>">Déconnexion</a>
					<?php
				}else{
					?>
					<a href="index.php?page=register" class="<?php echo($page=='register') ? 'active':'' ?>">S'inscrire</a>
					<a href="index.php?page=login" class="<?php echo($page=='login') ? 'active':'' ?>">Se connecter</a>
			
					<?php
				}
					?>		
		
		
		
	</span>
</div>