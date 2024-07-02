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
require_once("adminheader.php");
?>
<!-- //navigation -->
<!-- breadcrumbs -->
	
<!-- //breadcrumbs -->
<!-- login -->
	<div class="login">
		<div class="container">
			<h2>Add Product</h2>
		
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
						else{
							while($resarr=mysqli_fetch_array($res))
							{
								print"<option value='$resarr[0]'>$resarr[1]</option>";
							}
						}
                        ?>
                        </select></br>
					<input type="text" name="prodname" placeholder="Product Name" required=" " >
                    <input type="text" name="rate" placeholder="Rate" required=" " >
                    <input type="text" name="discount" placeholder="Discount" required=" " >
                    <input type="text" name="stock" placeholder="Stock" required=" " >
                    <textarea name="description" class="form-control" placeholder="Description" required="">
                    </textarea><br>
					<input type="file" name="pic" ><br>
					<input type="submit" name="btn" value="Add">
					<?php
					if(isset($_POST["btn"]))
					{
					    $cat=$_POST["cat"];
                        $pname=$_POST["prodname"];
                        $rate=$_POST["rate"];
                        $dis=$_POST["discount"];
                        $stock=$_POST["stock"];
                        $descp=$_POST["description"];
						date_default_timezone_set("Asia/Kolkata");
						$currdt=date("Y-m-d h:i:sa");

						$errcode = $_FILES["pic"]["error"];
						if($errcode==0)
						{
							$tname=$_FILES["pic"]["tmp_name"];
							$picname=time().$_FILES["pic"]["name"];
							move_uploaded_file($tname,"uploads/$picname");
						}
						else
						{
							$picname="noimage.jpg";
						}
						require_once("vars.php");
						$conn=mysqli_connect(dbhost,dbuser,dbpass,dbname) or die("Error in connection".mysqli_connect_error());
					    $q="insert into product(catid,prodname,rate,discount,stock,description,picture,addon)
						values('$cat','$pname','$rate','$dis','$stock','$descp','$picname','$currdt')";
						$res=mysqli_query($conn,$q) or die("Error in query".mysqli_error($conn));
						$count=mysqli_affected_rows($conn);
						mysqli_close($conn);
						if($count==1)
						{
						    print"Product Added Successfully";
						}
						else
						{
							print"Product not added successfully";
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