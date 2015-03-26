<?php
// On démarre la session AVANT d'écrire du code HTML
session_start();

// Destruction de la session si appui sur le lien "Se déconnecter"
if ((isset($_GET['action'])) AND ($_GET['action'] == 'logout'))
{
	session_destroy();
	session_start();
}

// Si le pseudo et le mdp ont été envoyés et sont bons
if ((isset($_POST['pseudo']) AND isset($_POST['pass'])) AND ($_POST['pseudo'] == "elodie" AND $_POST['pass'] == "elo"))
{
	// Alors on crée une variable de session "login" dans $_SESSION, contenant le pseudo que l'on a rentré lors de l'identification (qui s'est bien déroulée)
	$_SESSION['login'] = $_POST['pseudo'];
	//print_r($_SESSION); // Permet d'afficher le contenu du tableau $_SESSION
}
?>

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
            <a href="index.php?action=presentation" style="text-decoration : none">Présentation</a><br>
       
            <span class="navTitle">Les machines à disposition</span>
            <a href="index.php?action=machine&machine=imprimante3D" style="text-decoration : none">Imprimante 3D</a>
            <a href="index.php?action=machine&machine=decoupeurLaser" style="text-decoration : none">Découpeur Laser</a><br>
			
			<?php
			// Si le pseudo et le mdp ont été envoyés et sont bons ($_SESSION['login'] a été créé au début d'index.php), alors on affiche les parties cachées du menu
			if (isset($_SESSION['login']))
			{
			?>
			<span class="navTitle">Projet</span>
            <a href="index.php?action=projetCreation" style="text-decoration : none">Créer un nouveau projet</a>
            <a href="index.php?action=projetGestion" style="text-decoration : none">Gérer un projet existant<a><br>
			
			<span class="navTitle">Communauté</span>
            <a href="index.php?action=forum" style="text-decoration : none">Le forum</a>
            <a href="index.php?action=projetsRealises" style="text-decoration : none">Les projets déjà réalisés<a><br>
			<?php
			}
			?>
			
			<span class="navTitle">Pratique</span>
            <a href="index.php?action=acces" style="text-decoration : none">Comment venir ?</a>
            <a href="index.php?action=tarifs" style="text-decoration : none">Les tarifs</a>
			<a href="index.php?action=faq" style="text-decoration : none">FAQ</a>
        </p>
	</nav>
	
	<!--PAGE CENTRALE-->
	<section>
		<?php
		if ((isset ($_GET['action'])) AND ($_GET['action'] != "logout"))
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
	// Si le pseudo et le mdp n'ont pas été envoyés ou ne sont pas bons ...
	if (!(isset($_POST['pseudo']) AND isset($_POST['pass'])) OR !($_POST['pseudo'] == "elodie" AND $_POST['pass'] == "elo"))
	{
		// ... et que l'on ne s'est jamais déjà identifié ($_SESSION['login'] n'existe pas), alors on affiche le formulaire d'identification
		if (!(isset($_SESSION['login'])))
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
						<?php
						// Affichage de l'erreur (mauvais pseudo ou mauvais mdp) si l'identification n'a pas réussi
						if (isset($_POST['pseudo']) AND isset($_POST['pass']))
						{
							if ($_POST['pseudo'] == "elodie")
							{
								if ($_POST['pass'] != "elo")
								{
									echo('Mauvais mot de passe');
								}
							}
							else
							{
								echo('Mauvais pseudo');
							}
						}
						?>
		</div>
		<?php
		}
	}
	?>
	
	<?php
	if (isset($_SESSION['login']))
	{
	?>
		<!-- Lien pour se déconnecter qui détruira la session actuelle (cf début de index.php) (lien affiché seulement si l'on est connecté) -->
		<p><a href="index.php?action=logout" title="Déconnexion">Se déconnecter</a></p>
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