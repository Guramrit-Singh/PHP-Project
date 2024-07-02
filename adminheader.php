<?php
if(session_status()==PHP_SESSION_NONE)
{
	session_start();
}
if(!isset($_SESSION["pname"]) || $_SESSION["utype"]!="admin")
{
    header("location:login.php");
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
                
					<li><a href='logout.php'>Logout</a></li>;
					
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
				<h1><a href="index.php">Sports Market</a></h1>
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
									<li class="active"><a href="adminhome.php" class="act">Home</a></li>	
									<!-- Mega Menu -->
									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown">Manage<b class="caret"></b></a>
										<ul class="dropdown-menu multi-column columns-3">
											<div class="row">
												<div class="multi-gd-img">
													<ul class="multi-column-dropdown">
														<h6>Manage</h6>
														<li><a href="addoncategory.php">Add Category</a></li>
                                                        <li><a href="manageyourcategory.php">Category</a></li> 
												        <li><a href="addproduct.php">Add Product</a></li>
												        <li><a href="updateproduct.php">Update/Delete</a></li>
												        <li><a href="searchuser.php">Search Member</a></li> 
												        <li><a href="listofmembers.php">List of Members</a></li>
														<li><a href="viewmessages.php">View Messages</a></li>
												        <li><a href="vieworders.php">Orders</a></li>
												        
                                            
													</ul>
												</div>	
												</div>
										</ul>
									</li>
									<li><a href="createadmin.php">Create Admin</a></li>
								</ul>
							</div>
							</nav>
			</div>
		</div>