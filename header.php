<?php
if(session_status()==PHP_SESSION_NONE)
{
	session_start();
}
?>
<!-- header -->
	<div class="agileits_header">
		<div class="container">
			<div class="w3l_offers">
				<p>
					Welcome
					<?php
				if(isset($_SESSION["pname"])) // we are writing here because we have to show person name here.

				
				{
					print $_SESSION["pname"];
				}
				else{
					print"Guest";
				}
				?>
				</p>
			</div>
			<div class="agile-login">
				<?php
				if(isset($_SESSION["pname"]))
				{
					print"
				    <ul>
					<li><a href='changepassword.php'> Change Password </a></li>;
                    <li><a href='myorders.php'>My Orders</a></li>;
					<li><a href='logout.php'>Logout</a></li>;
					
				</ul>";
				}
				else{
					print"
					<ul>
				    <li><a href='login.php'> Login </a></li>
                    <li><a href='signup.php'>Sign Up</a></li>
					</ul>";
				}
				?>
			</div>
			<div class="product_list_header"> 
				<?php
				if(isset($_SESSION["pname"]))
				{
					?>
					<form action="showcart.php" method="post" class="last"> 
						
						<button class="w3view-cart" type="submit" name="submit" value=""><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></button>
						<?php
				}
				?>
					</form>  
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>

	<div class="logo_products">
		<div class="container">
		<div class="w3ls_logo_products_left1">
				
			</div>
			<div class="w3ls_logo_products_left">
				<h1><a href="index.html">Sports Market</a></h1>
			</div>
		<div class="w3l_search">
			<form action="searchresults.php" method="get">
				<input type="search" name="term" placeholder="Search for a Product..." required="">
				<button type="submit" class="btn btn-default search" aria-label="Left Align">
					<i class="fa fa-search" aria-hidden="true"> </i>
				</button>
				<div class="clearfix"></div>
				</form>
		</div>
			
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //header -->
<!-- navigation -->
	<div class="navigation-agileits">
		<div class="container">
			<nav class="navbar navbar-default">
							<!-- Brand and toggle get grouped for better mobile display -->
							<div class="navbar-header nav_2">
								<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
							</div> 
							<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
								<ul class="nav navbar-nav">
									<li class="active"><a href="index.php" class="act">Home</a></li>	
									<!-- Mega Menu -->
									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown">Products<b class="caret"></b></a>
										<ul class="dropdown-menu multi-column columns-3">
											<div class="row">
												<div class="multi-gd-img">
													<ul class="multi-column-dropdown">
														<h6>We Have These Products</h6>
														<?php               
							require_once("vars.php");
							$conn=mysqli_connect(dbhost,dbuser,dbpass,dbname) or die("Error in connection " . mysqli_connect_error());

							$q="select * from category limit 6";
							
							$res=mysqli_query($conn,$q) or die("Error in query ". mysqli_error($conn));
							//resultset - collection of result. Basically it is an object of mysqli_result class
							mysqli_close($conn);
							while($resarr=mysqli_fetch_array($res))
							{
								print "<li><a href='products.php?cid=$resarr[0]'>$resarr[1]</a></li>";
							}
							?>	
							<li><a href='categories.php'>All Categories</a></li>
													</ul>
												</div>	
												</div>
										</ul>
									</li>
									<li><a href="contact.php">Contact Us</a></li>
								</ul>
							</div>
							</nav>
			</div>
		</div>