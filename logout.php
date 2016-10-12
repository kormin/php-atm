<?php
/**
* Author github: https://github.com/kormin
* Project: ATM
* Date Created: August 2016
* File: logout
* Description: Logout
* Additional Comments: 
*/


if (session_status() == PHP_SESSION_NONE) {
	session_start();
}

session_destroy();
header('Location: index.php');