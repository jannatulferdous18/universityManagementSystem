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
    <div class="pre_add">
  
<?php



   
  $user= $_SESSION["user"];
  $con=new mysqli("localhost","root","","student_management_system");
    $sql="SELECT cur_semester FROM sem_name ORDER BY sem_id DESC LIMIT 1 ";


    $res=$con->query($sql);
    foreach($res as $sem){

    $semname=$sem["cur_semester"];
    }

  $sql="SELECT * FROM takensubject where student_id='$user' and semester_name='$semname' ";  
  $res=$con->query($sql);
     $i=1;
     $j=0;
     echo "<table border='1'>";

     echo "<tr>";
     echo "<th>"."No."."</th>";
     echo "<th>"."Course Title"."</th>";
     echo "<th>"."Course Code"."</th>";
     echo "<th>"."Credit"."</th>";
     echo "<th>"."DROP"."</th>";
     
     echo "</tr>";
      
      echo "<form action='#' method='POST'>";
      foreach($res as $row){
      
      $array_ctitle[$j]=$row["course_title"];
      $array_ccode[$j]=$row["course_code"];
      $array_credit[$j]=$row["credit"];
      echo "<tr>";
     echo "<td>".$i."</td>";
     echo "<td>".$row["course_title"]."</td>";
     echo "<td>".$row["course_code"]."</td>";
     echo "<td>".$row["credit"]."</td>";
     echo "<td>"."<table border='0'>"."<tr>"."<td>"."<input type='checkbox' name='subject[]' value='$i'>"."</td>"."</tr>"."</table>";
      echo "</tr>";
     $j++;
     $i++;
     }


     echo "</table>";
     
     echo "<br>"."<input type='submit' value='ADD'>"."</form>";


    

     if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["subject"])){
           $i=0;
            foreach($_POST["subject"] as $subject)
            {

              $counter[$i]=$subject;
              $i++;
            }
            
            $k=$i;
           
  

            for($i=0;$i<$k;$i++){
            $index=$counter[$i]-1;


        




            $sql="DELETE from takensubject where student_id='$user' and semester_name='$semname' 
                  and  course_code='$array_ccode[$index]'";
            $res=$con->query($sql);

            if(!$res){

              echo "<script type='text/javascript'>";
              echo "alert('Error Occured')";
              echo "</script>";
              break;
             }
      
    }
    header('location:student.php');
 }





?>
</div>

</body>
</html>