<?php
$un=$_GET["pid"];
require_once("vars.php");
$conn=mysqli_connect(dbhost,dbuser,dbpass,dbname) or die("Error in connection".mysqli_connect_error());
$q="delete from product where prodid='$un'";
mysqli_query($conn,$q) or die("Error in query".mysqli_error($conn));
mysqli_close($conn);
header("location:updateproduct.php");
?>