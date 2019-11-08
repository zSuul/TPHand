<?php
require __DIR__ . "/../autoload.php";

/*
 * Classe testMatch
 * Author : Boris Weber - Université de Grenoble Alpes - IUT de Valence
 */

$matchTest = new Match("Montpellier:26 / Pays d'Aix:23");
echo $matchTest->__toString() . "\n";

?>
