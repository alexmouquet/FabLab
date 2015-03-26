<!DOCTYPE html>
<html>

<head>
    <title>FabLab Isen</title>
    <link rel="stylesheet" href="index.css" />
	<meta charset="utf-8" />
	<!--[if lt IE 9]>
            <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
	
</head>


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
			
			<?php
			// Si le pseudo et le mdp ont été envoyés et sont pas bons, alors on affiche les parties cachées du menu
			if ((isset($_POST['pseudo']) AND isset($_POST['pass'])) AND ($_POST['pseudo'] == "elodie" AND $_POST['pass'] == "elo"))
			{
			?>
			<span class="navTitle">Projet</span>
            <a href="index.php?action=main" style="text-decoration : none">Créer un nouveau projet</a>
            <a href="index.php?action=main" style="text-decoration : none">Gérer un projet existant<a><br>
			
			<span class="navTitle">Communauté</span>
            <a href="index.php?action=main" style="text-decoration : none">Le forum</a>
            <a href="index.php?action=main" style="text-decoration : none">Les projets déjà réalisés<a><br>
			<?php
			}
			?>
			
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

	<?php
	// Si le pseudo et le mdp n'ont pas été envoyés ou ne sont pas bons, alors on affiche le formulaire d'identification
	if (!(isset($_POST['pseudo']) AND isset($_POST['pass'])) OR !($_POST['pseudo'] == "elodie" AND $_POST['pass'] == "elo"))
	{
	?>
	<!--IDENTIFICATION-->
	<div class="authentification">
		<form method="post" action="index.php">
		 
					<h1>Identification :</h1>
					<label for="pseudo">Pseudo</label> : <input type="text" name="pseudo" id="pseudo" placeholder="entre ton pseudo" size="20"> <br>
					<label for="pass">Password</label> : <input type="password" name="pass" id="pass" placeholder="entre ton mot de passe" size="20" maxlength="10"> <br>
					<br>
					<input type="reset" value="Reset" />
					<input type="submit" value="Valider" />	
 	</div>
	<?php
	}
	?>
	
	<!--INSCRIPTION -->
	<div class="inscription">
		<form method="post" action="inscription.sql">
		 
					<h1> Inscription :</h1>
					<label for="pseudo">Pseudo</label> : <input type="text" name="pseudoInsc" id="pseudoI" placeholder="entre ton pseudo" size="20"> <br>
					<label for="pseudo">Mail</label> : <input type="text" name="mailInsc" id="mailI" placeholder="entre ton adresse mail" size="20"> <br>
					<label for="pass">Password</label> : <input type="password" name="passInsc" id="passI" placeholder="entre ton mot de passe" size="20" maxlength="10"> <br>
					<br>
					<input type="reset" value="Reset" />
					<input type="submit" value="Valider" />	
 	</div>
	<!-- Partie sql : ajouter le membre à la BDD -->
		
	<!--PIED-DE-PAGE-->	
	<footer>
        <a href="http://www.isen.fr/lille/"><div>Visit Isen Lille Web site</a></div>
    </footer>
	
</body>
</html>