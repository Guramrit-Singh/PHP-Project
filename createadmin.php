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
<!-- breadcrumbs -->

<!-- //breadcrumbs -->
<!-- register -->
	<div class="register">
		<div class="container">
			<h2>Create Admin</h2>
			<div class="login-form-grids">
				<form name="form1" method="post">
					<input type="text" name="pname" placeholder="Name" required=" " ><br>
					<input type="number" name="phone" class="form-control"placeholder="Phone" required=" " ><br>
					<input type="email"  name="email"placeholder="Email Address" required=" " >
					<input type="password" name="pass" placeholder="Password" required=" " >
					<input type="submit"  name="btn" value="Submit">
					<?php
					if(isset($_POST["btn"]))
					{
						$pname=$_POST["pname"];
                        $phone=$_POST["phone"];
						$email=$_POST["email"];
						$pass=$_POST["pass"];
						require_once("vars.php");
						$conn=mysqli_connect(dbhost,dbuser,dbpass,dbname) or die("Error in connection".mysqli_connect_error());
						$q="insert into signin values('$pname','$phone','$email','$pass','admin')";
						mysqli_query($conn,$q) or die("Error in query".mysqli_error($conn));
						$count=mysqli_affected_rows($conn);
						mysqli_close($conn);
						if($count==1)
						{
							print"Admin Created successfully";
						}
						else
						{
							print"Error while adding,try again";
						}

					}
                   ?>
				</form>

			
</div>
		</div>
	</div>

<?php
require_once("footer.php");
?>
</body>
</html>