<!--MENU-->
	<nav>
        <p>
            <span class="navTitle">Le FabLab</span>
            <a href="index.php?action=presentation" style="text-decoration : none">Présentation</a><br>
       
            <span class="navTitle">Les machines à disposition</span>
            <a href="index.php?action=machine&machine=imprimante3D" style="text-decoration : none">Imprimante 3D</a>
            <a href="index.php?action=machine&machine=decoupeurLaser" style="text-decoration : none">Découpeur Laser</a><br>
			
			<?php
				// Si le pseudo et le mdp ont été envoyés et sont bons ($_SESSION['login'] a été créé au début d'index.php)
				if (isset($_SESSION['login']))
				{ // alors on affiche les parties cachées du menu :
			?>
			<span class="navTitle">Projet</span>
            <a href="index.php?action=projetCreation" style="text-decoration : none">Créer un nouveau projet</a>
			<br>
									
			<span class="navTitle">Communauté</span>
            <a href="index.php?action=forum" style="text-decoration : none">Le forum</a>
            <a href="index.php?action=projetsRealises" style="text-decoration : none">Les projets déjà réalisés<a>
			
			<?php 
			// développer la liste des projets existants au fur et à mesure des créations de projet :
				$reponse = $bdd->query('SELECT title FROM project');
				while ($donnees = $reponse->fetch())
					{
					?> 
					<a href="index.php?action=projetsRealises&titre=<?php echo $donnees['title'] ?>" style="text-decoration : none"> --><?php echo $donnees['title'] ?><a>
					<?php
					}
				}
			?>
			
			<br>
			<span class="navTitle">Pratique</span>
            <a href="index.php?action=acces" style="text-decoration : none">Comment venir ?</a>
            <a href="index.php?action=tarifs" style="text-decoration : none">Les tarifs</a>
			<a href="index.php?action=faq" style="text-decoration : none">FAQ</a>
        </p>
	</nav>