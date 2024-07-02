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
			<h2>Manage Category</h2>
					<?php
						require_once("vars.php");
						$conn=mysqli_connect(dbhost,dbuser,dbpass,dbname) or die("Error in connection".mysqli_connect_error());
					    
						$q="select * from category";
						$res=mysqli_query($conn,$q) or die("Error in query".mysqli_error($conn));
					
						$count=mysqli_affected_rows($conn);
						mysqli_close($conn);
						if($count==0)
						{
							print"No Categories added yet";
						}
						else
						{
                            print"<table class='table table-striped'>
                            <tbody>
                            <tr align='center'>
                            <td><b>Picture</b></td>
                            <td><b>Category</b></td>
                            <td><b>Update</b></td>
                            <td><b>Delete</b></td> ";
                            while($resarr=mysqli_fetch_array($res))
                            {
                            print"<tr align='center'>
							<td><img src='uploads/$resarr[2]' height='75'></td>
                            <td>$resarr[1]</td>
                            <td><a href='updatecat.php?cid=$resarr[0]'>Update</a></td>
							<td><a href='delcat.php?cid=$resarr[0]'>Delete</a></td>
                            </tr>";
                                
                                
                                
                            }
							print"</tbody></table><br/>$count category(s) found";
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
