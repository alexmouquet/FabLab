<img src = "images/newproject.jpg">
<?php
	if (!(isset($_SESSION['login'])))
	{
		echo ('Eh non petit malin ! Il faut d\'abord te connecter pour avoir acces a cette page ;)');
	}
	else
	{
?>

<!-- Formulaire à remplir pour créer un nouveau projet -->
<form method="post" action="index.php?action=projetCreation">

<label for="title">Titre du projet</label> : <input type="text" name="title" id="title" size="50"> <br>

Entrez un bref descriptif de votre projet :<br>
<textarea name ="description" rows ="8" cols ="40"></textarea><br>

De quelle machine aurez-vous besoin ?<br>
<select name = "machine"><br>
	<option value = "imprimante3D">Imprimante 3D</option>
	<option value = "decoupe">Découpeuse Laser</option>
	<option value = "fer">Fer à souder</option>

<br><input type="submit" value="Valider" />


<!-- Partie SQL : ajouter le projet à la BDD -->
<?php	

	if(isset($_POST['title']) AND isset($_POST['machine']) AND isset($_POST['description']))
	{		
		$insert = $bdd->prepare('insert into project (title,description,machines) values(:title, :description, :machine)');
		$insert->execute(array(
			'title' => $_POST['title'],
			'machine' => $_POST['machine'],
			'description' => $_POST['description']
			));
			?>
				<h2>Nouveau projet ajouté</h2>
			<?php
			}
}
?>
