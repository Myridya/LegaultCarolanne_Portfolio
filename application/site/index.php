
<?php
/**
 * Fichier index.php
 * Le Fol Espoir, oeuvres littéraires et médiatiques
 * @author Caroline Martin
 * @version Wednesday 3rd of October 2018 07:14:07 PM
 */

/* =================================== */
/* = Nécessaire ====================== */
/* =================================== */
require('../../composant/vues/Vue.class.php');
require('../../composant/lib/Autoloader.class.php');
require('../../composant/lib/TypeException.class.php');
require('../../composant/lib/PDOLib.class.php');

/* =================================== */
/* = Contrôleurs ===================== */
/* =================================== */
require("../controleurs/Controleur.class.php");

spl_autoload_register('autoload');



/* =================================== */
/* = Programme Principal ============= */
/* =================================== */
try{
	$oControleur = new Controleur();
	
	$oControleur->gererSite();
	
	
}catch(Exception $oException){
	echo "<p>".$oException->getMessage()."</p>";
}
