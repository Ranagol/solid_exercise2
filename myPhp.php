<?php
//https://medium.com/successivetech/s-o-l-i-d-the-first-5-principles-of-object-oriented-design-with-php-b6d2742c90d7
spl_autoload_register('myAutoloader');
function myAutoloader($className){
    include 'classes/' . $className . '.php';
}

//The first example was stupid, so I did my quick, short example. My class is doing only one thing.
$logger = new Logger();
$logger->createLog('First log.');
$logger->createLog('Second log.');

//Open/closed principle
//(let slave classes work for master classes) :)





require 'myHtml.php';