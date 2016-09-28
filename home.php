<?php

define('TITLE', 'ATM Home');
require_once('dbUtil.php');
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

	<!-- <link rel="stylesheet" type="text/css" href="styles.css"> -->
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
		<h3 style="">Welcome <?=$name;?>!</h3>
	</header>
	<section id="cont">
		<?php if($error!=''): ?>
			<p><?=$error;?></p>
			<a href="login.php">Login Here</a>
		<?php else: ?>
			<nav id="options">
				<ul>
					<li>
						<a href="balance.php"  >Balance Inquiry</a>
					</li>
					<li>
						<a href="deposit.php"  >Deposit</a>
					</li>
					<li>
						<a href="withdraw.php"  >Withdraw</a>
					</li>
					<li>
						<a href="logout.php"  >Exit</a>
					</li>
				</ul>
			</nav>
		<?php endif; ?>
	</section>
</body>
</html>