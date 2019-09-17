<!DOCTYPE html>
<html>
<head>
	<title></title>
    <link rel="icon" type="image/png" href="img/favicon.jpg"/>
    <link href="style2.css" rel="stylesheet" type="text/css" />
</head>
<body>
    
    <div id="profile">
<?php

	$user= $_SESSION["user"];
     $con=new mysqli("localhost","root","","student_management_system");
     $sql="SELECT * from students where id='$user'";
     $results=$con->query($sql);
     echo "<div class='prof'>";
     foreach($results as $row)
     {
     	$name=$row["fname"].' '.$row["lname"];
     	echo "Name         :  ".$name."<br>";
     	echo "ID           :  ".$row["id"]."<br>";
     	echo "Semester     :  ".$row["semester"]."<br>";
     	echo "CGPA         :  ".$row["cgpa"]."<br>";
		echo "Email        :  ".$row["email"]."<br>";
     	echo "Dob          :  ".$row["dob"]."<br>";
     	echo "Age          :  ".$row["age"]."<br>";
     	echo "Nationality  :  ".$row["nationality"]."<br>";
     	echo "Religion     :  ".$row["religion"]."<br>";
  

     }
     echo "</div>";

?>


</div>


</body>
</html>