<?php
ob_start();
session_start();
if(!isset($_SESSION["pname"]))
{
    header("location:login.php");
}
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
			<h2>Change Password</h2>
		
			<div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
				<form name="form1" method="post">
                <input type="password" name="currpass" placeholder="Current Password" required=" " >
                <input type="password" name="newpass" placeholder="New Password" required=" " >
				<input type="password" name="cnewpass" placeholder="Confirm New Password" required=" " >	
					
					<input type="submit" name="btn" value="Change Password">
					<?php
					if(isset($_POST["btn"]))
					{
					
					
						$currp=$_POST["currpass"];
                        $newp=$_POST["newpass"];
                        $cnewp=$_POST["cnewpass"];
                        $un=$_SESSION["uname"];
if($newp==$cnewp){
						require_once("vars.php");
						$conn=mysqli_connect(dbhost,dbuser,dbpass,dbname) or die("Error in connection".mysqli_connect_error());
					
						
						$q="update signin set pass='$newp' where email='$un' and pass='$currp'";
						$res=mysqli_query($conn,$q) or die("Error in query".mysqli_error($conn));
						$count=mysqli_affected_rows($conn);
						mysqli_close($conn);
						if($count==1)
						{
						    
							
						print"Password changed successfully";
						}
						else
						{
							print"Wrong Password";
						}

}
else{
    print"New Password and confirm new password doesn't match";
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
