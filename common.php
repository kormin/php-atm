<?php
/**
* Author github: https://github.com/kormin
* Project: ATM
* Date Created: September 2016
* File: common
* Description: Common functions used by many files
* Additional Comments: 
*/

function ifsesh() { // if session is present, redirects to home
	if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}

	if (!empty($_SESSION)) {
		header('Location: home.php');
	}
}
