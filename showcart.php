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
			<h2>Show Cart</h2>
					<?php
						require_once("vars.php");
						$conn=mysqli_connect(dbhost,dbuser,dbpass,dbname) or die("Error in connection".mysqli_connect_error());
					    $un=$_SESSION["uname"];
                        $q="select * from cart where username='$un'";
						$res=mysqli_query($conn,$q) or die("Error in query".mysqli_error($conn));
					
						$count=mysqli_affected_rows($conn);
						mysqli_close($conn);
						if($count==0)
						{
							print"You have not added any product in your cart";
						}
						else
						{
                            print"<table class='table table-striped'>
                            <tbody>
                            <tr align='center'>
                            <td><b>Picture</b></td>
                            <td><b>Name</b></td>
                            <td><b>Rate</b></td>
                            <td><b>Quantity</b></td>
                            <td><b>Total Cost</b></td>
                            <td><b>Delete</b></td> ";
                            $billtot=0;
                            while($resarr=mysqli_fetch_array($res))
                            {
                            print"<tr align='center'>
                            <td><img src='uploads/$resarr[6] 'height='75'/></td>
                            <td>$resarr[2]</td>
                            <td>$resarr[3]</td>
                            <td>$resarr[4]</td>
                            <td>$resarr[5]</td>
                            <td><a href='delcart.php?id=$resarr[0]'>Delete</a></td>
                            </tr>";
                            $billtot=$billtot+$resarr[5];
                                
                                
                                
                            }
							print"</tbody></table><br/>Your Total Cost $billtot/-<br/>$count product(s) in your cart<br><br><a href='checkout.php'>Checkout</a>";
                            $_SESSION["billamt"]=$billtot;
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
