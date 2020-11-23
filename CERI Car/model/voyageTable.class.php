<?php


class voyageTable {
	public static $cc = 0;
  public static function getVoyagesByTrajet($id)
	{
		$em = dbconnection::getInstance()->getEntityManager() ;
		$voyageRepository = $em->getRepository('voyage');
		$voyages = $voyageRepository->findBy(array('trajet' => $id));
		return $voyages;
	}
	public static function getVoyageById($id){
		$em = dbconnection::getInstance()->getEntityManager() ;
		$voyageRepository = $em->getRepository('voyage');
		$voyage = $voyageRepository->findOneBy(array('id' => $id));
		return $voyage;
	}
	/*
	$qb = $em->createQueryBuilder();
		$query = $qb->select('identifiant')
				   ->from('jabaianb.utilisateur', 'v')->getQuery();*/
	public static function getVoyagesByTrajet2($trajetObjet, $nbVoyageur)
	{
		$em = dbconnection::getInstance()->getEntityManager() ;
		$voyageRepository = $em->getRepository('voyage');
		$connexion = $em->getConnection() ;
		$query = "SELECT * FROM recuperervoyage('{$trajetObjet->depart}', '{$trajetObjet->arrivee}',$nbVoyageur ,-1,'');";
	//	echo $query;
	//	$start_time = microtime(true); 
		$voyages = $connexion->fetchAll($query);
		if($voyages)
			$voyages = voyageTable::getVoyages($voyageRepository,$trajetObjet->arrivee,"",NULL, 0, $voyages);
		// End clock time in seconds 
	/*	$end_time = microtime(true); 
		  
		// Calculate script execution time 
		$execution_time = ($end_time - $start_time);
		echo " Execution time of script = ".$execution_time." sec";*/ 
		return $voyages;
	}
	public static function getVoyagesByUser($user_id) {
		$em = dbconnection::getInstance()->getEntityManager();
		$voyageRepository = $em->getRepository('voyage');
		$voyages = $voyageRepository->findBy(array('conducteur' => $user_id));
		return $voyages;
	}
/*	public static function getVoyages($arrivee,$lastVoyage,$numvoy,$voyages){
		$em = dbconnection::getInstance()->getEntityManager() ;
		$voyageRepository = $em->getRepository('voyage');
		$voyagesTable = array();
		for($i=$numvoy;$i<count($voyages);$i++){
			$voyageActuel = $voyageRepository->find($voyages[$i]['idvoyagetemp']);
			echo $voyageActuel->id.'<br>';
			if($voyageActuel->trajet->arrivee == $arrivee) array_push($voyagesTable, new Correspendance($voyageActuel,null));
			else{
				$prochainVoyages = voyageTable::getVoyages($arrivee,$voyageActuel, $i+1, $voyages);
				foreach($prochainVoyages as $crsp){
					array_push($voyagesTable, new Correspendance($voyageActuel,$crsp));
				}
			}
		}
		return $voyagesTable;
	}*/
	public static function getPlaceDisponibleVoyage($voyageid){
		$em = dbconnection::getInstance()->getEntityManager() ;
		$voyageRepository = $em->getRepository('voyage');
		$connexion = $em->getConnection() ;
		$query = "SELECT * FROM placeRestante($voyageid);";
	//	echo $query;
	//	$start_time = microtime(true); 
		$nbPlace = $connexion->fetchColumn($query);
		return $nbPlace;
	}
	public static function nouveauVoyage($depart, $arrivee, $heuredepart, $nbplace, $tarifparkm, $contraintes, $user){
		$em = dbconnection::getInstance()->getEntityManager() ;
		$voyageRepository = $em->getRepository('voyage');
		$trajet = trajetTable::getTrajet($depart,$arrivee);
		$tarif = (int)($tarifparkm * $trajet->distance);
		if($trajet&&$user&&$tarif>0){
			$voyage = new voyage();
			$voyage->trajet = $trajet;
			$voyage->conducteur = $user;
			$voyage->nbplace = $nbplace;
			$voyage->heuredepart = $heuredepart;
			$voyage->tarif = $tarif;
			$voyage->contraintes = trim($contraintes);
			$em->persist($voyage);
			$em->flush();
			return $voyage;
		}
		return null;
	}
	public static function getVoyages($voyageRepository, $arrivee,$oldVille,$OldCorrespendance,$i,$voyages){
		$actDepart = $voyages[$i]['deptmp'];
		if($OldCorrespendance == NULL) $OldCorrespendance = array();
		$result = array();
		for(;$i<count($voyages);$i++){

			if($voyages[$i]['deptmp']!=$actDepart)break;
			//voyageTable::$cc++;echo voyageTable::$cc."<br>";
			$correspendance = $OldCorrespendance;
			array_push($correspendance,$voyageRepository->find($voyages[$i]['idvoyagetemp']));
			/*if(count($OldCorrespendance) == 0)
				echo $correspendance[0]." $i<br>";*/
			if($voyages[$i]['arrtmp']==$arrivee){
				array_push($result, $correspendance);
			} 
			else{
				$results = voyageTable::getVoyages($voyageRepository,$arrivee,$voyages[$i]['deptmp'],$correspendance,$i+1,$voyages);
				$r = 0;
				foreach($results as $res){
					array_push($result, $res);
					$r = $res;
				}
				while($voyages[++$i]['idvoyagetemp']!=$r[count($r)-1]->id);
			}

		}

		return $result;
	}

}

?>
