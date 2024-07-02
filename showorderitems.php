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
			<h2>View Order Items</h2>
					<?php
                         require_once("vars.php");
                         $conn=mysqli_connect(dbhost,dbuser,dbpass,dbname) or die("Error in connection " . mysqli_connect_error());
                         $orderid=$_GET["oid"];
                         $q="select * from orderitems where orderid='$orderid'";
                         
                         $res=mysqli_query($conn,$q) or die("Error in query ". mysqli_error($conn));
                         //resultset - collection of result. Basically it is an object of mysqli_result class
                         $count = mysqli_affected_rows($conn);
                         mysqli_close($conn);
                         if($count==0)
                         {
                             print "No items found";
                         }
                         else
                         {
                             print "<table class='table table-striped'>
                             <tbody>
                             <tr align='center'>
                             <td><b>Picture</b></td>
                             <td><b>Name</b></td>
                             <td><b>Rate</b></td>
                             <td><b>Quantity</b></td>
                             <td><b>Total Cost</b></td></tr>";
                             while($resarr=mysqli_fetch_array($res))
                             {
                                 print "<tr align='center'>
                                 <td><img src='uploads/$resarr[6]' height='75'></td>
                                 <td>$resarr[2]</td>
                                 <td>$resarr[3]</td>
                                 <td>$resarr[4]</td>
                                 <td>$resarr[5]</td>
                                 </tr>";
                             }
                             print "</tbody></table><br/><br/>$count item(s) found";
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
