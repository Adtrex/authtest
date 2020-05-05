<?php

function is_user_LoggedIn(){
	if (!$_SESSION["LoggedIn"] && !empty($_SESSION['LoggedIn'])){
		return true;
	}

	return false
}