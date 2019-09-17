<?php
    
    session_start();

    if($_SERVER["REQUEST_METHOD"]=="POST"){
     $username=$_POST["id"];
     $password=$_POST["password"];
     
     $con=new mysqli("localhost","root","","student_management_system");
     $sql="SELECT * from users where username='$username' and password='$password'";
     $result=$con->query($sql);
     $row=mysqli_num_rows($result);
     echo $row;
     if($row==1)
     {
         if($username=="admin")
         {
            $_SESSION["user"]=$username;
            $_SESSION["login"]=1;           
             header('location:admin.php');
         }
         else
         {
             $_SESSION["user"]=$username;
            $_SESSION["login"]=1;
           
             header('location:student.php');
             
         }
         
     }
     else
     {
         echo "Wrong Username or Password";
     }
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>UNITED INTERNAIONAL UNIVERSITY</title>		
	<link rel="icon" type="image/png" href="img/favicon.jpg"/>
	<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>

    
	<?php include 'head.php'; ?>
	<div id="home_menu_wrapper">
		
			<div id="home_menu">
				
                <ul>
                    <li><a href="index.php">Home</a></li>&nbsp; &nbsp; &nbsp;   
                    <li><a href="aboutus.php">About Us</a></li>&nbsp; &nbsp; &nbsp; 
                    <li><a href="contactus.php">Contact Us</a></li>&nbsp; &nbsp; &nbsp;
                </ul>
            </div>
    </div>
    <?php include 'slider.php'; ?>
    <?php include 'banner.php'; ?>
    <?php include 'footer.php'; ?>      
</body>
</html>