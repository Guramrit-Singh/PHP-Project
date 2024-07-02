<?php
$cid=$_GET["id"];
require_once("vars.php");
$conn=mysqli_connect(dbhost,dbuser,dbpass,dbname) or die("Error in connection".mysqli_connect_error());
$q="delete from cart where cartid='$cid'";
mysqli_query($conn,$q) or die("Error in query".mysqli_error($conn));
mysqli_close($conn);
header("location:showcart.php");
?>