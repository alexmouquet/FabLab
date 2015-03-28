<?php
	include ("session.php");
?>

<!DOCTYPE html>
<html>

<head>
    <title>FabLab Isen</title>
    <link rel="stylesheet" href="css/index.css" />
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
		
	<!--PAGE CENTRALE-->
	<?php
		include("section.php");
	?>
	
	<!-- DECONNEXION-->			
	<?php
		if (isset($_SESSION['login']))
		{
	?>	
			<div class="logout">
				<p>Bonjour <?php echo $_SESSION['login'] ?> ! :) <p>
				<!-- Lien pour se déconnecter qui détruira la session actuelle (cf début de index.php) (le lien ne s'affiche seulement si l'on est connecté) -->
				<a href="index.php?action=logout" title="Deconnexion" style="text-decoration : none">Me déconnecter</a>
			</div>
	<?php
		}
	?>
					
	<!--PIED-DE-PAGE-->	
	<footer>
        <a href="http://www.isen.fr/lille/"><div>Visit Isen Lille Web site</a></div>
    </footer>
	
</body>
</html>