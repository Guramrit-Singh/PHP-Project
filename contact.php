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
	
<!-- //breadcrumbs -->
<!-- login -->
	<div class="login">
		<div class="container">
			<h2>Contact Us</h2>
		
			<div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
				<form name="form1" method="post">
					<input type="text" name="pname" placeholder="Enter Name" required=" " ><br>
					<input type="email" name="email" placeholder="Enter email" required=" " ><br>
                    <input type="number" name="phone" class="form-control" placeholder="Enter Phone " required=" " ><br>
					<textarea name="message" class="form-control" placeholder="Message" required="">
					</textarea><br>
				    <input type="submit" name="btn" value="Submit">
					<?php
					if(isset($_POST["btn"]))
					{
						$pname=$_POST["pname"];
                        $email=$_POST["email"];
					    $phone=$_POST["phone"];
						$message=$_POST["message"];
                        date_default_timezone_set("Asia/Kolkata");
                        $currdt = date("Y-m-d h:i:sa");
						require_once("vars.php");
						$conn=mysqli_connect(dbhost,dbuser,dbpass,dbname) or die("Error in connection".mysqli_connect_error());
					    $q="insert into contact(name,email,phone,message,messagedatetime) values('$pname','$email','$phone','$message','$currdt')";
						$res=mysqli_query($conn,$q) or die("Error in query".mysqli_error($conn));
						$count=mysqli_affected_rows($conn);
						mysqli_close($conn);
						if($count==1)
						{
                            print "Message sent successfully";
                        }
						else
						{
							print "Message not sent successfully";
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