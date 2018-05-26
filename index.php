<?php
 //print_r($_GET);
//echo realpath(__dir__."/../..");
//echo '<br>';


//echo "indexget :" .var_dump($_GET);
//echo '<br>';
define("ROOT", realpath(__dir__)); 
//echo realpath(__dir__) ."\monapplication\moteur\Kernel.php";

require_once(ROOT . "\monapplication\moteur\Kernel.php");

//Kernel::affiche(ROOT);
Kernel::run();





