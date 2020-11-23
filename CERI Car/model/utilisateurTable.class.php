<?php
// Inclusion de la classe utilisateur
require_once "utilisateur.class.php";

class utilisateurTable {

  public static function getUserByLoginAndPass($login,$pass)
	{
	  	$em = dbconnection::getInstance()->getEntityManager() ;

		$userRepository = $em->getRepository('utilisateur');
		$user = $userRepository->findOneBy(array('identifiant' => $login, 'pass' => sha1($pass)));	
		
		return $user; 
	}
	public static function getUserByLogin($login)
	{
	  	$em = dbconnection::getInstance()->getEntityManager() ;

		$userRepository = $em->getRepository('utilisateur');
		$user = $userRepository->findOneBy(array('identifiant' => $login));	
		
		return $user; 
	}
	public static function ajouterUtilisateur($nom, $prenom, $login, $password){
		$em = dbconnection::getInstance()->getEntityManager() ;
		$utilisateur = new utilisateur();
		$utilisateur->nom = $nom;
		$utilisateur->prenom = $prenom;
		$utilisateur->identifiant = $login;
		$utilisateur->pass = sha1($password);
		$user = $em->persist($utilisateur);
		$em->flush();
		return $user;
	}
	public static function getUserById($id)
	{
		$em = dbconnection::getInstance()->getEntityManager() ;

		$userRepository = $em->getRepository('utilisateur');
		$user = $userRepository->findOneBy(array('id' => $id));	
		
		if ($user == false){
			echo 'Erreur sql';
				   }
		return $user; 
	}

  
}


?>
