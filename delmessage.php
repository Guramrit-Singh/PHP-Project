<?php
$un=$_GET["messageid"];
require_once("vars.php");
$conn=mysqli_connect(dbhost,dbuser,dbpass,dbname) or die("Error in connection".mysqli_connect_error());
$q="delete from contact where messageid='$un'";
mysqli_query($conn,$q) or die("Error in query".mysqli_error($conn));
mysqli_close($conn);
header("location:viewmessages.php");
?>