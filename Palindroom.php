<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// Hier komen alle functies die te maken hebben met palindroom
// palindroom = woord omdraaien
//$obj = new Palindroom();
//$obj->revertWord("Klas1G");
//echo $obj->getRevertWord();

include_once 'DbHandler.php';
class Palindroom{
    private $tekst;
    private $revertTekst;
            
    function revertWord($tekst){
        $this->tekst = $tekst;
       $revertTekst="";
       // we gebruiken een for omdat we de rangeomvang kennen. 
       for ($index = strlen($tekst) -1 ; $index > -1; $index--){
           $revertTekst = $revertTekst . $tekst[$index];
       }
       $this->revertTekst= $revertTekst;
    }
    function getRevertWord(){
        return $this->revertTekst;
    }
    
    function heeftPalindroomBetekenis(){
        $dbHandler = new Dbhandler();
        $dbhandler->findWoord($this->revertTekst);
        return $dbHandler->isWoordGevonden();
    }
}