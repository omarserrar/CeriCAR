<?php
// Inclusion de la classe utilisateur
require_once "utilisateur.class.php";

class trajetTable {

  public static function getTrajet($depart,$arrivee)
	{
  	
		$em = dbconnection::getInstance()->getEntityManager() ;

		$trajetRepository = $em->getRepository('trajet');
		$trajet = $trajetRepository->findOneBy(array('depart' => $depart, 'arrivee' => $arrivee));	
		

		return $trajet; 
	} 
	public static function getVilles(){
		$em = dbconnection::getInstance()->getEntityManager() ;
		$qb = $em->createQueryBuilder();
		$query = $qb->select('t.depart ville')
				   ->from(trajet::class, 't')->distinct()->orderBy('t.depart')->getQuery();
		$villes = $query->execute();
		return $villes;
	}
}

?>
