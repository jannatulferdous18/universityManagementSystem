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

        error_reporting(0);
   
  $user= $_SESSION["user"];
  $con=new mysqli("localhost","root","","student_management_system");
    $sql="SELECT * from subjects";
    $res=$con->query($sql);
    

    $i=0;
    
    $man=0;
     $j=0;
     $sql="SELECT * from takensubject where student_id='$user'";
     $r=$con->query($sql);
     foreach($r as $a)
     {
        $tcourse_code[$i]=$a["course_code"];
        $i++;
     }
     $takenlength=$i;

    $take=0;     
     $sql="SELECT * from results where student_id='$user'";
     $resu2=$con->query($sql);
     $j=0;
     $count=0;
     foreach($resu2 as $asd){

      $ccode[$j]=$asd["course_code"];
      $j++;
     }

     $count=$j;
     $rlen=$j;

     $i=1;
     $j=0;
     echo "<table>";

     echo "<tr>";
     echo "<th>"."No."."</th>";
     echo "<th>"."Course Title"."</th>";
     echo "<th>"."Course Code"."</th>";
     echo "<th>"."Credit"."</th>";
     echo "</tr>";

    foreach($res as $row)
    {
      $flag=0;
      for($l=0;$l<$takenlength;$l++)
      {  
            if($tcourse_code[$l]==$row["course_code"])
            {

                $flag=1;
                break;
            }


      }
      echo "<form action='#' method='POST'>";

     if($flag!=1){
      $p=0;
      if($count>0){
      for($k=0;$k<$rlen;$k++)
      {

        if($row["pre_requisite"]==NULL || $row["pre_requisite"]==$ccode[$k]){
          $p=1;
        }
      }
      if($p==1){
      $take=1;
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
 }
  if($row["pre_requisite"]==NULL && $take!=1){

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
   }
    }

     echo "</table>";
     echo "<div class='subb_add'>";
     echo "<br>"."Semester Name &nbsp;: &nbsp;"."<input type='text' name='sname'>"."<br>"."<input type='submit' value='ADD'>"."</form>";

     echo "</div>";
     if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["subject"])){
           $i=0;
            foreach($_POST["subject"] as $subject)
            {

              $counter[$i]=$subject;
              $i++;
            }
              $snam=$_POST["sname"];
            
            $k=$i;
            $alen=$k;
           




                $sql="SELECT * from takensubject where student_id='$user' and
            semester_name='$snam'";
                $rul=$con->query($sql);
                $s=0;

             

            for($i=0;$i<$k;$i++){
            $index=$counter[$i]-1;
              $sum=0;
             


                foreach ($rul as $value) {
                      
                  $s=(int)$value["credit"]+$s;
                 // eco $value["credit"]."<br>";
              
                }
                

                $cred=15-$s;



              for($r=0;$r<$alen;$r++)
              {
                $x=$counter[$r]-1;

                  $sum=(int)$array_credit[$x]+$sum;
              }
               $cred=(int)$cred;
              $sum=(int)$sum;
        



              if($sum<$cred){

            




            $sql="INSERT into takensubject(`student_id`,`course_code`,`course_title`,`credit`,`semester_name`) 
            VALUES('$user','$array_ccode[$index]','$array_ctitle[$index]',
                  '$array_credit[$index]','$snam')";
            $res=$con->query($sql);
          }
          else
          {

              echo "<script type='text/javascript'>";
              echo "alert('You are allowed to take highest 15 credits')";
              echo "</script>";
              $man=1;
              break; 

          }
      
        }
        if($man!=1){
        $URL="http://localhost/project/student.php";
      echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
      
}
      }



?>
</div>

</body>
</html>