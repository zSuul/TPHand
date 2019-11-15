<?php
require __DIR__ . "/../autoload.php";

/*
 * Classe Match
 * Author : Boris Weber - Université de Grenoble Alpes - IUT de Valence
 */

$nombreJournees = $argv[1];

$classement = new Classementv2("../equipes.txt");

for($i = 1; $i <= $nombreJournees; $i++){
	if($i < 10){
		$journee = new Journee("../Journees/journee0" . $i . ".txt");
		$classement->enregistre($journee);
	}
	else{
		$journee = new Journee("../Journees/journee" . $i . ".txt");
		$classement->enregistre($journee);
	}
}

$classement->affiche();

?>