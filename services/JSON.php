<?php
class JSON{
	public static function encode($data){
		if(is_array($data)){
			return json_encode($data);
		}
	}
}
?>