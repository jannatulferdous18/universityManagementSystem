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

	<?php

	$user= $_SESSION["user"];
     $con=new mysqli("localhost","root","","student_management_system");
     $sql="SELECT * from account where student_id='$user' ORDER BY account_id DESC LIMIT 1";
     $results=$con->query($sql);
    echo "<div class='stu_acc'>";
     
     foreach($results as $row)
     {
     	echo "Student Id     :  ".$row["student_id"]."<br>";
     	echo "Semester Fee     :  ".$row["semester_fee"]."<br>";
     	echo "Late Fine         :  ".$row["late_fee"]."<br>";
		echo "Library Fine       :  ".$row["library_fine"]."<br>";
     	echo "Semester          :  ".$row["semester_name"]."<br>";
     	

     }
     echo "</div>";
?>


</body>
</html>