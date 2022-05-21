<?php

use Core\Test;

phpinfo();

require_once "../vendor/autoload.php";

$teste = new Test();
var_dump($teste->foo());