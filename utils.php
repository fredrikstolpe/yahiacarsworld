<?php

class Utils{

	function emailIsValid($email){
		if ($email){
			$emailIsValid = filter_var($email, FILTER_VALIDATE_EMAIL);	
			return $emailIsValid;
		}
		return false;
	}
	
}


 ?>