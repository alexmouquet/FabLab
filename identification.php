<?php
	$mauvaisPseudo = false;
	$mauvaisMdp = false;
							
	// Si le pseudo et le mdp n'ont pas été envoyés ou ne sont pas bons ...
	if (!(isset($_POST['pseudo']) AND isset($_POST['pass'])) OR ($mauvaisPseudo == false OR $mauvaisMdp == false))
	{
		// ... et que l'on ne s'est jamais déjà identifié ($_SESSION['login'] n'existe pas), alors on affiche le formulaire d'identification
		if (!(isset($_SESSION['login'])))
		{
		?>
		
		<!--IDENTIFICATION-->
		<div class="authentification">
			<form method="post" action="index.php?action=<?php echo $_GET['action'] ?>&button=identification">
		 
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
							
							$reponse = $bdd->query('SELECT name, pass FROM member');
							while ($donnees = $reponse->fetch())
							{
								if ($donnees['name'] == $_POST['pseudo'])
								{
									if ($donnees['pass'] != $_POST['pass'])
									{
										$mauvaisMdp = true;
										break;
									}
								}
							}
							// si on a parcouru tout le tableau mais qu'aucun nom ne correspond à celui que l'utilisateur a entré : 
							if($donnees['name'] != $_POST['pseudo'])
								{
									$mauvaisPseudo = true;
								}
								
							// affichage des messages d'erreur : 	
							if ($mauvaisPseudo == true)
							{
								echo('Mauvais pseudo');
							}
							
							if ($mauvaisMdp == true)
							{
								echo('Mauvais mot de passe');
							}
							
						}
	
							
		}
		?>
		</div>
	<?php
	}
?>
