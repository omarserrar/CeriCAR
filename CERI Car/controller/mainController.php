<?php

class mainController
{

	public static function helloWorld($request,$context)
	{
		return context::SUCCESS;
	}
	public static function test($request,$context)
	{
		echo voyageTable::getPlaceDisponibleVoyage(10);
		return context::SUCCESS;
	}
	public static function logout($request, $context){
		$context->setSessionAttribute('user_id',NULL);
		header('location: monApplication.php');
	}
	public static function login($request,$context)
	{
		if(key_exists("identifiant",$request) &&key_exists("password",$request)){
			$context->identifiant =  $request['identifiant'];
			$context->password =  $request['password'];
			$user = utilisateurTable::getUserByLoginAndPass($context->identifiant, $context->password);
			if($user){
				$context->setSessionAttribute('user_id',$user->id);
				header('location: monApplication.php?action=rechercheVoyage');
			}
			else{
				$context->errorMSG = "Nom d'utilisateur ou mots de passe incorrect";
				return context::ERROR;
			}
		}
		return context::SUCCESS;
	}
	public static function nouveauVoyage($request,$context)
	{
		if($context->getSessionAttribute("user_id")!=NULL) $context->user = utilisateurTable::getUserById($context->getSessionAttribute("user_id"));
		else return context::ERROR;
		$context->villes = trajetTable::getVilles();
		return context::SUCCESS;
	}
	public static function nouveauVoyagePost($request, $context){
		$context->success = "false";
		if($context->getSessionAttribute("user_id")!=NULL) $context->user = utilisateurTable::getUserById($context->getSessionAttribute("user_id"));
		else {
			$context->error = "Not connected";
			return context::ERROR;
		}
		header('Content-Type: application/json');
		if(key_exists("depart",$request)&&key_exists("tarifparkm",$request)&&key_exists("arrivee",$request)&&key_exists("heuredepart",$request)&&key_exists("nbplace",$request)&&key_exists("contraintes",$request)){

			$context->tarifparkm = $request['tarifparkm'];
			$context->depart = $request['depart'];
			$context->arrivee = $request['arrivee'];
			$context->heuredepart = $request['heuredepart'];
			$context->nbplace = $request['nbplace'];
			$context->contraintes = $request['contraintes'];
			if($request['depart']==$request['arrivee']){
				$context->error = "La ville de depart doit etre differente de celle d'arrivée";
				return context::ERROR;
			}
			if($context->tarifparkm<=0){
				$context->error = "Le tarif par km doit etre superieure à 0";
				return context::ERROR;	
			}
			if($context->nbplace<=0){
				$context->error = "Le nombre de places doit etre superieure à 0";
				return context::ERROR;	
			}
			if($context->heuredepart<0 || $context->heuredepart >23){
				$context->error = "Heure de départ incorrect";
				return context::ERROR;	
			}
			else{

				$context->voyage = voyageTable::nouveauVoyage($context->depart, $context->arrivee, $context->heuredepart,$context->nbplace, $context->tarifparkm, $context->contraintes, $context->user);
				if(!$context->voyage){
					$context->error = "ERREUR: Le voyage n'a pas pu etre ajouté";
					return context::ERROR;	
				}
				$context->success = "true";
				return context::SUCCESS;
			}

		}
		$context->error = "Données Incomplete";
		return context::ERROR;
	}
	public static function reservation($request,$context)
	{
		if($context->getSessionAttribute("user_id")!=NULL) $context->user = utilisateurTable::getUserById($context->getSessionAttribute("user_id"));
		else return context::ERROR;
		if(key_exists("voyages",$request) &&key_exists("nbvoyageur",$request)){
			$result = reservationTable::nouvelleReservation($context->user, $request['voyages'], $request['nbvoyageur']);
			if($result==0) return context::ERROR;
		}
		return context::SUCCESS;
	}
	public static function mesvoyages($request,$context)
	{
		if($context->getSessionAttribute("user_id")!=NULL) $context->user = utilisateurTable::getUserById($context->getSessionAttribute("user_id"));
		else return context::ERROR;
		$voyagesData = array();
		$voyages = voyageTable::getVoyagesByUser($context->user->id);
		foreach($voyages as $voyage){
			array_push($voyagesData, new voyageData($voyage));
		}
		$context->voyagesData = $voyagesData;
		return context::SUCCESS;
	}
	public static function mesreservations($request,$context)
	{
		if($context->getSessionAttribute("user_id")!=NULL) $context->user = utilisateurTable::getUserById($context->getSessionAttribute("user_id"));
		else return context::ERROR;
		$voyagesData = array();
		$reservations = reservationTable::getReservationsByUser($context->user->id);
		foreach($reservations as $reservation){
			array_push($voyagesData, new voyageData($reservation->voyage));
		}
		$context->voyagesData = $voyagesData;
		return context::SUCCESS;
	}
	public static function register($request,$context)
	{
		if(key_exists("nom",$request) &&key_exists("prenom",$request) &&key_exists("identifiant",$request) &&key_exists("password",$request)){
			$context->nom = $request['nom'];
			$context->prenom =  $request['prenom'];
			$context->identifiant =  $request['identifiant'];
			$context->password =  $request['password'];
			if(utilisateurTable::getUserByLogin($request['identifiant'])){
				$context->errorMSG = "Cet identifiant est deja prit.";
				return context::ERROR;
			}
			else{
				$user = utilisateurTable::ajouterUtilisateur($context->nom, $context->prenom, $context->identifiant, $context->password);
				$context->success = true;
			}
		}
		return context::SUCCESS;
	}
	public static function rechercheVoyageCorrespendance($request,$context){
		$context->reservation ="";
		if(!$context->getSessionAttribute("user_id")!=NULL) $context->reservation ="disabled";
		$context->titre = "Recherché un Voyage";
		if(key_exists("depart",$request) && key_exists("arrivee",$request) && key_exists("nbvoyageur",$request)){
			$context->nbvoyageur = $request['nbvoyageur'];
			$context->trajet = trajetTable::getTrajet($request['depart'], $request['arrivee']);
			$correspendances = voyageTable::getVoyagesByTrajet2($context->trajet, $request['nbvoyageur']);
			$correspendancesData = array();
			foreach($correspendances as $correspendance){
				$cor = new correspendance($correspendance);
				array_push($correspendancesData, $cor);
			}
			$context->correspendancesData = $correspendancesData;
		}
		return context::SUCCESS;
	}
	public static function rechercheVoyage($request,$context){
		if($context->getSessionAttribute("user_id")!=NULL) $context->user = utilisateurTable::getUserById($context->getSessionAttribute("user_id"));
		$context->titre = "Recherché un Voyage";
		if(key_exists("depart",$request) && key_exists("arrivee",$request)){
			$trajet = trajetTable::getTrajet($request['depart'], $request['arrivee']);
			$context->voyages = voyageTable::getVoyagesByTrajet($trajet->id);
		}
		$context->villes = trajetTable::getVilles();
		return context::SUCCESS;
	}
	public static function ajaxRechercheVoyage($request,$context){
		if(key_exists("depart",$request) && key_exists("arrivee",$request)){
			$trajet = trajetTable::getTrajet($request['depart'], $request['arrivee']);
			$context->voyages = voyageTable::getVoyagesByTrajet($trajet->id);
			return context::SUCCESS;
		}
		return context::ERROR;
	}

	public static function index($request,$context){
		return context::SUCCESS;
	}
	public static function superTest($request,$context){
		if(key_exists("param1",$request) && key_exists("param2",$request))
			return context::SUCCESS;
		$context->error = "Veuillez enter un param1 et un param2";
		return context::ERROR;
	}
}