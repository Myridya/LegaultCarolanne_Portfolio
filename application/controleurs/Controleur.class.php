<?php
/*iconv_set_encoding("internal_encoding", "UTF-8");*/
/**
 * Fichier Controleur.class.php
 * @author Caroline Martin modifié par Carolanne  Legault
 * @version 14 mars 2019
 */

class Controleur {
/* ====================================================== */
/* ============== INTERNAUTE ============================ */
	
	/**
	 * Permet de gérer le fonctionnement de mon portfolio (site web)
	 * @param void
	 * @return void
	 */
	public function gererSite(){
	 	try{
	 		//Déclaration d'un objet de la classe Vue
	 		//pour accéder à toutes les méthodes de cette classe
	 		$oVue = new Vue();
	 		$oVueSite = new VueSite();
	 		
	 		/* Afficher le début de la page HTML */
	 		/*************************************/
			if(isset($_GET['s']) == false)
			{
				$_GET['s']=1;
			}

			switch($_GET['s']){
				case 1:  /* Feuilles de style pour la page d'accueil */
					$aCss = array('../../public/css/styles.css', '../../public/css/cssReset.css');
					$aUrlJS = array();
				break;

				case 2: /* Feuilles de style pour la page des réalisations */
					$aCss = array('../../public/css/styles.css', '../../public/css/cssReset.css' , '../../public/css/stylesRealisations.css');
					$aUrlJS = array();
				break;

				case 3: /* Feuilles de style pour la page de contact */
					$aCss = array('../../public/css/styles.css', '../../public/css/cssReset.css' , '../../public/css/stylesContact.css');
					$aUrlJS = array();
				break;

			}
				
	 		echo $oVue->getHeader('PortFolio de Carolanne Legault', $aCss, $aUrlJS);
	 		
			/* Afficher le header de la page (Titre page(Logo), Menu) */
			$oVueSite->afficherHeader();

			/* Afficher le contenu du site internet */
			/****************************************/
			switch($_GET['s']){
				
				case 1: default: /* Afficher l'acceuil */
          Controleur::gererAfficherAccueil();
				break;

				case 2: /* Afficher les réalisations */
					Controleur::gererAfficherRealisations();
				break;

				case 3: /* Afficher la page de contact */
					Controleur::gererAfficherContact();
				break;
				
			}
			
			/* Afficher la fin de la page HTML */
	 		/*************************************/
			$oVueSite->afficherFooter();
			 
		}
		
		catch(Exception $oException){
	 		echo "<p>".$oException->getMessage()."</p>";
		}
		 
	}//fin de la fonction


	/**
	 * Gère le fonctionnement de la page d'accueil du site Web
	 * @param void
	 * @return void
	 */
	public static function gererAfficherAccueil(){
		try {
		    $oVueSite = new VueSite();
		   
				$oVueSite->afficherAccueil();
								   
		} 
		
		catch(Exception $oException) {
			echo "<p>".$oException->getMessage()."</p>";
		}

	}//fin de la fonction


	/**
	 * Gère le fonctionnement de la page de réalisations
	 * @param void
	 * @return void
	 */
	public static function gererAfficherRealisations(){
		try {
			$oVueSite = new VueSite();
		 
			$oVueSite->afficherRealisations();
								 
		} catch(Exception $oException) {
		echo "<p>".$oException->getMessage()."</p>";
	}

	} // Fin de la fonction

	/**
	 * Gère le fonctionnement de la page d'une réalisation'
	 * @param void
	 * @return void
	 */
	public static function gererAfficherUneRealisation(){
		try {
			$oVueSite = new VueSite();
			$oMedia = new Media();
		 
			$oVueSite->afficherRealisations();
								 
	} 
	
	catch(Exception $oException) {
		echo "<p>".$oException->getMessage()."</p>";
	}

	} // Fin de la fonction

	/**
	 * Gère le fonctionnement de la page de contact
	 * @param void
	 * @return void
	 */
	public static function gererAfficherContact(){
		try {
			$oVueSite = new VueSite();
		 
			$oVueSite->afficherContact();
								 
	} 
	
	catch(Exception $oException) {
		echo "<p>".$oException->getMessage()."</p>";
	}

	} // Fin de la fonction

	/**
	 * Gère le fonctionnement de la page espoir du site Web
	 * @param void
	 * @return void
	 */
	public static function gererafficherOeuvres(){
		try{
			$oVueSite = new VueSite();

									 //
			$oMedia = new Media();
			if(isset($_GET['idOeuvre']) == false){
											 //
				$aoMedias = $oMedia->rechercherTous();

				// Affichage
				$oVueSite->afficherOeuvres($aoMedias);
				
				}
	 }catch(Exception $oException){
			echo "<p>".$oException->getMessage()."</p>";
		}
	 }//fin de la fonction

}// fin de la classe