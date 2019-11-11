<?php
require __DIR__ . "/../autoload.php";

/*
 * Classe Match
 * Author : Boris Weber - Université de Grenoble Alpes - IUT de Valence
 */
	
$classementv1Test = new Classementv1("../equipes.txt");
$journeeTest1 = new Journee("../Journees/journee01.txt");
$journeeTest2 = new Journee("../Journees/journee02.txt");
$classementv1Test->enregistre($journeeTest1);
//$classementv1Test->affiche();
$classementv1Test->enregistre($journeeTest2);
//$classementv1Test->affiche();

?>