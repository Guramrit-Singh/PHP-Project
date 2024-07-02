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
			<h2>View Orders</h2>
					<?php
						require_once("vars.php");
						$conn=mysqli_connect(dbhost,dbuser,dbpass,dbname) or die("Error in connection".mysqli_connect_error());
					    
						$q="select * from orderdata order by orderdate desc";
						$res=mysqli_query($conn,$q) or die("Error in query".mysqli_error($conn));
					
						$count=mysqli_affected_rows($conn);
						mysqli_close($conn);
						if($count==0)
						{
							print "No orders found";
						}
						else
						{
                            print "<table class='table table-striped'>
                    <tbody>
                    <tr align='center'>
                    <td><b>Order No</b></td>
                    <td><b>Username</b></td>
                    <td><b>Address</b></td>
                    <td><b>Date</b></td>
                    <td><b>Amount</b></td>
                    <td><b>Status</b></td>
                    <td><b>Update</b></td></tr>";
                    while($resarr=mysqli_fetch_array($res))
                    {
                        print "<tr align='center'>
                        <td><a href='showorderitems.php?oid=$resarr[0]'>$resarr[0]</td>
                        <td>$resarr[1]</td>
						<td>$resarr[5]</td>
                        <td>$resarr[2]</td>
                        <td>$resarr[3]</td>
                        <td>$resarr[4]</td>
                        <td><a href='updatestatus.php?currst=$resarr[4]&oid=$resarr[0]'>Update</a></td>
                        </tr>";
                                
                                
                            }
							print"</tbody></table><br/>$count order(s) found";
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
