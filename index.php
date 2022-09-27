<?php

require_once('./vendor/autoload.php');

use App\Controller\HomeController;

$home = new HomeController();

dd($home->teste());