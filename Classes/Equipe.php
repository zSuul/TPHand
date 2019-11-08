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
		return "+--------------------+----------+----------+----------+----------+----------+----------+----------+----------+ <br/>"
		     . "| Club                    | Points    | Joués     | Gagnés  | Perdus   | Nuls     | Pour       | Contre   | Diff.     | <br/>"
		     . "+--------------------+----------+----------+----------+----------+----------+----------+----------+----------+ <br/>"
		   . "|" . $this->nom . "        | " . $this->points . " | " . $this->joues . " | " . $this->gagnes . " | " . $this->perdus . " | " . $this->nuls . " | " . $this->pour . " | " . $this->contre . " | " . $this->diff . " |";
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
	}

}

?>