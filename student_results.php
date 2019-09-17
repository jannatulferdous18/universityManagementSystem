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
    <?php include 'menu1.php'; ?>
 
<?php
	

    error_reporting(0);
     $user= $_SESSION["user"];
     $con=new mysqli("localhost","root","","student_management_system");
  	 
    $sql="SELECT cur_semester FROM sem_name ORDER BY sem_id DESC LIMIT 1 ";


    $res=$con->query($sql);
    foreach($res as $sem){

    $semname=$sem["cur_semester"];
    }

  	 $result =$con->query($sql);
     $x=$result->num_rows;


      	 $sql="SELECT * from results where student_id='$user'";

      	 $resu2=$con->query($sql);
      	 	$j=0;
      	 	$count=0;
      	 	$total_rows=0;
      	 foreach($resu2 as $asd){

      $ccode[$j]=$asd["course_code"];
      $ctitle[$j]=$asd["course_title"];
      $ccredit[$j]=$asd["credit"];
      $cgrade[$j]=$asd["grade"];
      $gpa[$j]=$asd["gpa"];
      $s[$j]=$asd["semester_name"];

      $j++;
      $total_rows++;
     }

     $len=$j;
     $sum=0;
     $completed=0;
     for($i=0;$i<$len;$i++)
     {

     	$sum=$sum+$ccredit[$i];
     	if($cgrade[$i]!='F'){

     		$completed=$completed+$ccredit[$i];
     	}

     }
          $sum1=0;
     for($i=0;$i<$len;$i++)
     {

     	$sum1=$sum1+($gpa[$i]*$ccredit[$i]);

     }

     $cgpa=number_format($sum1/$sum,2);


     $sql="SELECT * from students where id='$user'";
     $rs=$con->query($sql);
     foreach($rs as $xy)
     {

     		$fname=$xy["fname"];
     		$lname=$xy["lname"];
     }

     echo "<div class='s_res'>";
     echo "Student ID      : " .$user."<br>";
     echo "Student Name    : ".$fname.' '.$lname."<br>";
     echo "Attempted Completed: ".$sum."<br>";
     echo "Credit Completed: ".$completed."<br>";
     echo "CGPA            : ".$cgpa."<br>"; 

     		$sql="UPDATE students set cgpa='$cgpa' where id='$user'";
     		$result=$con->query($sql);

      	 $sql="SELECT * from results where student_id='$user'and semester_name='$semname'";

      	 $results=$con->query($sql);
      	 $i=0;
      	 $ct=0;
      	 foreach ($results as $result) {
      	 	
      	 	$cur_c[$i]=$result["course_code"];
			$cur_t[$i]=$result["course_title"];
			$cur_cr[$i]=$result["credit"];
			$cur_gr[$i]=$result["grade"];
			$cur_gp[$i]=$result["gpa"];
			$i++; 
			$ct++;
      	 }

      	 $cur_len=$i;
      	 $sum2=0;
      	 $sumcredit=0;
      	 $flag=0;
      	if($ct>0){
      	 for($i=0;$i<$cur_len;$i++)
      	 {
      	 	if($cur_gp[$i]==NULL){
      	 		$flag=1;
      	 		break;
      	 	}else{
      	 	$sum2=$sum2+($cur_cr[$i]*$cur_gp[$i]);
      	 	$sumcredit=$sumcredit+$cur_cr[$i];
      	 	}
      	 }
      	 if($flag==0){
      	 $gradpa=number_format(($sum2/$sumcredit),2);
      	 
      	 echo "GPA".$gradpa."<br>"."<br>"."<br>";
      	}
      }
      	 echo "<table border='1'>";
      	
      	 echo "<tr>";

      	 echo "<th>"."Trimester"."</th>";
      	 echo "<th>"."Credit"."</th>";
      	 echo "<th>"."Term Gpa"."</th>";
      	 echo "<th>"."CGPA"."</th>"."<br>"."<br>";
      	 echo "</tr>";
      	 $results=$con->query("SELECT * from sem_name");
      	 $row=$results->num_rows;
    if($ct==0)
		{
			$row=$row-1;
		}
		
		$j=0;
		$q=0;

      	for($i=0;$i<$row;$i++)
		{

				$sumg=0;
				$sumg=(int)$sumg;
				$sumc=0;
				$sumcgc=0;
				$sumcgpa=0;
			$semester_name=$s[$q];
			echo "<tr>";
			echo "<td>".$semester_name."</td>";
			for($j=0;$j<$len;$j++)
			{
				if($semester_name==$s[$j])
				{
					$sumc=$sumc+$ccredit[$j];
				}
			}
			echo "<td>".$sumc."</td>";
			for($j=0;$j<$len;$j++)
			{
				
				$valuec=$ccredit[$j];
				$valueg=$gpa[$j];
				$value=$valuec*$valueg;
				if($semester_name==$s[$j])
				{
					$sumg=$sumg+$value;
					$x=$j;
				}
			}
			$gradepointaverage=number_format(($sumg/$sumc),2);
			echo "<td>".$gradepointaverage."</td>";
			

			for($j=0;$j<=$x;$j++)
			{

				$sumcgpa=$sumcgpa+($ccredit[$j]*$gpa[$j]);
				$sumcgc=$sumcgc+$ccredit[$j];
			}
			$currentgradepointaverage=number_format(($sumcgpa/$sumcgc),2);

			echo "<td>".$currentgradepointaverage."</td>";

			echo "</tr>";

			$q=(int)$x+1;

		}
		echo "</table>";
		echo "<br>"."<br>";
     echo "All registered subject results"."<br>";
    
		$sql="SELECT * from results where student_id='$user'";
		$res=$con->query($sql);
		$i=1;
		echo "<table border='1'>";

		echo "<tr>";

		echo "<th>"."No"."</th>";
		echo "<th>"."Course Code"."</th>";
		echo "<th>"."Course Title"."</th>";
		echo "<th>"."Credit"."</th>";
		echo "<th>"."GPA"."</th>";
		echo "<th>"."Grade"."</th>";
		



		echo "</tr>";

		foreach($res as $row){

			echo "<tr>";


			echo "<td>".$i."</td>";
			echo "<td>".$row["course_code"]."</td>";
			echo "<td>".$row["course_title"]."</td>";
			echo "<td>".$row["credit"]."</td>";
			echo "<td>".$row["gpa"]."</td>";
			echo "<td>".$row["grade"]."</td>";



			echo "</tr>";
			$i++;




		}
		echo "</table>";








		echo "</table>";

    echo "</div>";

?>


</body>
</html>