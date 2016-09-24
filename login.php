<?php

define('TITLE', 'Log In');


require_once('dbUtil.php');
require_once('common.php');
ifsesh();

$error = '';

if (isset($_POST['log'])) {
	$uname = $_POST['accnum'];
	$passw = $_POST['pinnum'];
	$id = acctCheck($uname, $passw);
	if($id>0){
		session_start();
		$_SESSION['id'] = $id;
		header('Location: home.php');
	}else{
		$error = 'Invalid Login information. Please try again or create an account.';
	}
}

function acctCheck($uname, $passw) {
	$i=0;
	$ucol = array('id', 'acctnum', 'pin');
	$opt = "WHERE `acctnum`='".$uname."' AND `pin`='".$passw."'";
	$len = count($ucol);
	$db = dbConf('account');
	$db->setCol($ucol, $len);
	$db->setColLen($len);
	$sth = $db->select($opt);
	$arr = $sth->fetchAll(PDO::FETCH_ASSOC);
	foreach ($arr as $i => $v) {
		if($i=='id') return $v['id'];
	}
	return -1;
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
			<a href="login.php">Refresh</a>
			<br>
			<br>
			<a href="register.php">Create Account</a>
		<?php else: ?>
			<form action="login.php" method="POST">
				<div id="f0">
					<label for="accnum">Account Number: </label>
					<input type="number" min="0" id="accnum" name="accnum" required >
				</div>
				<div id="f1">
					<label for="pinnum">PIN Number: </label>
					<input type="password" min="0" id="pinnum" name="pinnum" required >
				</div>
				<input type="submit" name="log" value="Log In" >
			</form>
		<?php endif; ?>
	</section>
</body>
</html>