<?php
	  session_start();
  if(empty($_SESSION["user"]))
     {
          header('location:index.php');
     }


?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="icon" type="image/png" href="img/favicon.jpg"/>
	<link href="style2.css" rel="stylesheet" type="text/css" />
</head>
<body>

	<?php include 'head1.php'; ?>
	<?php include 'menu2.php'; ?>
</body>
</html>