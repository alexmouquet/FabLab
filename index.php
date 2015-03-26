<?php
// On démarre la session AVANT d'écrire du code HTML
session_start();

// Destruction de la session si appui sur le lien "Se déconnecter"
if ((isset($_GET['action'])) AND ($_GET['action'] == 'logout'))
{
	session_destroy();
	session_start();
}

// connection à mySQL via PDO sur la base  :
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=projetfablab', 'root', ''); // création de l'objet $bdd
	}
					
	catch(Exception $e) 
	{
		die('Erreur : '.$e->getMessage());
	}

// Si le pseudo et le mdp ont été envoyés et sont bons
if (isset($_POST['pseudo']) AND isset($_POST['pass']))
{
	$reponse = $bdd->query('SELECT name, pass FROM member');
	while ($donnees = $reponse->fetch())
	{
		if($donnees['name'] == $_POST['pseudo'] AND $donnees['pass'] == $_POST['pass']) 
		{
			// Alors on crée une variable de session "login" dans $_SESSION, contenant le pseudo que l'on a rentré lors de l'identification (qui s'est bien déroulée)
			$_SESSION['login'] = $_POST['pseudo'];
			//print_r($_SESSION); // Permet d'afficher le contenu du tableau $_SESSION
		}
	}
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
	<?php
		include("nav.php");
	?>	
	
	
	<!--blocs identification ou inscription-->
	<a class = "authentification" href="index.php?action=identification" title="identification" style="text-decoration : none"><h1>J'aimerais m'identifier</h1></a>
	<a class = "inscription"  href="index.php?action=inscription" title="inscription" style="text-decoration : none"><h1>J'aimerais m'inscrire</h1></a>
	
	
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
	if (isset($_SESSION['login']))
	{
	?>
		<!-- Lien pour se déconnecter qui détruira la session actuelle (cf début de index.php) (lien affiché seulement si l'on est connecté) -->
		<p><a href="index.php?action=logout" title="Déconnexion">Se déconnecter</a></p>
	<?php
	}
	?>
				
	<!--PIED-DE-PAGE-->	
	<footer>
        <a href="http://www.isen.fr/lille/"><div>Visit Isen Lille Web site</a></div>
    </footer>
	
</body>
</html>