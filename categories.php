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
require_once("header.php");
?>
<!-- //navigation -->
<!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
		<?php
						require_once("vars.php");
						$conn=mysqli_connect(dbhost,dbuser,dbpass,dbname) or die("Error in connection".mysqli_connect_error());
					    
						$q="select * from category";
						$res=mysqli_query($conn,$q) or die("Error in query".mysqli_error($conn));
					
						$count=mysqli_affected_rows($conn);
						mysqli_close($conn);
						if($count==0)
						{
							print"No categories found";
						}
						else
						{
							while($resarr=mysqli_fetch_array($res))
							{
								print"<div class='agile_top_brands_grids'>
								<div class='col-md-4 top_brand_left'>
									<div class='hover14 column'>
										<div class='agile_top_brand_left_grid'>
							              <div class='agile_top_brand_left_grid1'>
												<figure>
													<div class='snipcart-item block'>
														<div class='snipcart-thumb'>
															<a href='products.php?cid=$resarr[0]'><img title=' ' alt=' ' src='uploads/$resarr[2]' height='90' width='90' /></a>
															<h5><a href='products.php?cid=$resarr[0]'>$resarr[1]</a></h5>
												    </div>
														</div>
												</figure>
											</div>
										</div>
									</div>
								</div>";

								
							
							}
						}?>
			
		</div>
	</div>
    <div class="login">
		<div class="container">
			
</div>
</div>
<?php
require_once("footer.php");
?>
</body>
</html>