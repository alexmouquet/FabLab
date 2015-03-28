<section>
		<?php
		if ((isset ($_GET['action'])) AND ($_GET['action'] != "logout"))
		{
			include($_GET['action'].".php");
			// cas où on clique sur l'une des deux machines, on ajoute la variable machine dans l'URL :
			if(isset ($_GET['machine']))
			{
			?>			
			<a class = "authentification" href="index.php?action=<?php echo $_GET['action'] ?>&machine=<?php echo $_GET['machine'] ?>&button=identification" 
			title="identification" style="text-decoration : none"><h1>Identification</h1></a>
			<a class = "inscription"  href="index.php?action=<?php echo $_GET['action'] ?>&machine=<?php echo $_GET['machine'] ?>&button=inscription" 
			title="inscription" style="text-decoration : none"><h1>Inscription</h1></a>
			<?php
			}
			//s'il n'y a pas de machine on n'a pas la variable machine :
			else
			{
			?>			
			<a class = "authentification" href="index.php?action=<?php echo $_GET['action'] ?>&button=identification" 
			title="identification" style="text-decoration : none"><h1>Identification</h1></a>
			<a class = "inscription"  href="index.php?action=<?php echo $_GET['action'] ?>&button=inscription" 
			title="inscription" style="text-decoration : none"><h1>Inscription</h1></a>
			<?php
			}
			//s'il la variable button contient quelque chose parce qu'on a cliqué sur un des blocs, on dévoile le formulaire correspondant :
			if(isset($_GET['button']))
			{
				include($_GET['button'].".php");
			}
		}
		else
		{
			include("main.php");
		}
		?>		
	</section>