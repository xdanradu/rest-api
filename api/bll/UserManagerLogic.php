<?php

class UserManagerLogic{

	function getAllUsersResponse($db, $cmd) {
		$jsonData='{"status":"OK", response":[';
		$users = $cmd->getUsers($db);
		$jsonData.=$users;
		return $jsonData.']}';
	}

	function getUserResponse($id, $db, $cmd){
		$jsonData='{"status":"OK", user":';
		$user = $cmd->getUserById($id, $db);
		$jsonData.=$user;
		return $jsonData.'}';
	}

}

?>