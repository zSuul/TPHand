<?php

/*
 * Classe Match
 * Author : Boris Weber - Université de Grenoble Alpes - IUT de Valence
 */

Class Classementv2 {

	public $lesEquipes;
	public $maxLongueurNom = 30;
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
	}

	public function compare($a, $b){ // Fonction "compare" pour la question 4 a)

	    if($a->points > $b->points)
	    	return -1;
	    else if($a->points < $b->points)
	    	return 1 ;
	    else if($a->diff > $b->diff)
            return -1 ;
        else if($a->diff < $b->diff)
            return 1 ;
	}

	public function compare($a, $b){ // Fonction "compare" pour la question 4 a)

	    if($a->points > $b->points)
	    	return -1;
	    else if($a->points < $b->points)
	    	return 1 ;
	    else if($a->diff > $b->diff)
            return -1 ;
        else if($a->diff < $b->diff)
            return 1 ;
	}

	/*public function compare($a, $b){ // Fonction "compare" pour la question 4 b)

	    if($a->points > $b->points)
	    	return -1;
	    else if($a->points < $b->points)
	    	return 1 ;
	    else if($a->diff > $b->diff)
            return -1 ;
        else if($a->diff < $b->diff)
            return 1 ;
	}*/

	public function affiche(){

        $nombreDeTiretsNom = str_repeat("-", $this->maxLongueurNom+1);
        $nombreDeTirets = str_repeat("-", 9);
        printf("+%s+", $nombreDeTiretsNom);
        for($i = 0; $i < 8; $i++)
            printf("%s+", $nombreDeTirets);
        printf("\n");
        printf("| %-" . $this->maxLongueurNom . "s|", "Club");
        printf(" %8s|", "Points");
        printf(" %9s|", "Joués");
        printf(" %9s|", "Gagnés");
        printf(" %8s|", "Perdus");
        printf(" %8s|", "Nuls");
        printf(" %8s|", "Pour");
        printf(" %8s|", "Contre");
        printf(" %8s|", "Diff.");
        printf("\n");
        printf("+%s+", $nombreDeTiretsNom);
        for($i = 0; $i < 8; $i++)
            printf("%s+", $nombreDeTirets);

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
            
        usort($this->lesEquipes,["Classementv2", "compare"]);
		foreach ($this->lesEquipes as $uneEquipe) {
			echo "| "  . str_pad($uneEquipe->nom, $this->maxLongueurNom) . " | " . $uneEquipe->points . " | " . $uneEquipe->joues . " | " . $uneEquipe->gagnes . " | " . $uneEquipe->perdus . " | " . $uneEquipe->nuls . " | " . $uneEquipe->pour . " | " . $uneEquipe->contre . " | " . $uneEquipe->diff . "\n";/* 
                . "+------------------------------------------+----------+----------+----------+----------+----------+----------+----------+----------+ <br/>";*/
        }
	}
}

?>
