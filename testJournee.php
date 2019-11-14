<?php
require __DIR__ . "/../autoload.php";

/*
 * Classe testJournee
 * Author : Boris Weber - Université de Grenoble Alpes - IUT de Valence
 */

$journeeTest = new Journee("../Journees/journee01.txt");
echo $journeeTest->affiche();

?>
