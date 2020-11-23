<?php
class Correspendance{
	public $tarif;
	public $departFormat;
	public $arriveeFormat;
	public $distanceTotal;
	public $taille;
	public $voyagesData;
	public $duree;
	public function __construct($correspendance){
		$this->voyagesData = array();
		$this->tarif = 0;
		$this->distanceTotal = 0;
		$this->taille = 0;
		foreach($correspendance as $voyage){
			$this->tarif += $voyage->tarif;
			$this->taille ++;
			$this->distanceTotal += $voyage->trajet->distance;
			array_push($this->voyagesData, new VoyageData($voyage));
		}
		$departHeure = $this->voyagesData[0]->voyage->heuredepart;
		if($departHeure > $this->voyagesData[$this->taille-1]->arriveeHeure ){
			$dureeHeure = (24 - $departHeure) + $this->voyagesData[$this->taille-1]->arriveeHeure;
		}
		else{
			$dureeHeure = $this->voyagesData[$this->taille-1]->arriveeHeure - $this->voyagesData[0]->voyage->heuredepart;
		}
		$dureeMinute = $this->voyagesData[$this->taille-1]->arriveeMinute;
		$this->duree = $dureeHeure ."h".$dureeMinute;
		$this->dureeMinute = ($dureeHeure*60)+$dureeMinute;
		$this->departFormat = $this->voyagesData[0]->departFormat;
		$this->arriveeFormat = $this->voyagesData[$this->taille-1]->arriveeFormat;
	}
}
?>