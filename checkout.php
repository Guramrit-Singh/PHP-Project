<?php
ob_start();
session_start();
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
			<h2>Checkout</h2>
		
			<div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
				<form name="form1" method="post">
                Your total bill amount is ₹<?php print $_SESSION["billamt"] . "/-"; ?>
					<br/><br/><textarea name="addr" placeholder="Shipping Address" class="form-control" required=""></textarea><br/>
					Payment Mode will be Cash on Delivery for all orders.
					<input type="submit" name="btn" value="Make Payment">
					<?php
					if(isset($_POST["btn"]))
					{
					    require_once("vars.php");
						
						$conn=mysqli_connect(dbhost,dbuser,dbpass,dbname) or die("Error in connection " . mysqli_connect_error());
						$un=$_SESSION["uname"];
						date_default_timezone_set("Asia/Kolkata");
                        $currdt = date("Y-m-d h:i:sa");
						$amt = $_SESSION["billamt"];
						$addr=$_POST["addr"];

						$q="insert into orderdata(username,orderdate,amount,status,saddr) values('$un','$currdt','$amt','Order Received','$addr')";
						
						mysqli_query($conn,$q) or die("Error in query ". mysqli_error($conn));

						$count = mysqli_affected_rows($conn);
						mysqli_close($conn);
						if($count==1)
						{
							header("location:ordersummary.php");
						}
						else
						{
							print "Error while placing order, try again";
						}					
					}


					?>
				</form>
				</div>
				</div>
				

<?php
require_once("footer.php");
?>
</body>
</html>