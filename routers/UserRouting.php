<?php

require 'bll/UserManagerLogic.php';
Flight::register('userLogic', 'UserManagerLogic');

require 'dal/UserCommand.php';
Flight::register('userCommand', 'UserCommand');

Flight::route('GET /users', function(){
	Flight::api()->render(Flight::userLogic()->getAllUsersResponse(Flight::db(), Flight::userCommand()));
});

Flight::route('GET /user/@id:[0-9]+', function($id){
	Flight::api()->render(Flight::userLogic()->getUserResponse($id, Flight::db(), Flight::userCommand()));
});

?>