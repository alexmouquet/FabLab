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

<?php	
		
	//vérification de la concordance nom/pass mais sans utiliser la BDD :
	
	if(isset ($_POST['pseudo']) AND isset ($_POST['pass']))// on vérifie qu'il y ait bien un pseudo et un pass
	{ 
		if ($_POST['pseudo']=="elodie" AND $_POST['pass']=="elo") // bon ok c'est là qu'il faut arranger ça et se servir de la BDD !
		{
			include("connected.php");
		}
	}
?>