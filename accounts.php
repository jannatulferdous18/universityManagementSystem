<!DOCTYPE html>
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
    <title></title>

    <link rel="icon" type="image/png" href="img/favicon.jpg"/>
    <link href="style2.css" rel="stylesheet" type="text/css" />

       <script type="text/javascript">
         function validate_acc()
         {
         if(document.myForm.identity.value=="")
              {
                   alert("Please Enter the ID");
                   document.myForm.identity.focus();
                   return false;
              }
              else
              {
 
                var sid=document.getElementById("identity").value;
                    var x=[];
                    var i;
                    x=sid.split('');
                    var count=0;
                    for(i=0;i<=x.length;i++)
                    {

                         
                             if(x[i]<'0' || x[i]>'9'){

                                alert( "Invalid character in ID field!" );
                          document.myForm.identity.focus();
                            return false;  
                               }
                         
                         count++;

                    } 
                    if(count!=10)
                    {
                            alert( "Invalid length of ID" );
                          document.myForm.identity.focus();
                            return false; 

                    }                  

              }

       </script>

</head>
<body>
 <?php
   session_start();
  if(empty($_SESSION["user"]))
     {
          header('location:index.php');
     }
$user=$_SESSION["user"];

  $identityerr="";
  $identity="";
  if($_SERVER["REQUEST_METHOD"]=="POST"){
          
          if(empty($_POST["identity"]))
      {
        
        $identityerr="Id Name is required";


      }
      else
      {
        $flag=0;
        $identity=$_POST["identity"];
           for($i=0;$i<strlen($identity);$i++)
           {
                 if($identity[$i]<'0' || $identity[$i]>'9')
                 {
                  $identityerr="Invalid character in ID";
                  $flag=1;
                  break;
                 }

           }
           if($flag==0){
           if(strlen($identity)!=9)
           {
                   $identityerr="Invalid Id length";

           }
       }

      }

    $identity=$_POST["identity"];
    $semester_fee=$_POST["semester_fee"];
    $late_fee=$_POST["late_fine"];
    $library_fine=$_POST["library_fine"];
    $semester_name=$_POST["semester_name"];
 
    $con=new mysqli("localhost","root","","student_management_system");
    $sql="INSERT INTO account(`student_id`, `semester_fee`, `late_fee`, `library_fine`, `semester_name`) VALUES ('$identity', '$semester_fee', '$late_fee', '$library_fine', '$semester_name')";
  $result=$con->query($sql);

 if(!$result)
  {

    echo "<script type='text/javascript'>";

    echo "alert('Insertion Error')";

    echo "</script>";
  }
    else{

    echo "<script type='text/javascript'>";

    echo "alert('Acoount has been updated')";

    echo "</script>";
   }
}
?>
    <?php include 'head1.php'; ?>
    <?php include 'menu2.php'; ?>
    <div class="add_stu">
   <form   method="POST"  name="myForm" onsubmit="return validate_acc();" >

    Student Id&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;
    <input type="text" name="identity" id="identity">
    <br><br>

    Semester Fee&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;
    <input type="text" name="semester_fee" id="semester_fee">
    <br><br>
    Late Fine&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;
    <input type="text" name="late_fine" id="late_fine">
    <br><br>
    Library Fine&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="library_fine" id="library_fine">
    <br><br>    
    Semester&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="semester_name" id="semester_name">
    <br><br>
    <input type="submit" value="Add">
    </form>
    
    </div>

</body>
</html> 

