<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once 'Palindroom.php';
if (!empty($_POST)){
    
    if (checkPostArray()){
       // weet zeker dat de $_POST alle indexen bevat. Ik hoef nooit meer een isset te doen.
        if(! strlen ($_POST['naam']) == 0)(
            //
            $palindroom = new Palindroom();
            $palindroom->revertWord($_POST['naam']);
            $revertWord = $palindroom->getRevertWord();
            if ($palindroom->heeftPalindroomBetekenis()){
                $viewData = array(
                  'palindroom' => "Het omgekeerde woord is: ".$revertWord,
                  'message' => "Het omgedraaide woord heeft een betekenis",
                  'action' => "Vul een nieuw woord in of sluit de browser"
                );
            }
            else{
                $viewData = array(
                  'palindroom' => "Het omgekeerde woord is: ".$revertWord,
                  'message' => "Het omgedraaide woord heeft GEEN betekenis",
                  'action' => "Vul een nieuw woord in of sluit de browser"
                );
            }
            include_once 'view.php';
        )else{
                $viewData = array(
                  'palindroom' => "Het omgekeerde woord is: ".$revertWord,
                  'message' => "Het omgedraaide woord heeft een betekenis",
                  'action' => "Vul een nieuw woord in of sluit de browser"
                );
                include_once 'view.php';
        } 
    }   else {
        http_response_code(409);
    }
}
else {
    http_response_code(406);
}
function checkPostArray(){
//    bad code example!!
//    if (isset($_POST["naam"]) && isset ($_POST["submit"])){
//            return TRUE;
//    }
    $validArguments = array ("naam", "submit");
    for ($index = 0 ; $index < 2 ; $index++){
        $argument = $validArguments[$index];
        if (! isset($_POST[$validArguments[$index]])){
            return FALSE;
        }
    }
    return TRUE;
}