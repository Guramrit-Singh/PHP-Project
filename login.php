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
require_once("header.php");
?>
<!-- //navigation -->
<!-- breadcrumbs -->
<!-- login -->
	<div class="login">
		<div class="container">
			<h2>Login Form</h2>
		
			<div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
				<form name="form1" method="post">
					<input type="email" name="email" placeholder="Email Address" required=" " >
					<input type="password" name="pass" placeholder="Password" required=" " >
					
					
					
					<input type="submit" name="btn" value="Login">
					<?php
					if(isset($_POST["btn"]))
					{
					    $email=$_POST["email"];
						$pass=$_POST["pass"];
						require_once("vars.php");
						$conn=mysqli_connect(dbhost,dbuser,dbpass,dbname) or die("Error in connection".mysqli_connect_error());
					    $q="select * from signin where email='$email' and pass='$pass'";
						$res=mysqli_query($conn,$q) or die("Error in query".mysqli_error($conn));
						$count=mysqli_affected_rows($conn);
						mysqli_close($conn);
						if($count==1)
						{
						    $resarr=mysqli_fetch_array($res);
							$_SESSION["pname"]=$resarr[0];
							$_SESSION["uname"]=$resarr[2];
							$_SESSION["utype"]=$resarr[4];
							if($resarr[4]=="admin")
							{
								header("location:adminhome.php");
							}
							else
							{
								header("location:index.php");
							}
                        }
						else
						{
							print"Wrong Username/Password";
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