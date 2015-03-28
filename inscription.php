<!--INSCRIPTION -->
<div class="inscription">
	<form method="post" action="index.php?action=<?php echo $_GET['action'] ?>&button=inscription">
		 
		<h1> Inscription :</h1>
		<label for="pseudo">Pseudo</label> : <input type="text" name="newpseudo" id="newpseudo" placeholder="entre ton pseudo" size="20"> <br>
		<label for="pseudo">Mail</label> : <input type="text" name="newmail" id="newmail" placeholder="entre ton adresse mail" size="20"> <br>
		<label for="pass">Password</label> : <input type="password" name="newpass" id="newpass" placeholder="entre ton mot de passe" size="20" maxlength="10"> <br>
		<br>
		<input type="reset" value="Reset" />
		<input type="submit" value="Valider" />	
 				
				
<!-- Partie SQL : ajouter le membre à la BDD -->
<?php	
	$inscription = false; // variable pour tester si qqun utilise le formulaire d'inscription :
	
	if(isset($_POST['newpseudo']) AND isset($_POST['newmail']) AND isset($_POST['newpass']))
	{
		$inscription = true;
	}
	
	$pseudoexist = false; // variable pour tester si le nouveau pseudo n'existe pas déjà
	$mailexist = false; //variable pour tester si le nouveau mail n'existe pas déjà
	
	// on vérifie que le mail et le name entrés à l'inscription ne sont pas déjà pris :
	$reponse = $bdd->query('SELECT name, mail FROM member');
	while ($donnees = $reponse->fetch())
	{
		if ($inscription == true)
		{	
			if($donnees['name'] == $_POST['newpseudo'])
			{
				$pseudoexist = true;
			}
			
			if($donnees['mail'] == $_POST['newmail'])
			{
				$mailexist = true;
			} 
		}
	}
	
	if($inscription == true){		
		//  si un nouveau membre s'inscrit et que ni le mail ni le pseudo n'existe pas déjà dans la BDD :
		if ($pseudoexist == false AND $mailexist == false){
			
			$insert = $bdd->prepare('insert into member(name, mail, pass) values(:newpseudo, :newmail, :newpass)');
			$insert->execute(array(
				'newpseudo' => $_POST['newpseudo'],
				'newmail' => $_POST['newmail'],
				'newpass' => $_POST['newpass']
				));
				?>
					<h2>inscription validée !</h2>
				<?php
		}
	
		// si qqun s'inscrit ET que le membre existe déjà, message d'erreur et la requete d'inscription n'aura pas été exécutée :
		if($pseudoexist == true)
		{
		?>
			<h2>pseudo déjà utilisé</h2>
		<?php
		}
		if($mailexist == true)
		{
		?>
			<h2>mail déjà utilisé</h2>
		<?php
		}
	} 
	?>
</div>