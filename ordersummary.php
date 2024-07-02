<?php
session_start();
require_once("vars.php");
$conn=mysqli_connect(dbhost,dbuser,dbpass,dbname) or die("Error in connection " . mysqli_connect_error());
$un=$_SESSION["uname"];
$q="select * from orderdata where username='$un' order by orderdate desc limit 1";

$res=mysqli_query($conn,$q) or die("Error in query ". mysqli_error($conn));
//resultset - collection of result. Basically it is an object of mysqli_result class

$orderarr=mysqli_fetch_array($res);


$q2="select * from cart where username='$un'";

$cartres=mysqli_query($conn,$q2) or die("Error in query ". mysqli_error($conn));

while($cartarr = mysqli_fetch_array($cartres))
{
    $pname = mysqli_real_escape_string($conn,$cartarr[2]);
    $q3="insert into orderitems(prodid,prodname,rate,quantity,totalcost,picture,orderid) values('$cartarr[1]','$pname','$cartarr[3]','$cartarr[4]','$cartarr[5]','$cartarr[6]','$orderarr[0]')";
    mysqli_query($conn,$q3) or die("Error in query ". mysqli_error($conn));

    $q4="update product set stock=stock-$cartarr[4] where prodid='$cartarr[1]'";
    mysqli_query($conn,$q4) or die("Error in query ". mysqli_error($conn));
}

$q5="delete from cart where username='$un'";
mysqli_query($conn,$q5) or die("Error in query ". mysqli_error($conn));

?>
<?php
ob_start();
?>
<html>
<head>
<title></title>
<?php
require_once("headfiles.php");
?>

</head>
<body>
<?php
require_once("header.php");
?>
<!-- //navigation -->
<!-- breadcrumbs -->
	
<!-- //breadcrumbs -->
<!-- login -->
	<div class="login">
		<div class="container">
			<h2>Order Summary</h2>
            Thanks for shopping on our website. Your order number is <?php print $orderarr[0]; ?>
</div>
</div>
<?php
require_once("footer.php");
?>
</body>
</html>