<?php

/*
 * Classe Match
 * Author : Boris Weber - Université de Grenoble Alpes - IUT de Valence
 */

class Equipe {

	public $nom;
	public $points = 0;
	public $joues = 0;
	public $gagnes = 0;
	public $perdus = 0;
	public $nuls = 0;
	public $pour;
	public $contre;
	public $diff;

	public function __construct(string $nom){
		$this->nom = $nom;

	}

	public function __toString(){

		return "Nom : " . $this->nom . ". Points : " . $this->points . ". Joués : " . $this->joues . ". Gagnés : " . $this->gagnes . ". Perdus : " . $this->perdus . ". Nuls : " . $this->nuls . ". Pour : " . $this->pour . ". Contre : " . $this->contre . ". Diff : " . $this->diff;
	}	

	public function enregistreResultat(int $marques, int $encaisses){
		$this->marques = $marques;
		$this->ecaisses = $encaisses;

		if($marques > $encaisses){
			$this->gagnes += 1;
		}elseif($marques < $encaisses){
			$this->perdus += 1;
		}else{
			$this->nuls += 1;
		}

		$this->points = $this->gagnes * 2 + $this->nuls;
		$this->joues = $this->gagnes + $this->nuls + $this->perdus;
		$this->pour = $marques;
		$this->contre = $encaisses;
		$this->diff = $this->pour - $this->contre;
	}
}

?>