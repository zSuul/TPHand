<?php

/*
 * Classe Match
 * Author : Boris Weber - Université de Grenoble Alpes - IUT de Valence
 */

Class Classementv1 {

	public $lesEquipes;
	public $maxLongueurNom = 29;
	public $lesJournees;

	public function __construct(string $nomFichier){
		$handle = fopen($nomFichier, "r");
		if($handle){
			while(($buffer = fgets($handle, 256)) !== false){
				$this->lesEquipes[] = trim($buffer);
			}
			fclose($handle);
		}
	}

	public function enregistre(Journee $journee) {
		$laJournee = $journee;

		foreach ($laJournee->lesMatches as $key => $uneJournee) {
			$matchesJournee = new Match($uneJournee);
			$this->lesJournees[$key] = $matchesJournee;
		}

		var_dump($this->lesJournees);

	}

	public function affiche(){

		$i = 1;

		echo  "         +------------------------------------------+----------+----------+----------+----------+----------+----------+----------+----------+ <br/>"
		    . "          | Club                                                | Points    | Joués     | Gagnés  | Perdus   | Nuls     | Pour       | Contre   | Diff.      | <br/>"
		    . "+-----+------------------------------------------+----------+----------+----------+----------+----------+----------+----------+----------+ <br/>";

		   var_dump($this->lesJournees);

		foreach ($this->lesJournees as $uneJournee) {	
			if(in_array($uneJournee->domicile, $this->lesEquipes) || in_array($uneJournee->exterieur, $this->lesEquipes)){
				$equipe1 = new Equipe($uneJournee->domicile);
				$equipe2 = new Equipe($uneJournee->exterieur);
				$equipe1->enregistreResultat($uneJournee->scoreDomicile, $uneJournee->scoreExterieur);
				$equipe2->enregistreResultat($uneJournee->scoreExterieur, $uneJournee->scoreDomicile);
				
				echo " |  " . $i . "    | " . str_pad($equipe1->nom, $this->maxLongueurNom, "_") . " | " . $equipe1->points . "_______| " . $equipe1->joues . "______| " . $equipe1->gagnes . "______| " . $equipe1->perdus . "______| " . $equipe1->nuls . "_____| " . $equipe1->pour . "_____| " . $equipe1->contre . "_____| " . $equipe1->diff . "______| " . "<br/>"
				    . "+-----+------------------------------------------+----------+----------+----------+----------+----------+----------+----------+----------+ <br/>";

				    $i++;

				echo " |  " . $i . "    | " . str_pad($equipe2->nom, $this->maxLongueurNom, "_") . " | " . $equipe2->points . "_______| " . $equipe2->joues . "______| " . $equipe2->gagnes . "______| " . $equipe2->perdus . "______| " . $equipe2->nuls . "_____| " . $equipe2->pour . "_____| " . $equipe2->contre . "_____| " . $equipe2->diff . "______| " . "<br/>"
				    . "+-----+------------------------------------------+----------+----------+----------+----------+----------+----------+----------+----------+ <br/>";

				$i++;
			}
		}

	}

}

?>