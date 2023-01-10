<?php

require_once 'classes/Route/Route.php';
session_start();

$route = new Route();
$route->run();
print_r(get_declared_classes());