<?php
// Inclusion de la classe utilisateur
require_once "reservation.class.php";

class reservationTable {

  public static function getReservationsByVoyage($id)
	{
		$em = dbconnection::getInstance()->getEntityManager() ;
		$reservationRepository = $em->getRepository('reservation');
		$reservations = $reservationRepository->findBy(array('voyage' => $id));
		return $reservations;
	}
	public static function getReservationsByUser($user_id)
	{
		$em = dbconnection::getInstance()->getEntityManager() ;
		$reservationRepository = $em->getRepository('reservation');
		$reservations = $reservationRepository->findBy(array('voyageur' => $user_id));
		return $reservations;
	}
		public static function nouvelleReservation($user, $voyages, $nbvoyageur){
		$em = dbconnection::getInstance()->getEntityManager() ;
		$reservationRepository = $em->getRepository('reservation');
		foreach($voyages as $voyage){
			if(voyageTable::getPlaceDisponibleVoyage($voyage)<$nbvoyageur) return 0;
			for($i=0;$i<$nbvoyageur;$i++){
				$reservation = new reservation();
				$reservation->voyage = voyageTable::getVoyageById($voyage);
				$reservation->voyageur = $user;
				$em->persist($reservation);
				$em->flush();
			}
		}
		return 1;
	}
}

?>
