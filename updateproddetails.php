<?php
ob_start();
session_start();
$pid=$_GET["pid"];
require_once("vars.php");
$conn=mysqli_connect(dbhost,dbuser,dbpass,dbname) or die("Error in connection".mysqli_connect_error());
$q="select * from product where prodid='$pid'";
$res=mysqli_query($conn,$q) or die("Error in query".mysqli_error($conn));
$parr=mysqli_fetch_array($res);
mysqli_close($conn);
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
			<h2>Update Product Details</h2>
		
			<div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
				<form name="form1" method="post" enctype="multipart/form-data">
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
						else
                        {
							while($resarr=mysqli_fetch_array($res))
							{
                                if($resarr[0]==$parr[1])
                                {
                                    print"<option value='$resarr[0]' selected>$resarr[1]</option>";
                                }
                                else{
                                    print"<option value='$resarr[0]'>$resarr[1]</option>";
                                }
								
							}
						}
                        ?>
                        </select></br>
					<input type="text" value="<?php print $parr[2]; ?>" name="prodname" placeholder="Product Name" required=" " >
                    <input type="text" value="<?php print $parr[3]; ?>" name="rate" placeholder="Rate" required=" " >
                    <input type="text" value="<?php print $parr[4]; ?>" name="discount" placeholder="Discount" required=" " >
                    <input type="text" value="<?php print $parr[5]; ?>"name="stock" placeholder="Stock" required=" " >
                    <textarea name="description" class="form-control" placeholder="Description" required="">
                    <?php print $parr[6]; ?>"
                    </textarea><br>
                    <?php print"<img src='uploads/$parr[7]' height='75'>";?>
                    <b>Choose new image,if required<b><br>
					<input type="file" name="pic" ><br>
					<input type="submit" name="btn" value="update">
					<?php
					if(isset($_POST["btn"]))
					{
					    $cat=$_POST["cat"];
                        $pname=$_POST["prodname"];
                        $rate=$_POST["rate"];
                        $dis=$_POST["discount"];
                        $stock=$_POST["stock"];
                        $descp=$_POST["description"];
						$errcode = $_FILES["pic"]["error"];
						if($errcode==0)
						{
							$tname=$_FILES["pic"]["tmp_name"];
							$picname=time().$_FILES["pic"]["name"];
							move_uploaded_file($tname,"uploads/$picname");
						}
						else
						{
							$picname=$parr[7];
						}
						require_once("vars.php");
						$conn=mysqli_connect(dbhost,dbuser,dbpass,dbname) or die("Error in connection".mysqli_connect_error());
					    $q="update product set catid='$cat',prodname='$pname',rate='$rate',discount='$dis',
						stock='$stock',description='$descp',picture='$picname' where prodid='$pid'";
						$res=mysqli_query($conn,$q) or die("Error in query".mysqli_error($conn));
						$count=mysqli_affected_rows($conn);
						mysqli_close($conn);
						if($count==1)
						{
						    header("location:updateproduct.php");
						}
						else
						{
							print"Product not updated successfully";
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