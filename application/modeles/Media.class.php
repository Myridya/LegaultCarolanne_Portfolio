
<?php
/**
 * Fichier Media.class.php
 * @author Caroline Martin
 * @version Wednesday 3rd of October 2018 07:13:54 PM
 */
class Media {
	private $idMedia;
	private $sTitreMedia;
	private $sUrlMedia;
	private $sTypeMedia;
	private $sDescriptionMedia;
	private $aTypeMIME = array('image/gif','image/jpeg','image/png','video/mp4','video/swf');
	
    /**
    * constructeur 
	* @param integer $idMedia
	* @param string $sTitreMedia
	* @param string $sUrlMedia
	* @param string $sTypeMedia
	* @param string $sDescriptionMedia
	* @return void
    */
    public function __construct($idMedia=1,$sTitreMedia="",$sUrlMedia="",$sDescriptionMedia=""){
			$this->setidMedia($idMedia);
			$this->setsTitreMedia($sTitreMedia);
			$this->setsUrlMedia($sUrlMedia);
			$this->setsDescriptionMedia($sDescriptionMedia);
    	
    }//fin de la fonction
	
    /**
    * affecte la valeur du paramètre a la propriété privée 
    * @param integer $idMedia
    * @return void
    */
    public function setidMedia($idMedia){     	
    	TypeException::estNumerique($idMedia);
    	$this->idMedia = $idMedia;
    }//fin de la fonction
	
    /**
    * retourne la valeur de la propriété privée 
    * @param void
    * @return  integer
    */
    public function getidMedia(){	   
    	return $this->idMedia;
    }//fin de la fonction
		
    /**
    * affecte la valeur du paramètre a la propriété privée 
    * @param string $sTitreMedia
    * @return void
    */
    public function setsTitreMedia($sTitreMedia){     	
    	TypeException::estChaineDeCaracteres($sTitreMedia);
    	$this->sTitreMedia = $sTitreMedia;
    }//fin de la fonction
	
    /**
    * retourne la valeur de la propriété privée 
    * @param void
    * @return  string
    */
    public function getsTitreMedia(){	   
    	return $this->sTitreMedia;
    }//fin de la fonction
		
    /**
    * affecte la valeur du paramètre a la propriété privée 
    * @param string $sUrlMedia
    * @return void
    */
    public function setsUrlMedia($sUrlMedia){     	
    	TypeException::estChaineDeCaracteres($sUrlMedia);
    	$this->sUrlMedia = $sUrlMedia;
    }//fin de la fonction
	
    /**
    * retourne la valeur de la propriété privée 
    * @param void
    * @return  string
    */
    public function getsUrlMedia(){	   
    	return $this->sUrlMedia;
    }//fin de la fonction
		
	
	/**
    * affecte la valeur du paramètre a la propriété privée 
    * @param string $sTypeMedia
    * @return void
    */
    public function setsTypeMedia($sTypeMedia){
		TypeException::estChaineDeCaracteres($sTypeMedia);
		if(in_array($sTypeMedia, $this->aTypeMIME) == false){
			throw new Exception("ERR_TYPE_MIME");			
		}
    	$this->sTypeMedia = $sTypeMedia;
	}
	/**
    * retourne la valeur de la propriété privée 
    * @param void
    * @return  string
    */
    public function getsTypeMedia(){
    	return $this->sTypeMedia;
	}
	
	/**
    * affecte la valeur du paramètre a la propriété privée 
    * @param string $sDescriptionMedia
    * @return void
    */
    public function setsDescriptionMedia($sDescriptionMedia){
		TypeException::estChaineDeCaracteres($sDescriptionMedia);
    	$this->sDescriptionMedia = $sDescriptionMedia;
	}
	/**
    * retourne la valeur de la propriété privée 
    * @param void
    * @return  string
    */
    public function getsDescriptionMedia(){
    	return $this->sDescriptionMedia;
    }
		
    
    /**
    * rechercher un enregistrement dans la table "medias"
    * @param void
    * @return boolean (true si trouvé, false dans les autres cas)
    */
    public function rechercherUn(){	   
    	//Se connecter à la base de données
		$oPDOLib = new PDOLib();
		//Réaliser la requête
		$sRequete="
			SELECT * 
			FROM medias 
			WHERE idMedia= :idMedia";
		
		//Préparer la requête
		$oPDOStatement = $oPDOLib->getoPDO()->prepare($sRequete);
		
		//Lier les paramètres aux valeurs
		$oPDOStatement->bindValue(":idMedia", $this->getidMedia(), PDO::PARAM_INT);
		
		//Exécuter la requête
		$b = $oPDOStatement->execute();
		
		//Si la requête a bien été exécutée
		if($b == true){
			//Récupérer l'enregistrement (fetch)
			$aEnregs = $oPDOStatement->fetch(PDO::FETCH_ASSOC);
			if($aEnregs !== false){
				//Affecter les valeurs aux propriétés privées de l'objet
				$this->__construct($aEnregs['idMedia'],$aEnregs['sTitreMedia'],$aEnregs['sUrlMedia'],$aEnregs['sDescriptionMedia']);
				$oPDOLib->fermerLaConnexion();
				return true;
			}
		}
		$oPDOLib->fermerLaConnexion();
		return false;	
		
    }//fin de la fonction
		
    /**
    * rechercher tous les enregistrements dans la table "medias"
    * @param void
    * @return array ou boolean (false si la recherche s'est mal passée)
    */
    public function rechercherTous(){	   
    	//Se connecter à la base de données
		$oPDOLib = new PDOLib();
		//Réaliser la requête
		$sRequete="
			SELECT * 
			FROM medias";
		
		//Préparer la requête
		$oPDOStatement = $oPDOLib->getoPDO()->prepare($sRequete);
		
		//Lier les paramètres aux valeurs				
		//void
		
		//Exécuter la requête
		$b = $oPDOStatement->execute();
		
		//Si la requête a bien été exécutée
		if($b == true){
			//Récupérer le array 
			$aEnregs = $oPDOStatement->fetchAll(PDO::FETCH_ASSOC);
			$iMax = count($aEnregs);
			
			$aoEnregs = array(); 
			if($iMax > 0){
				for($iEnreg=0;$iEnreg<$iMax;$iEnreg++){
					$aoEnregs[$iEnreg] = new Media(
					$aEnregs[$iEnreg]['idMedia'],$aEnregs[$iEnreg]['sTitreMedia'],$aEnregs[$iEnreg]['sUrlMedia'],$aEnregs[$iEnreg]['sDescriptionMedia']				
					);
					$aoEnregs[$iEnreg]->setsTypeMedia($aEnregs[$iEnreg]['enumTypeMedia']);
				}
				$oPDOLib->fermerLaConnexion();
				//Retourner le array d'objets de la classe Media				
				return $aoEnregs;
			}
		}
		$oPDOLib->fermerLaConnexion();
			
		
    }//fin de la fonction
    
		
}//fin de la classe Media