
<?php
/**
 * Fichier VueMedia.class.php
 * Le Fol Espoir, oeuvres littéraires et médiatiques
 * @author Caroline Martin
 * @version Wednesday 3rd of October 2018 07:13:59 PM
 */
class VueMedia {
	
	private $aTypeMIME = array('image/gif','image/jpeg','image/png','audio/x-wav','audio/mpeg3','audio/x-mpeg-3', 'video/mp4');
	
	/*************************************************************************/
	/** INTERNAUTE ***********************************************************/
	/*************************************************************************/
   
    /**
	 * Affiche un Media
	 * @param Texte $oTexte objet de la classe Texte
	 
	 * @return void
	 */
	public static function afficherUnMedia(Media $oMedia){
		$sHtml ="
		<section>
			
			";
		if($oMedia != false){
		
		for($iTel=0; $iTel<count($oMedia); $iTel++){
			$sHtml.= "
			<dl data-id=".$oMedia[$iTel]->getidMedia() .">
				<dt>
				<img src=\"../../public/medias/".$oMedia[$iTel]->getsUrlMedia()."\" alt=\"".$aoTelephones[$iTel]->getsNomTelephone()."\">
				</dt>
			<dd>".$oMedia[$iTel]->getsNomTelephone()."
			</dd>
			<dd>".$oMedia[$iTel]->getfPrixTelephone()." $
			</dd>
		</dl>";
		}
		
		
		}else{
			$sHtml .="
			<p>Aucun téléphone disponible actuellement. Revenez plus tard.</p>";
		}
		$sHtml .="
		</section>
		<script src='../../public/js/ajaxGrandeImage.js' ></script>";
		echo $sHtml;


		/*$sHtml ="
        
        <main id='global'>
            <section>
                <a href='index.php?s=".$_GET['s']."' type=button id=retour>Retour</a>
                <div id='uneRealisation'>
                    <h2 id='titreMedia' style='text-align:center; margin-right:0'>".
                        $oMedia->getoTitreMEdia()->getsTitreMedia()."
                    </h2>
                ";
                
                if($oMedia->getsUrlMedia() != "")
                {
                    $sUrlMedia = "../../public/medias/".$oMedia->getsUrlMedia();
                    $oFileInfo = new finfo();
                    $sTypeMime = @$oFileInfo->file($sUrlMedia, FILEINFO_MIME_TYPE);
                    $aTypeMedia = explode("/", $sTypeMime);
                        $sHtml .="
                            <div id='imageOeuvre'>
                                <img id='imgBloc' src=".$sUrlMedia." alt=\"".$oMedia->getsTitreMedia()."\">
                </div>";
                    }

                }
            $sHtml .="
                <a href='index.php?s=".$_GET['s']."' type=button id=retour>Retour</a>
            </section>
        </main>
		";
		echo $sHtml; */
	}//fin de la fonction
    
    /**
	 * Affiche un Media
	 * @param Texte $oTexte objet de la classe Texte
	 * @return void
	 */
	public static function afficherTous($aoMedias, $sMsg=""){
		
		if($aoMedias!=false) {
			$iTaille = count($aoMedias);
			$sMsg = $iTaille + " résultats";
			for($i=0; $i< $iTaille; $i++){
				VueMedia::afficherUnMedia($aoMedias[$i] );
			}
		}else{
			$sMsg = "Aucun Media trouvé";
		}
		
		echo $sMsg;
	}
	
}//fin de la classe VueMedia