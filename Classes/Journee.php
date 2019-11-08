<?php

/*
 * Classe Journee
 * Author : Boris Weber - Université de Grenoble Alpes - IUT de Valence
 */

class Journee {
    public $numero;
    public $debut;
    public $fin;
    public $lesMatches;

    public function __construct(string $nomFichier) {
        $handle = fopen($nomFichier, "r");
        if($handle){
            $buffer = fgets($handle, 256);
            $premiereLigne = explode(":", $buffer);
            $premiereLigne[2] = trim($premiereLigne[2]);
            $this->numero = $premiereLigne[0];
            setlocale(LC_TIME, "fr_FR");
            //$this->debut = DateTime::createFromFormat("d/m/Y", $premiereLigne[1]); En anglais.
            //$this->fin = DateTime::createFromFormat("d/m/Y", $premiereLigne[2]); En anglais.
            $this->debut = strtotime($premiereLigne[1]);
            $this->fin = strtotime($premiereLigne[2]);

            while(($buffer = fgets($handle, 256)) !== false){
                $this->lesMatches[] = $buffer;
            }
            fclose($handle);
        }
    }

    public function affiche() {
        echo "Journée " . $this->numero . ", du " . strftime("%A", $this->debut) . " " . strftime("%d/%m/%G", $this->debut) . " au " . strftime("%A", $this->fin) . " " . strftime("%d/%m/%G", $this->fin) . "\n\n";
        foreach($this->lesMatches as $unMatch){
            echo strtoupper($unMatch . "\n");
        }
    }
}

?>