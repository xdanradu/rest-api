<?php
require 'flight/Flight.php';
require 'routers/UserRouting.php';
require 'services/JSON.php';
require 'services/Renderer.php';

$HOST="localhost";
$DBNAME="classbook";
$USER="root";
$PASSWORD="";

Flight::register('db', 'PDO', array('mysql:host='.$HOST.';dbname='.$DBNAME, $USER,$PASSWORD), function($db){
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
});

Flight::register('api', 'Renderer');

Flight::route('/', function(){
	echo "REST API v1";
});

Flight::start();
?>
