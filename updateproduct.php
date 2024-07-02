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
			<h2>Update Products</h2>
			<form name="form1" method="post">
			<select name="cat" class="form-control">
						<option value="">Choose Category</option>
						<?php
						require_once("vars.php");
						$conn=mysqli_connect(dbhost,dbuser,dbpass,dbname) or die("Error in connection".mysqli_connect_error());
						$q="select * from category";
						$res=mysqli_query($conn,$q) or die("Error in query".mysqli_error($conn));
						$count=mysqli_affected_rows($conn);
						mysqli_close($conn);
						if($count==0)
						{
							print"<option value=''>No Category Found</option>";
						}
						else{
							while($resarr=mysqli_fetch_array($res))
							{
								print"<option value='$resarr[0]'>$resarr[1]</option>";
							}
						}
                        ?>
                        </select></br>
					
						<input type="submit" name="btn" value="Show">	
						</form>
				</div>
				</div>
				<?php
				if(isset($_POST["btn"]))
				{
					$cid=$_POST["cat"];
						require_once("vars.php");
						$conn=mysqli_connect(dbhost,dbuser,dbpass,dbname) or die("Error in connection".mysqli_connect_error());
					    
						$q="select * from product where catid='$cid'";
						$res=mysqli_query($conn,$q) or die("Error in query".mysqli_error($conn));
					
						$count=mysqli_affected_rows($conn);
						mysqli_close($conn);
						if($count==0)
						{
							print"No Products added yet";
						}
						else
						{
                            print"<table class='table table-striped'>
                            <tbody>
                            <tr align='center'>
                            <td><b>Picture</b></td>
                            <td><b>Product Name</b></td>
                            <td><b>Update</b></td>
                            <td><b>Delete</b></td> ";
                            while($resarr=mysqli_fetch_array($res))
                            {
                            print"<tr align='center'>
							<td><img src='uploads/$resarr[7]' height='75'></td>
                            <td>$resarr[2]</td>
                            <td><a href='updateproddetails.php?pid=$resarr[0]'>Update</a></td>
							<td><a href='delprod.php?pid=$resarr[0]'>Delete</a></td>
                            </tr>";
                                
                                
                                
                            }
							print"</tbody></table><br/>$count products(s) found";
						}
					}

						?>
				

<?php
require_once("footer.php");
?>
</body>
</html>
