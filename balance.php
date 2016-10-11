<?php
/**
* Author github: https://github.com/kormin
* Project: ATM
* Date Created: August 2016
* File: Balance
* Description: Balance Inquiry
* Additional Comments: 
*/

define('TITLE', 'Balance Inquiry');
require_once('dbUtil.php');
$error = '';
$cash = '';

if (session_status() == PHP_SESSION_NONE) {
	session_start();
}

if (!empty($_SESSION)) {
	$arr = getCash($_SESSION['id']);
	// print_r($arr);
	$cash = $arr[0]['cash'];
}else{
	$error = 'Please login so you can view your profile. You can also create an account by registering.';
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title><?=TITLE;?></title>

	<link rel="author" href="https://github.com/kormin">

	<link rel="stylesheet" type="text/css" href="styles.css">
	<!-- <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"> -->

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<header id="head">
		<h1><?=TITLE;?></h1>
	</header>
	<section id="cont" style="text-align: center;">
		<?php if($error!=''): ?>
			<p><?=$error;?></p>
			<a href="login.php">Login Here</a>
		<?php else: ?>
			<h3 style="">Welcome <?=$_SESSION['accname'];?>!</h3>
			<p>Your balance is: <?=$cash;?></p>
			<a href="home.php">&lt;&lt;BACK</a>
		<?php endif; ?>
	</section>
</body>
</html>