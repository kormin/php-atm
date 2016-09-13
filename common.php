<?php

function ifsesh() { // if session is present, redirects to home
	if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}
}
