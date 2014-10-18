<?php

class UserCommand{
	function getUsers($db){	
		$response="[";
		try {
			$stmt = $db->prepare("SELECT * from users");
			if ($stmt->execute()) {
				$i=0;
				while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
					if ($i==0) { $response = $response . JSON::encode($row); }
					else {$response = $response.', '.JSON::encode($row);}
					$i++;
				}
			}
			$db = null;
		} catch (PDOException $e) {
			$response = $e->getMessage();//print "Error!: " . $e->getMessage() . "<br/>";
			die();
		}
		return $response.']';
	}

	function getUserById($id, $db){
		$response="{}";
		try {
			$stmt = $db->prepare("SELECT * from users WHERE id=".$id);
			if ($stmt->execute()) {
				while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
					$response = JSON::encode($row);
				}
			}
			$db = null;
		} catch (PDOException $e) {
			$response = $e->getMessage();//print "Error!: " . $e->getMessage() . "<br/>";
			die();
		}
		return $response;
	}
}

?>