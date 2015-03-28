<?php
	if (!(isset($_SESSION['login'])))
	{
		echo ('Eh non petit malin ! Il faut d\'abord te connecter pour avoir acces a cette page ;)');
	}
	else
	{
?>

	<?php
	// cas où l'on clique sur le titre "projets réalisés" et non pas sur un en particulier : 
	if (!(isset($_GET['titre'])))
	{	
		?>
		<img src="images/projects.jpg" size = "100%">
		<?php
	}

	//cas où l'on clique sur un des noms des projets réalisés (donc la variable titre existe):
	if(isset ($_GET['titre']))
	{
		// on va afficher ce que chaque projet contient dans la BDD (titre, description, machine) :
		$project = $bdd->query('SELECT * FROM project');
		while ($donnees = $project->fetch())
		{
			if($_GET['titre'] == $donnees['title'])
			{
				?> <h4>Titre du projet : </h4> <?php echo $donnees['title'];
				?> <h4>Description du projet : </h4> <?php echo $donnees['description'];
				?> <h4>Machines utilisées : </h4> <?php echo $donnees['machines'];
			}
		}
	
	}
}
?>