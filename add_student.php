<?php

  session_start();
  if(empty($_SESSION["user"]))
     {
          header('location:index.php');
     }
$user=$_SESSION["user"];

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


            <script type="text/javascript">
         function validate()
         {
         
            if( document.myForm.fname.value == "" )
            {
               alert( "Please provide your First name!" );
               document.myForm.fname.focus() ;
               return false;
            }
            else
            {

               var name=document.getElementById("fname").value;
                    var array=[];
                    var i;
                    array=name.split('');
                    var x='.';
                    for(i=0;i<=array.length;i++)
                    {

                         if(array[i]!='.'){
                             if((array[i]<'A' || array[i]>'Z') && (array[i]< 'a' || array[i]>'z')){

                                
                            alert( "Invalid character in your first name!" );
                          document.myForm.fname.focus();
                            return false;                           }
                         }


                    }
               

            }
                     
           

            if( document.myForm.lname.value == "" )
            {
               alert( "Please provide your First name!" );
               document.myForm.lname.focus() ;
               return false;
            }


            else
            {

               var name=document.getElementById("lname").value;
                    var array=[];
                    var i;
                    array=name.split('');
                    var x='.';
                    for(i=0;i<=array.length;i++)
                    {

                         if(array[i]!='.'){
                             if((array[i]<'A' || array[i]>'Z') && (array[i]< 'a' || array[i]>'z')){

                                
                            alert( "Invalid character in your first name!" );
                          document.myForm.lname.focus();
                            return false;                           }
                         }


                    }
               

            }

              
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
                          document.myForm.id.focus();
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

            if( document.myForm.email.value == "" )
            {
               alert( "Please provide your Email!" );
               document.myForm.email.focus() ;
               return false;
            }
            else{
          

                    var email = document.getElementById('email');
                    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

                    if (!filter.test(email.value)) {
                           alert('Please provide a valid email address');
                         return false;
                         document.myForm.email.focus() ;

                    }
            
            }
            if(document.myForm.dob.value=="")
            {

                 alert("Please enter the date of birth");

            }

            //checking nationality
            if( document.myForm.nationality.value == "" )
            {
               alert( "Please provide Nationaionality!" );
               document.myForm.nationality.focus() ;
               return false;
            }
            else
            {

               var name=document.getElementById("nationality").value;
                    var array=[];
                    var i;
                    array=name.split('');
                    console.log(array);
                    var x='.';
                    for(i=0;i<=array.length;i++)
                    {

                         if(array[i]!='.'){
                             if((array[i]<'A' || array[i]>'Z') && (array[i]< 'a' || array[i]>'z')){

                                
                            alert( "Invalid character in Nationaionality!" );
                          document.myForm.nationality.focus();
                            return false;                           }
                         }


                    }
               

            }
                      if( document.myForm.religion.value == "" )
            {
               alert( "Please provide your Religion!" );
               document.myForm.religion.focus() ;
               return false;
            }
            else
            {

               var name=document.getElementById("religion").value;
                    var array=[];
                    var i;
                    array=name.split('');
                    console.log(array);
                    var x='.';
                    for(i=0;i<=array.length;i++)
                    {

                         if(array[i]!='.'){
                             if((array[i]<'A' || array[i]>'Z') && (array[i]< 'a' || array[i]>'z')){

                                
                            alert( "Invalid character in Religion!" );
                          document.myForm.religion.focus();
                            return false;                           }
                         }


                    }
               

            }



       }

               function getAge(birth) {

               var today = new Date();
               var nowyear = today.getFullYear();
               var nowmonth = today.getMonth();
               var nowday = today.getDate();

               var birthyear = birth.getFullYear();
               var birthmonth = birth.getMonth();
               var birthday = birth.getDate();

               var age = nowyear - birthyear;
               var age_month = nowmonth - birthmonth;
               var age_day = nowday - birthday;
             
               if(age_month < 0 || (age_month == 0 && age_day <0)) {
                         age = parseInt(age) -1;
                    }
                    return age;
          }
          
          function validage()
          {
          var lre = /^\s*/;
          var inputDate = document.getElementById("dob").value;  
          inputDate = inputDate.replace(lre, "");
          var age2=getAge(new Date(inputDate));
          if(age2>0){
          document.getElementById("age").value=age2;
          }
          else document.getElementById("age").value=0;
          }

         </script>

 



</head>
<body>
 <?php

 	$fnameerr=$lnameerr=$emailerr=$identityerr=$doberr=$nationalityerr=$religionerr="";
	$fname=$lname=$email=$identity=$dob=$nationality=$religion="";
if($_SERVER["REQUEST_METHOD"]=="POST"){

	if(empty($_POST["fname"]))
      {
        
        $fnameerr="First Name is required";


      }
      else
      {
               $fname=test_input($_POST["fname"]);
                  if (!preg_match("/^[a-zA-Z ]*$/",$fname)) {
                    $fnameerr = "Only letters and white space allowed"; 
                   }

      }

      

		if(empty($_POST["lname"]))
      {
        
        $lnameerr="Last Name is required";


      }
      else
      {

      	$lname=test_input($_POST["lname"]);
            
                if (!preg_match("/^[a-zA-Z ]*$/",$lname)) {
      $lnameerr = "Only letters and white space allowed"; 
    }



      }
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



        if (empty($_POST["email"])) {
         $emailerr = "Email is required";
      } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailerr = "Invalid email format"; 
        }
      }


        if(empty($_POST["dob"]))
      {
        
        $doberr="Dathe of birth required";


      }
      else
      {

                  $dob=$_POST["dob"];
      }

       if(empty($_POST["nationality"]))
      {
        
        $nationalityerr="Nationality is required";


      }
      else
      {
               $nationality=test_input($_POST["nationality"]);
                  if (!preg_match("/^[a-zA-Z ]*$/",$nationality)) {
                    $nationalityerr = "Only letters and white space allowed"; 
                   }

      }

      if(empty($_POST["religion"]))
      {
        
        $religionerr="Religion is required";


      }
      else
      {
               $religion=test_input($_POST["religion"]);
                  if (!preg_match("/^[a-zA-Z ]*$/",$religion)) {
                    $religionerr = "Only letters and white space allowed"; 
                   }

      }


    $age=$_POST["age"];
    
     $semister="1";
     $cgpa=0.0;

     $con=new mysqli("localhost","root","","student_management_system");
     $sql= 'INSERT INTO students(`fname`,`lname`, `id`, `email`, `semester`, `dob`, `age`,`nationality`,`religion`,`cgpa`) 
         VALUES(\''.$fname.'\',\''.$lname.'\',\''.$identity.'\',\''.$email.'\',\''.$semister.'\',\''.$dob.'\',\''.$age.'\',\''.$nationality.'\',\''.$religion.'\',\''.$cgpa.'\')';
  $result=$con->query($sql);
  if(!$result)
  {

  	echo "<script type='text/javascript'>";

  	echo "alert('Insertion Error')";

  	echo "</script>";
  }
  else{
        $sql1 = 'INSERT INTO users (`username`, `password`) VALUES (\''.$identity.'\',"12345")';
        $result1=$con->query($sql1);
        $con->close();
            echo "<script type='text/javascript'>";

    echo "alert('Student Inserted Successfully')";

    echo "</script>";
   }
     
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
 

	<?php include 'head1.php'; ?>
	<?php include 'menu2.php'; ?>
	<div class="add_stu">


	<form action=""	 method="post"  name="myForm" onsubmit="return validate();" >

	First Name&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;
	<input type="text" name="fname" id="fname">
	<span class="error"><?php echo $fnameerr;?></span>
	<br><br>
	Last Name&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;
	<input type="text" name="lname" id="lname">
	<span class="error"> <?php echo $lnameerr;?></span>
	<br><br>
	Id&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;
	<input type="text" name="identity" id="identity">
	<span class="error"> <?php echo $identityerr;?></span>
	<br><br>

	Email&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;
	<input type="text" name="email" id="email">

	<span class="error"> <?php echo $emailerr;?></span>
	<br><br>
	
	DOB&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;<input type="date" name="dob" id="dob" onchange="validage();">
	<span class="error"> <?php echo $doberr;?></span>
	
	<br><br>
	Age&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;
	<input type="text" name="age" id="age" readonly>
	<br><br>
	Nationality&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="text" name="nationality" id="nationality">
	<span class="error"><?php echo $nationalityerr;?></span>
	
	<br><br>
	Religion&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="religion" id="religion">
	<span class="error"><?php echo $religionerr;?></span>
	
	<br><br>	

    <input type="submit" value="Add">
	</form>
	
	</div>

</body>
</html>	

