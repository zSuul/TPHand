<?php
require __DIR__ . "/../autoload.php";

/*
 * Classe testJournee
 * Author : Boris Weber - Université de Grenoble Alpes - IUT de Valence
 */

$equipeTest = new Equipe("ARLES");
$equipeTest->enregistreResultat(18,15);
echo $equipeTest->__toString() . "\n";

?>