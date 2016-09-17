<?php

define('TITLE', 'Add Account');

require_once('dbUtil.php');
require_once('common.php');
ifsesh();

$error = '';

if (isset($_POST['newacc'])) {
	if ($_POST['pinnum']==$_POST['conpin']) {
		$id = userCheck($_POST['accnum']);
		if ($id<0) {
			addAcct();
			header('Location: index.php');
		}else{
			$error = "Error. User already exists. Please try again.";
		}
	}else{
		$error='PIN Number and Confirm PIN Number entries not the same.';
	}
}

function userCheck($uname) {
	$ucol = array('id', 'acctnum');
	$opt = "WHERE `acctnum`='".$uname."'";
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

function addAcct() {
	$regsuser = array($_POST['accnum'], $_POST['accname'], $_POST['pinnum'], 500);
	$regsusercol = array('acctnum', 'acctname', 'pin', 'cash');
	$len = count($regsusercol);
	$db = dbConf('account');
	// $user = '';
	// $user = buildStr($regsuser);
	// print_r($user);
	$db->setCol($regsusercol, $len); // prepares columns and columns placeholder
	$db->setColLen($len); // sets col len
	$db->insert($regsuser, $regsusercol, $len);
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
			<a href="register.php">Refresh</a>
			<br>
			<br>
			<a href="index.php">Homepage</a>
		<?php else: ?>
			<form action="register.php" method="POST">
				<div id="f0">
					<label for="accnum">Account Number: </label>
					<input type="number" min="0" id="accnum" name="accnum" required >
				</div>
				<div id="f1">
					<label for="accname">Account Name: </label>
					<input type="text" min="0" id="accname" name="accname" required >
				</div>
				<div id="f2">
					<label for="pinnum">PIN Number: </label>
					<input type="password" min="0" id="pinnum" name="pinnum" required >
				</div>
				<div id="f3">
					<label for="conpin">Confirm PIN: </label>
					<input type="password" min="0" id="conpin" name="conpin" required >
				</div>
				<input type="submit" name="newacc" value="Add Account" >
			</form>
		<?php endif; ?>
	</section>
</body>
</html>