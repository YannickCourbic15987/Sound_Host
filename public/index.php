<?php

use App\Src\Core\Main;

define("ROOT", str_replace("\\", '/', dirname(__DIR__)));

require_once ROOT . "/vendor/autoload.php";

$main = new Main();
$main->start();
