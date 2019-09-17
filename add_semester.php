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
	<link href="style2.css" rel="stylesheet" type="text/css" />
</head>
<body>

	<?php include 'head1.php'; ?>
	<?php include 'menu2.php'; ?>
	
<?php

	if($_SERVER["REQUEST_METHOD"]=="POST")
	{

		$sname=$_POST["sname"];

     $con=new mysqli("localhost","root","","student_management_system");
     $sql="INSERT into sem_name(`cur_semester`)VALUES('$sname')";
     $result=$con->query($sql);
     if(!$result){

     	      echo "<script type='text/javascript'>";
              echo "alert('Error Occured!')";
              echo "</script>";

     }
     else
     {

     	header('location:sful.php');
     }

	}





?>



<div class="add_sem">

		<form method="POST">
		
		Semester&nbsp;:&nbsp;<input type="TEXT" name="sname">
		<br><br>
		<input type="SUBMIT" value="ADD">


		</form>
</div>
</body>
</html>