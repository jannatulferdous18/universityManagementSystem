
<!DOCTYPE html>
<html>
<head>
    <title></title>



</head>
<body>
 

    <?php include 'head1.php'; ?>
    <?php include 'menu2.php'; ?>
    <div class="add_stu">

      <?php

    $con=new mysqli("localhost","root","","student_management_system");
    $sql="SELECT * from students";
    $res=$con->query($sql);

     echo "<table border='1'>";

     echo "<tr>";
     echo "<th>"."Name"."</th>";
     echo "<th>"."ID"."</th>";
     echo "<th>"."Semester"."</th>";
     echo "<th>"."CGPA"."</th>";
     echo "</tr>";
    foreach($res as $row)
    {
      $name=$row["fname"].' '.$row["lname"];

      echo "<tr>";
     
     
     echo "<td>".$name."</td>";
     echo "<td>".$row["id"]."</td>";
     echo "<td>".$row["semester"]."</td>";
     echo "<td>".$row["cgpa"]."</td>";
     
      echo "</tr>";
     
     
    }

     echo "</table>";

?>

    </div>

</body>
</html> 

