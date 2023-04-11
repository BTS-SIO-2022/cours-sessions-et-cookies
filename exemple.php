<?php

setcookie('prenom', 'Mathilde');

$donnees_a_enregister = ['couleur' => 'bleu', 'preference' => 'chocolat', 'compagnie'=>'chien'];
foreach($donnees_a_enregister as $key=>$value){
    setcookie("identification[$key]", $value);
}

var_dump($_COOKIE);

setcookie('prenom');