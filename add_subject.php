<?php
  session_start();
  if(empty($_SESSION["user"]))
     {
          header('location:index.php');
     }


if($_SERVER["REQUEST_METHOD"]=="POST"){
     $course_title=$_POST["course_title"];
     $course_code=$_POST["course_code"];
     $credit_no=$_POST["credit_no"];
     $con=new mysqli("localhost","root","","student_management_system");
     $sql 			= 'INSERT INTO subjects (`course_title`, `course_code`, `credit_no`) VALUES (\''.$course_title.'\',\''.$course_code.'\',\''.$credit_no.'\')';
	$result=$con->query($sql);
	$con->close();
     
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
	<div class="add_stu">
	<form action=""	 method="post" enctype="multipart/form-data">

	Course Tilte&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;<input type="text" name="course_title" id="course_title">
	<br><br>
	Course Code&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;<input type="text" name="course_code" id="course_code">
	<br><br>
	Credit&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;<input type="text" name="credit_no" id="credit_no">
	<br><br>	
	<button onclick="myFunction()">Add</button>
	</form>
	</div>
	<script>
		function myFunction() {
   	 alert("subject has been added");
	}
</script>
</body>
</html>	