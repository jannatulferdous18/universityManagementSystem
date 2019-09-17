<?php

	session_start();
	if(empty($_SESSION["user"]))
     {
          header('location:index.php');
     }
     if($_SESSION["login"]!=1)
     {
       header('location:index.php');	
     }


?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="icon" type="image/png" href="img/favicon.jpg"/>
	<link href="style1.css" rel="stylesheet" type="text/css" />
</head>
<body>

	<?php include 'head1.php'; ?>
	<?php include 'menu1.php'; ?>

	<?php include 'profile.php'; ?>
</body>
</html>