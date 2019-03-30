<?php
/**
 * Component du framework
 * pour le cours 582-346-MA
 * @author Caroline Martin
 * @version 2015-06-16
 */
class Vue {
	
	/**
	 * Header de la page HTML
	 * @param string $sTitre
	 * @param array $aUrlCss
	 * @param array $aUrlJS
	 * @param string $sDescription
	 * @param string $sAuteur
	 * @param string $sFavIcon
	 * @param string $sLangue
	 * @param string $sCharset
	 */
	public function getHeader($sTitre="Votre titre", $aUrlCss =array("../../public/css/styles.css","../public/css/stylesRealisations.css"), $aUrlJS =array(), $sDescription="", $sAuteur="Carolanne Legault", $sFavIcon="../../public/medias/favicon.ico", $sLangue="fr", $sCharset="utf-8"){
		$sCh =
		'<!DOCTYPE html>
			<html lang="'.$sLangue.'">
		
			<head>
				<meta charset="'.$sCharset.'">
	    		<title>'.$sTitre.'</title>
        		<meta name="viewport" content="width=device-width, initial-scale=1.0">
				<meta name="description" content="'.$sDescription.'">
				<meta name="author" content="'.$sAuteur.'">
		';
		
	    for($iCss=0; $iCss<count($aUrlCss); $iCss++){
			$sCh .='<link rel="stylesheet" href="'.$aUrlCss[$iCss].'">';
	    }
		
		for($iJs=0; $iJs<count($aUrlJS); $iJs++){
	    	$sCh .= '<script src="'.$aUrlJS[$iJs].'"></script>';
	    }
		
		$sCh .=
			'</head>
		<body>';

	return $sCh;

	}//fin de la fonction getHeader()
	
	
	/**
	 * Footer de la page HTML
	 * @param void
	 * @return void
	 */
	public static function getFooter($sMsg){
		return '
			<section id="footer">
				<footer>'.$sMsg.'</footer>

			</section>

		  </body>
		  
		</html>
		';

	}//fin de la fonction getFooter()
	
	
	/**
	 * @param array $aSections
	 */	 
	public function getNavigation($aSections, $iSectionCliquee){
		$sCh = "
		<nav>
			<ul>";
			
			for($iLi=0; $iLi<count($aSections); $iLi++){
				$sClass="";
				if($iSectionCliquee == ($iLi+1))
					$sClass=" class=\"active\" ";
				$sCh .=  "
				<li><a href=\"".$aSections[$iLi]['href']."\" title=\"".$aSections[$iLi]['title']."\" ".$sClass."><span>".$aSections[$iLi]['text']."</span></a></li>
				";
			}
		$sCh .=  "
			</ul>
		</nav>
		";
		return $sCh;
		
	}//fin de la fonction getNavigation()
	
	
	/**
	 * retourne le message à afficher 
	 * @param string $sMsg
	 * @return string 
	 */	 
	public static function getMessage($sMsg){
		$sHTML = "
		<p>".$sMsg."</p>
		";
		return $sHTML;
	}//fin de la fonction getMessage()
	
}//fin de la classe Vue