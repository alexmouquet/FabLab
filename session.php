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