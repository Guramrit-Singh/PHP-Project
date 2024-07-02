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
<!-- login -->
	
		
			<ul id="demo1">
			<li>
				<img src="uploads/sports6.jpg" alt="" />
				<!--Slider Description example-->
				<div class="slide-desc">
					<h3>Buy Best Sports Products</h3>
				</div>
			</li>
			<li>
				<img src="uploads/sports5.jpg" alt="" />
				  <div class="slide-desc">
					<h3>Buy Best Sports Products</h3>
				</div>
			</li>
			
			<li>
				<img src="uploads/sports4.webp" alt="" />
				<div class="slide-desc">
					<h3>Buy Best Sports Products</h3>
				</div>
			</li>
		</ul>
		<div class="top-brands">
		<div class="container">
		<h2>Top Products</h2>
		<div class="clearfix">
			 </div>
		</div>
		</div>
	</div>
	<div class="login">
		<div class="container">
		<?php             
            require_once("vars.php");
            $conn=mysqli_connect(dbhost,dbuser,dbpass,dbname) or die("Error in connection " . mysqli_connect_error());

            $q="select * from product order by addon desc limit 12";
            
            $res=mysqli_query($conn,$q) or die("Error in query ". mysqli_error($conn));
            
            $count = mysqli_affected_rows($conn);
            mysqli_close($conn);
            if($count==0)
            {
                print "<br/><h1>No products available</h1>";
            }
            else
            {
                while($resarr=mysqli_fetch_array($res))
                {
                    print "<div class='col-md-3 product-grids'> 
                    <div class='agile-products'>
                        <a href='details.php?pid=$resarr[0]'><img src='uploads/$resarr[7]' class='img-responsive' alt='img'></a>
                        <div class='agile-product-text'>              
                            <h5><a href='products.php?pid=$resarr[0]'>$resarr[2]</a></h5> 
                        </div>
                    </div> 
                    </div>";
                }
            }
            ?>	
</div>
</div>
<!-- //top-brands
<?php
require_once("footer.php");
?>
</body>
</html>