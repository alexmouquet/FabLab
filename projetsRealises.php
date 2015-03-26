<?php
if (!(isset($_SESSION['login'])))
{
	echo ('Eh non petit malin ! Il faut d\'abord te connecter pour avoir acces a cette page ;)');
}
else
{
?>

Bienvenue sur la page des projets deja realises !

<?php
}
?>