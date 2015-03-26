<!--BODY-->
<body link="#000000" vlink="#000000" alink="#000000">
		
	<!--EN-TETE-->
	<header>
		<a id="headertitle" href="index.php?action=main" style="text-decoration : none">
		Bienvenue sur le <strong>FabLab Isen Lille</strong>
		</a>
	</header>

	<!--MENU-->
	<nav>
        <p>
            <span class="navTitle">Le FabLab</span>
            <a href="index.php?action=main" style="text-decoration : none">Présentation</a>
            <a href="index.php?action=main" style="text-decoration : none"></a><br>
       
            <span class="navTitle">Les machines à disposition</span>
            <a href="index.php?action=machine&machine=imprimante3D" style="text-decoration : none">Imprimante 3D</a>
            <a href="index.php?action=machine&machine=decoupeurLaser" style="text-decoration : none">Découpeur Laser</a><br>
			
			<span class="navTitle">Projet</span>
            <a href="index.php?action=main" style="text-decoration : none">Créer un nouveau projet</a>
            <a href="index.php?action=main" style="text-decoration : none">Gérer un projet existant<a><br>
			
			<span class="navTitle">Communauté</span>
            <a href="index.php?action=main" style="text-decoration : none">Le forum</a>
            <a href="index.php?action=main" style="text-decoration : none">Les projets déjà réalisés<a><br>
						
			<span class="navTitle">Pratique</span>
            <a href="index.php?action=main" style="text-decoration : none">Comment venir ?</a>
            <a href="index.php?action=main" style="text-decoration : none">Les tarifs</a>
			<a href="index.php?action=main" style="text-decoration : none">FAQ</a>
		</p>
	</nav>
	
	<!--PAGE CENTRALE-->
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
	
	
	<!--PIED-DE-PAGE-->	
	<footer>
        <a href="http://www.isen.fr/lille/"><div>Visit Isen Lille Web site</a></div>
    </footer>
	
</body>
</html>