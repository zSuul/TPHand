<?php
require __DIR__ . "/../autoload.php";

/*
 * Classe Match
 * Author : Boris Weber - Université de Grenoble Alpes - IUT de Valence
 */
	
$classementv2Test = new Classementv2("../equipes.txt");
$journeeTest1 = new Journee("../Journees/journee01.txt");
$journeeTest2 = new Journee("../Journees/journee02.txt");
$classementv2Test->enregistre($journeeTest1);
$classementv2Test->affiche();
$classementv2Test->enregistre($journeeTest2);
$classementv2Test->affiche();

?>