<?php
define("ROOT", realpath(__dir__));
require_once(ROOT . "\monapplication\moteur\Kernel.php");
//print_r(ROOT. "\monapplication\moteur\Kernel.php"."<br/>");
Kernel::run();