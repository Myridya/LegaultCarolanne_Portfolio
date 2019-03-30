<?php 

    /* ====================================================== */
	/* ============== Internaute ============================ */	
	/* ====================================================== */

    class VueSite {


    /**
     * Modèle Html pour la navigation au travers du site
     */
    public function afficherHeader(){
        $sHtml ='
        <input type="checkbox" id="chkBoutonBurger" />
        <label for="chkBoutonBurger" class="boutonBurger"></label>

        <div class="box-global">
        <nav class="box-menu">
            <a href="index.php?s=1">Carolanne Legault</a>
            <a href="index.php?s=2">Réalisations</a>
            <a href="index.php?s=3">Contact</a>
        </nav>
        
        ';

        echo $sHtml;
    }


    /**
     * Modèle Html pour l'accueil sur le site
     */
    public function afficherAccueil(){
        $sHtml = '

            <div class="contenu">
                <div class="box header">
                
                    <div class="box imageLogo">
                    
                        <img class="imgLogo"  src="../../public/medias/img/logoBase.png" alt="monLogo">
            
                    </div>
    
                    <h2>Carolanne Legault</h2>
                    <h4>Future technicienne en intégration multimédia</h4>
    
                </div>
    
                <div class="box raccourcis">
                    <div class="box-oeuvres"><a href="index.php?s=2">Réalisations</a></div>
                    <div class="box-contact"><a href="index.php?s=3">Contact</a></div>
                </div>
    
            </div>
    
        ';

        echo $sHtml;

    } // Fin de la fonction


    /**
     * Modèle Html pour le Footer du site internet
     */
    public function afficherFooter(){
        $sHtml = '
            <div class="box footer">
                Copyright 2019 &#64; Carolanne Legault
            </div>
        </div>

        
        <script>
            (function() { //IIFE
                var leCheckBox = document.querySelector("input");
                var lesBoutons = document.querySelectorAll(".box-menu a");
                var nbBoutons = lesBoutons.length;		
                console.log(nbBoutons);
                
                for (var i = 0; i < nbBoutons; i++) {
                    lesBoutons[i].addEventListener("click", function() {
                        console.log(leCheckBox.checked);
                        leCheckBox.checked = false;
                    }, false);
                }
            })(); //Fin IIFE
        </script>
        ';

        echo $sHtml;
    }


    /**
     * Modèle Html pour la page des réalisations
     */
    public function afficherRealisations(){
        $sHtml ='
        <div class="contenu">

            <div class="uneRealisation">
                <img class="imgRealisation" src="../../public/medias/anime01.png"  alt="uneRealisation">
            </div>

            <div class="uneRealisation">
                <img class="imgRealisation" src="../../public/medias/chuteLibreFemme.png"  alt="uneRealisation">
            </div>

            <div class="uneRealisation">
                <img class="imgRealisation" src="../../public/medias/femmeFace.png"  alt="uneRealisation">
            </div>

            <div class="uneRealisation">
                <img class="imgRealisation" src="../../public/medias/LogoSansJoint.3.0.png"  alt="uneRealisation">
            </div>

            <div class="uneRealisation">
                <img class="imgRealisation" src="../../public/medias/manga02.png"  alt="uneRealisation">
            </div>

            <div class="uneRealisation">
                <img class="imgRealisation" src="../../public/medias/mangaEye.png"  alt="uneRealisation">
            </div>

            <div class="uneRealisation">
                <img class="imgRealisation" src="../../public/medias/muetteFemme.png"  alt="uneRealisation">
            </div>

            <div class="uneRealisation">
                <img class="imgRealisation" src="../../public/medias/YeuxBandes.png"  alt="uneRealisation">
            </div>

        </div>
        ';

        echo $sHtml;

    } // Fin de la fonction


      /**
	 * Afficher la page montrant toutes les oeuvres
	 */
	public function afficherOeuvres($aoOeuvres)
	{
        $iMax = count($aoOeuvres);
		$sHtml = '
        <div class="contenu" id="content">
            
                <div class="uneRealisation" id="oeuvres">';
                        for($i=0; $i < $iMax; $i++)
                        {
                            if($aoOeuvres[$i]->getsUrlMedia() != "")
                            {
                                $sUrlMedia = "../../public/medias/".$aoOeuvres[$i]->getsUrlMedia();
                                $oFileInfo = new finfo();
                                $sTypeMime = @$oFileInfo->file($sUrlMedia, FILEINFO_MIME_TYPE);
                                $aTypeMedia = explode("/", $sTypeMime);
                            $sHtml .='
                            <div class="oeuvre">
                            <a href="index.php?s='.$_GET['s'].$aoOeuvres[$i]->getidMedia().'">';
                            
                                 $sHtml .='
                                     <img class="oeuvre-contenu" style="background-color: url(../../public/medias/'.$aoOeuvres[$i]->getsUrlMedia().'); border:none;">	
                                 ';
                             

                             
                         }
                         $sHtml .='
                             <div class="overlay">
                                 <p class="titreOeuvre">'.$aoOeuvres[$i]->getsTitreMedia().'</p>
                             </div>
                         </a>
                            </div>';
                    
                        
                        }
                    
        $sHtml .='
                </div>';
            
		echo $sHtml;
	}//fin de la fonction


    /**
     * Modèle Html pour la page des réalisations
     */
    public function afficherContact(){
        $sHtml ='
        <div class="contenu">
            <div class="mesContacts">
                <img class="logo" src="../../public/medias/img/logoBase.png" alt="mon image">

                <div class="infoPerso">
                    <div class="nomComplet">
                        Nom complet: Carolanne Legault
                    </div>

                    <div class="courriel">
                        Courriel: carolannelegault06@outlook.com
                    </div>


                    <div class="description">
                        Finissante en intégration multimédia. Je me spécialise dans la réalisations de modélisation 3D avec le logiciel Maya ainsi que Blender. Des illustrations de style cartoonique ainsi que réaliste sont mes principaux styles graphique en ce qui concerne les illustrations. Le mon de la 3D est celui que je trouve intéressant puisque nous pouvons créer un tout nouveau monde.
                    </div>

                </div>
            </div>
            
        </div>
        ';

        echo $sHtml;

    } // Fin de la fonction

    
} // Fin de la classe