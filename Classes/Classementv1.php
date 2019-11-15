<?php

/*
 * Classe Match
 * Author : Boris Weber - Université de Grenoble Alpes - IUT de Valence
 */

Class Classementv1 {

	public $lesEquipes;
	public $maxLongueurNom = 29;
	public $lesJournees = array();

	public function __construct(string $nomFichier){
		$handle = fopen($nomFichier, "r");
		if($handle){
			while(($buffer = fgets($handle, 256)) !== false){
				$this->lesEquipes[] = new Equipe(trim($buffer));
			}
			fclose($handle);
		}
	}

	public function enregistre(Journee $journee) {
		$laJournee = $journee;

		foreach ($laJournee->lesMatches as $key => $uneJournee) {
			$this->lesJournees[$key] = new Match($uneJournee);
		}

		foreach ($this->lesEquipes as $uneEquipe) {

			foreach ($this->lesJournees as $uneJournee) {
				if($uneJournee->domicile == $uneEquipe->nom){
					$uneEquipe->enregistreResultat($uneJournee->scoreDomicile, $uneJournee->scoreExterieur);
				}
			}

			foreach ($this->lesJournees as $uneJournee) {
				if($uneJournee->exterieur == $uneEquipe->nom){
					$uneEquipe->enregistreResultat($uneJournee->scoreExterieur, $uneJournee->scoreDomicile);
				}
			}
		}
	}

	public function affiche(){

		echo  "+------------------------------------------+----------+----------+----------+----------+----------+----------+----------+----------+ \n"
		    . " | Club                                                | Points    | Joués     | Gagnés  | Perdus   | Nuls     | Pour       | Contre   | Diff.      | \n"
		    . "+------------------------------------------+----------+----------+----------+----------+----------+----------+----------+----------+ \n";

		foreach ($this->lesEquipes as $uneEquipe) {
			echo " | "  . $uneEquipe->nom . " | " . $uneEquipe->points . " | " . $uneEquipe->joues . " | " . $uneEquipe->gagnes . " | " . $uneEquipe->perdus . " | " . $uneEquipe->nuls . " | " . $uneEquipe->pour . " | " . $uneEquipe->contre . " | " . $uneEquipe->diff . "</br>" 
			. "+------------------------------------------+----------+----------+----------+----------+----------+----------+----------+----------+ \n";
		}

	}
}

?>