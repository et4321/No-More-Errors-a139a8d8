<?php

$geld = ($argv[1]);
define ("GELD" , array (50, 20, 10, 5, 2, 1, 0.50, 0.20, 0.10, 0.05, 0.02, 0.01));

function wisselgeld($geld) {
    if (is_numeric($geld)){

        $geld = round (($geld*100)/5)*5/100;
     
        foreach (GELD as $bedrag) {
            $floored = 0;
            if ($geld >= $bedrag
            ) {
                $geld = round ($geld, 2);
                $floored = floor ($geld / $bedrag);
                $geld = round ($geld - ($floored *  $bedrag), 2);
            }
        
            if ($floored > 0){
                if ($bedrag < 1){
                   $cent  = $bedrag * 100;
                    echo "$floored * $cent cent".PHP_EOL;
                }
                else{
                    echo"$floored * $bedrag euro".PHP_EOL;
                }
            }
        } 
    } 
    else {
        throw new Exception ('Je hebt geen bedrag meegegeven dat omgewisseld dient te worden');
    } 
}

try {
    wisselgeld($geld);

}
catch (Exception $cash){
    echo'error:' .$cash->getMessage();
}
