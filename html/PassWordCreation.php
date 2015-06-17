<?php
	
function createPassword($amount) {//Deze parameter geeft aan uit hoeveel karakters het paswoord zal bestaan. 
    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789#&@=/*-+<>$^";
    $pass = array(); //Het paswoord wordt hier eerst al array gedeclareerd.
    $alphaLength = strlen($alphabet) - 1; //lengte van de string -1 voor index-waarden (1e letter = index 0)
    for ($i = 0; $i < $amount; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //Hier wordt de array van caracters omgezet naar 1 string
}

?>
