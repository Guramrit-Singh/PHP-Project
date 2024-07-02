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
require_once("adminheader.php");
?>
<!-- //navigation -->
<!-- breadcrumbs -->
	
<!-- //breadcrumbs -->
<!-- login -->
	<div class="login">
		<div class="container">
			<h2>Update Status</h2>
		
			<div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
				<form name="form1" method="post">
                <b>Current Status :- </b><?php print $_GET["currst"]; ?>
					<br/><br/>
                    <select name="newstatus" class="form-control">
                        <option value="">Choose New Status</option>
                        <option>Confirmed</option>
                        <option>Packed</option>
                        <option>Shipped</option>
                        <option>In-Transit</option>
                        <option>Out for Delivery</option>
                        <option>Delivered</option>
                        <option>Cancelled</option>
                        <option>Returned</option>
                    </select><br/>
					<input type="submit" name="btn" value="update"><br>
					<?php
					if(isset($_POST["btn"]))
					{
					
						$orderno = $_GET["oid"];
						$newst = $_POST["newstatus"];
						require_once("vars.php");
						
						$conn=mysqli_connect(dbhost,dbuser,dbpass,dbname) or die("Error in connection " . mysqli_connect_error());

						$q="update orderdata set status='$newst' where orderid='$orderno'";
						
						mysqli_query($conn,$q) or die("Error in query ". mysqli_error($conn));

						$count = mysqli_affected_rows($conn);
						mysqli_close($conn);
						if($count==1)
						{
							header("location:vieworders.php");
						}
						else
						{
							print "Error while updating status, try again";
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