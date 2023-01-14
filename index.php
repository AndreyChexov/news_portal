<?php

require_once 'classes/Route/Route.php';
session_start();

$route = new Route();
$route->run();
