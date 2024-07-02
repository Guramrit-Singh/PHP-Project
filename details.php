<?php
$productid=$_GET["pid"];
require_once("vars.php");
$conn=mysqli_connect(dbhost,dbuser,dbpass,dbname) or die("Error in connection " . mysqli_connect_error());
$q="select * from product where prodid='$productid'";
$res=mysqli_query($conn,$q) or die("Error in query ". mysqli_error($conn));
$parr=mysqli_fetch_array($res);

$disamt = ($parr[4]*$parr[3])/100;
$remamt = $parr[3]-$disamt;
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
	<div class="breadcrumbs">
		<div class="container">
        <div class="products">
		<div class="container">
			<div class="agileinfo_single">
				
				<div class="col-md-4 agileinfo_single_left">
					<img id="example" src="uploads/<?php print $parr[7];?>" alt=" " class="img-responsive">
				</div>
				<div class="col-md-8 agileinfo_single_right">
				<h2><?php print $parr[2];?></h2>
					<div class="w3agile_description">
						<h4>Description :</h4>
						<p><?php print $parr[6]; ?></p>
					</div>
					<div class="snipcart-item block">
						<div class="snipcart-thumb agileinfo_single_right_snipcart">
							<h4 class="m-sing">₹<?php print $remamt; ?> <span>₹<?php print $parr[3]; ?></span><?php print $parr[4]; ?>% OFF</h4>
						</div>
						<div class="snipcart-details agileinfo_single_right_details">
							<form name="form1"  action="#" method="post">
								<?php
								if($parr[5]>0)
								{
								?>
									<select name="qty">
										<option value="">Choose Quantity</option>
										<?php	
										if($parr[5]>10)
										{
											for($i=1;$i<=10;$i++)
											{
												print "<option>$i</option>";
											}
										}
										else
										{
											for($i=1;$i<=$parr[5];$i++)
											{
												print "<option>$i</option>";
											}
										}
								?>
								</select>
								<fieldset>
								<input type="submit" name="btn" value="Add to cart" class="button">
								</fieldset>
								<?php
                        }
                        else
                        {
                            print "<h3>Out of Stock<h3>";
                        }
                        ?>
							</form>
							<?php
						if(isset($_POST["btn"]))
						{
							if(!isset($_SESSION["pname"]))
							{
								header("location:login.php");
							}
							else
							{
								$qt=$_POST["qty"];
								$tc=$remamt*$qt;
								$un=$_SESSION["uname"];

								require_once("vars.php");
								
								$conn=mysqli_connect(dbhost,dbuser,dbpass,dbname) or die("Error in connection " . mysqli_connect_error());

								$q="insert into cart(prodid,prodname,rate,quantity,totalcost,picture,username) 
								values('$productid','$parr[2]','$remamt','$qt','$tc','$parr[7]','$un')";
								
								mysqli_query($conn,$q) or die("Error in query ". mysqli_error($conn));

								$count = mysqli_affected_rows($conn);
								mysqli_close($conn);
								if($count==1)
								{
									header("location:showcart.php");
								}
								else
								{
									print "Error while adding to cart, try again";
								}
							}
						}

						?>
						
						</div>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
</div>
			
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- login -->
	<div class="login">
		<div class="container">
		
</div>
</div>
<?php
require_once("footer.php");
?>
</body>
</html>