<!DOCTYPE html>
<html>

<head>
    <title>FabLab Isen</title>
    <link rel="stylesheet" href="index.css" />
	
</head>

<body>
		
	<header>
		<a id="headertitle" href="index.php?action=main" style="text-decoration : none">
		Bienvenue sur le <strong>FabLab Isen Lille</strong>
		</a>
	</header>

	
	<nav>
        <p>
            <span class="navTitle">Projet</span>
            <a href="index.php?action=projetCreation">Créer un nouveau projet</a>
            <a href="index.php?action=projetGestion">Gérer son projet</a>
        </p>
        <p>
            <span class="navTitle">Machines disponibles</span>
            <a href="index.php?action=machine&machine=imprimante3D">Imprimante 3D</a>
            <a href="index.php?action=machine&machine=decoupeurLaser">Découpeur Laser</a>
        </p>
	</nav>
	
	
	<section>
		<?php
		if (isset ($_GET['action']))
		{
			include($_GET['action'].".php");
		}
		else
		{
			include("main.php");
		}
		?>		
	</section>
	
	<footer>
        <a href="http://www.isen.fr/lille/"><div>Visit Isen Lille Web site</a></div>
    </footer>
</body>
</html>