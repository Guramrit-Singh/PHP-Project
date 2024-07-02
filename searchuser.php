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
			<h2>Search User</h2>
		
			<div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
				<form name="form1" method="post">
					<input type="email" name="email" placeholder="Email Address" required=" " ><br>
					
					
					
					
					
					<input type="submit" name="btn" value="Search">
					<?php
					if(isset($_POST["btn"]))
					{
					
						$email=$_POST["email"];
						require_once("vars.php");
						$conn=mysqli_connect(dbhost,dbuser,dbpass,dbname) or die("Error in connection".mysqli_connect_error());
					    
						$q="select * from signin where email='$email'";
						$res=mysqli_query($conn,$q) or die("Error in query".mysqli_error($conn));
					
						$count=mysqli_affected_rows($conn);
						mysqli_close($conn);
						if($count==1)
						{
							$resarr=mysqli_fetch_array($res);
							print"Name:-$resarr[0]<br>Phone:-$resarr[1]";
						}
						else
						{
							print"Wrong Username";
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