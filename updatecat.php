<?php
ob_start();
session_start();
$catid=$_GET["cid"];
require_once("vars.php");
$conn=mysqli_connect(dbhost,dbuser,dbpass,dbname) or die("Error in connection".mysqli_connect_error());
$q="select * from category where catid='$catid'";
$res=mysqli_query($conn,$q) or die("Error in query".mysqli_error($conn));
$resarr=mysqli_fetch_array($res);
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
			<h2>Update Category</h2>
		
			<div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
				<form name="form1" method="post" enctype="multipart/form-data">
					<input type="text" name="catname" value="<?php print $resarr[1];?>">
                     <?php print"<img src='uploads/$resarr[2]' height='75'>";
                     ?>
					<input type="file" name="pic" >
					<input type="submit" name="btn" value="Update">
					<?php
					if(isset($_POST["btn"]))
					{
					    $cname=$_POST["catname"];
						$errcode = $_FILES["pic"]["error"];
						if($errcode==0)
						{
							$tname=$_FILES["pic"]["tmp_name"];
							$picname=time().$_FILES["pic"]["name"];
							move_uploaded_file($tname,"uploads/$picname");
						}
						else
						{
							$picname=$resarr[2];
						}
						require_once("vars.php");
						$conn=mysqli_connect(dbhost,dbuser,dbpass,dbname) or die("Error in connection".mysqli_connect_error());
					    $q="update  category set catname='$cname',catpic='$picname' where catid='$catid'";
						$res=mysqli_query($conn,$q) or die("Error in query".mysqli_error($conn));
						$count=mysqli_affected_rows($conn);
						mysqli_close($conn);
						if($count==1)
						{
						    header("location:manageyourcategory.php");
						}
						else
						{
							print"Category not uploaded";
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