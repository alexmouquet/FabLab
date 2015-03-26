<!DOCTYPE html>
<html>

<head>
    <title>FabLab ISEN Lille</title>
    <link rel="stylesheet" href="css/index.css" />
</head>

<body>
	<nav>
        <p>
            <span class="navTitle">Projet</span>
            <a href="index.php?action=projetCreation">Cr�er un nouveau projet</a>
            <a href="index.php?action=projetGestion">G�rer son projet</a>
        </p>
        <p>
            <span class="navTitle">Machines disponibles</span>
            <a href="index.php?action=machine&machine=imprimante3D">Imprimante 3D</a>
            <a href="index.php?action=machine&machine=decoupeurLaser">D�coupeur Laser</a>
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
	
</body>

</html>