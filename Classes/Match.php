<?php

/*
 * Classe Match
 * Author : Boris Weber - Université de Grenoble Alpes - IUT de Valence
 */

class Match {
    public $domicile;
    public $scoreDomicile;
    public $exterieur;
    public $scoreExterieur;

    public function __construct(string $ligneJournee) {
        $premiereDelimitation = explode("/", $ligneJournee);
        $deuxiemeDelimitation = explode(':', $premiereDelimitation[0]);
        $troisiemeDelimitation = explode(':', $premiereDelimitation[1]);
        
        $this->domicile = trim($deuxiemeDelimitation[0]);
        $this->scoreDomicile = (int) trim($deuxiemeDelimitation[1]);
        $this->exterieur = trim($troisiemeDelimitation[0]);
        $this->scoreExterieur = (int) trim($troisiemeDelimitation[1]);
    }

    public function __toString() {
        return strtoupper($this->domicile . ":" . $this->scoreDomicile . " / " . $this->exterieur . ":" . $this->scoreExterieur . "\n");
    }
}

?>