<?php

  session_start();

?>
<!DOCTYPE html>
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
	<title></title>

	<link rel="icon" type="image/png" href="img/favicon.jpg"/>
	<link href="style2.css" rel="stylesheet" type="text/css" />





</head>
<body>
 <?php
  
    $id = $_SESSION['id'];
    $sem=$_SESSION['sem'];

  $con=new mysqli("localhost","root","","student_management_system");
  
  $asd = "SELECT * from results where student_id ='$id' and semester_name='$sem'";
  $check=$con->query($asd);
	$i=0;
	foreach ($check as $r) {

	  	$course[$i]=$r["course_code"];
	  	$array[$i]=$r["grade"];
	  	$i++;
	  }  

	  $clen=$i;
  $sql="SELECT * from takensubject where student_id='$id' and semester_name='$sem'";
  $results=$con->query($sql);

  $i=0;
  $flag=0;
  $c=0;
  foreach($results as $result)
  {
  	$flag=0;
  
  	for($j=0;$j<$clen;$j++)
  	{
  		if($result["course_code"]==$course[$j])
  		{
  			$flag=1;
  		}
  	}
  	if($flag!=1){
  	
  	echo "asdasd";
  	$c=1;
  	$course_code[$i]=$result["course_code"];
  	$course_title[$i]=$result["course_title"];
  	$credit[$i]=$result["credit"];
  	$i++;
  }
  }
    $len=$i;
	if($_SERVER["REQUEST_METHOD"]=="POST"){

		$k=0;

		foreach ($_POST["grade"] as $result) {
			
			$add[$k]=$result;
			$k++;

		}
		$length=$k;

		for($i=0;$i<$length;$i++){

			if($add[$i]=='A'){

				$gpa=4.00;
			}
    		else if($add[$i]=='A-'){

    			$gpa=3.67;
    		}
    		else if($add[$i]=='B+'){

    			$gpa=3.33;
    		}
    		else if($add[$i]=='B'){

    			$gpa=3.00;
    		}
    		else if($add[$i]=='B-'){

    			$gpa=2.67;
    		}
    		else if($add[$i]=='C+'){

    			$gpa=2.33;
    		}
			else if($add[$i]=='C'){

    			$gpa=2.00;
    		}
    		else if($add[$i]=='C-'){

    			$gpa=1.67;
    		}
    		else if($add[$i]=='D+'){

    			$gpa=1.33;
    		}
    		else if($add[$i]=='D'){

    			$gpa=1;
    		}
    		else if($add[$i]=='F'){

    			$gpa=0;
    		}
    		
    		
if($add[$i]!=NULL){
    	  $sql2="INSERT INTO results (`student_id`, `course_title`, `course_code`, `credit`, `grade`, `gpa`, `semester_name`) VALUES ('$id', '$course_title[$i]', '$course_code[$i]', '$credit[$i]', '$add[$i]', '$gpa', '$sem');";

      $res=$con->query($sql2);
    }
      if(!$res)
      {

        echo "<script type='text/javascript'>";
        echo "alert('Error in query')";
        echo "</script>";
      }
      else
      {
       echo '<script>window.location="http://localhost/project/sful.php"</script>';
       }
   }
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

 

	 include 'head1.php';
	 include 'menu2.php';
	echo "<div class='add_stu'>";

	echo "<form method='post'  >";
	echo "<table border='1'>";
  	
  	echo "<tr>";

  	echo "<th>"."Course Title"."</th>";
  	echo "<th>"."Grade"."</th>";
  	echo "</tr>";
    for($i=0;$i<$len;$i++) {
    	echo "<tr>";


    	echo "<td>".$course_title[$i]."</td>";

    	echo "<td>"."<input type='TEXT' name='grade[]'>"."</td>";





    	echo "</tr>";

    }
    echo "</table>";
    echo "<br>"."<input type='submit' value='update'>";
	echo "</div>";
?>
</body>
</html>	

