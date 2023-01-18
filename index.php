<?php

require_once 'classes/Route/Route.php';
session_start();
print_r($_GET);
$route = new Route();
$route->run();
