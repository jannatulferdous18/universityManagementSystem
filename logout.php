<?php

session_start();
unset($_SESSION["user"]);
$_SESSION["login"]=0;
header('location:index.php');

?>