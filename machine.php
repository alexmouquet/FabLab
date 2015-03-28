</br>
<?php 

if(isset($_GET['machine']) AND $_GET['machine']=="imprimante3D")
	{
	?>
		<img src = "images/imprimante3D.jpg">
		<div class="tuto">
		<a href="tutoimprimante.php" style="text-decoration : none">Tuto d'utilisation de l'imprimante 3D</a>
		</div>
	<?php
	} 
	
if(isset($_GET['machine']) AND $_GET['machine']=="decoupeurLaser")
	{
	?>
		<img src = "images/decoupeurLaser.jpg">
		<div class="tuto">
		<a href="tutoimprimante.php" style="text-decoration : none">Tuto d'utilisation du découpeur laser</a>
		</div>
	<?php
	} 
?>