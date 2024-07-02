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
			<h2>List of Members</h2>
					<?php
						require_once("vars.php");
						$conn=mysqli_connect(dbhost,dbuser,dbpass,dbname) or die("Error in connection".mysqli_connect_error());
					    
						$q="select * from signin";
						$res=mysqli_query($conn,$q) or die("Error in query".mysqli_error($conn));
					
						$count=mysqli_affected_rows($conn);
						mysqli_close($conn);
						if($count==0)
						{
							print"No members found";
						}
						else
						{
                            print"<table class='table table-striped'>
                            <tbody>
                            <tr align='center'>
                            <td><b>Name</b></td>
                            <td><b>Phone</b></td>
                            <td><b>Email</b></td>
                            <td><b>Delete</b></td> ";
                            while($resarr=mysqli_fetch_array($res))
                            {
                            print"<tr align='center'>
                            <td>$resarr[0]</td>
                            <td>$resarr[1]</td>
                            <td>$resarr[2]</td>
                            <td><a href='delmemb.php?uname=$resarr[2]'>Delete</a></td>
                            </tr>";
                                
                                
                                
                            }
							print"</tbody></table><br/>$count member(s) found";
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
