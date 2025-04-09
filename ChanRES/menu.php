<!DOCTYPE html>
<html lang="en">
<head>
	<style>
		 .product-itemss{
        
		border: 1px solid #ccc;
		
		padding: 30px;
		
		}
		
		.product-itemm{
		
		float: left;
		
		width: 23%;
		
		margin: 1%;
		
		padding: 10px;
		
		box-sizing: border-box;
		
		border: 1px solid #ccc;
		
		line-height: 26px;
		
		}
		.product-pricee{
			  
			  color: red;
			  font-weight: bold;
			  
			  }
			  
			  .product-imgg {
			  
			  padding: 5px;
			  
			  border: 1px solid #ccc;
			  
			  margin-bottom: 5px;
			  }
		  .clear-bothh{
			  
			clear: both;
			}
			.buy-buttonn{
			  
			  text-align: right;
			  
			  margin-top: 10px;
			  
			  }
			  .containerr{
		  
				width: 1200px;
				
				margin: 0 auto;
				border: 1px solid #000;
				padding: 15px;
				
				}
	</style>
	<title>Chạn Restaurant - Ngon hơn bao giờ hết</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="css/animate.css">
	
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	<link rel="stylesheet" href="css/magnific-popup.css">

	<link rel="stylesheet" href="css/bootstrap-datepicker.css">
	<link rel="stylesheet" href="css/jquery.timepicker.css">

	
	<link rel="stylesheet" href="css/flaticon.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>

	<div class="wrap">
		<div class="container">
			<div class="row justify-content-between">
				<div class="col-12 col-md d-flex align-items-center">
					<p class="mb-0 phone"><span class="mailus">SDT</span> <a href="#">+84 6512345678</a> or <span class="mailus">email us:</span> <a href="#">teambatdiet22@gmail.com</a></p>
				</div>
				<div class="col-12 col-md d-flex justify-content-md-end">
					<div class="social-media">
						<p class="mb-0 d-flex">
							<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-facebook"><i class="sr-only">Facebook</i></span></a>
							<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-twitter"><i class="sr-only">Twitter</i></span></a>
							<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-instagram"><i class="sr-only">Instagram</i></span></a>
							<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-dribbble"><i class="sr-only">Dribbble</i></span></a>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
		<div class="container">
			<a class="navbar-brand" href="index.html">Chạn.<span>Restaurant</span></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="oi oi-menu"></span> Menu
			</button>

			<div class="collapse navbar-collapse" id="ftco-nav">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item active"><a href="index.html" class="nav-link">Trang chủ</a></li>
					<li class="nav-item"><a href="about.html" class="nav-link">Về chúng tôi</a></li>
					<!--<li class="nav-item"><a href="chef.html" class="nav-link">Chef</a></li>-->
					<li class="nav-item"><a href="menu.html" class="nav-link">Menu</a></li>
					<!--<li class="nav-item"><a href="reservation.html" class="nav-link">Reservation</a></li>-->
					<!--<li class="nav-item"><a href="blog.html" class="nav-link">Blog</a></li>-->
					<li class="nav-item"><a href="contact.html" class="nav-link">Liên hệ</a></li>
				</ul>
			</div>
		</div>
	</nav>
	<!-- END nav -->
	
	<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_5.jpg');" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row no-gutters slider-text align-items-end justify-content-center">
				<div class="col-md-9 ftco-animate text-center mb-5">
					<h1 class="mb-2 bread">Menu</h1>
					<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Trang Chủ <i class="fa fa-chevron-right"></i></a></span> <span>Menu <i class="fa fa-chevron-right"></i></span></p>
				</div>
			</div>
		</div>
	</section>

	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center mb-5 pb-2">
				<div class="col-md-7 text-center heading-section ftco-animate">
					<h2 class="mb-4">Our Menu</h2>
				</div>
			</div>
			<?php
			include './connect_db.php';
			$products = mysqli_query($con,"SELECT * FROM `tbl_khoa` ORDER BY 'ID' ASC;");
	
			?>
			<div class="product-itemss">
                <?php
                while($row = mysqli_fetch_array($products)){

                
                ?>
                <div class="product-itemm">
                    <div class="product-imgg">
                    <img src="<?=$row['anhmota']?>" width="200px" height="200px" title="<?=$row['tensanpham']?>"/>
                    </div>
                    <strong ><a href="chitiet.php" ><?=$row['tensanpham']?></a></strong><br/>
                    <label>Gia:</label><span class="product-pricee"><?=number_format($row['gia'],0,",",".")?>d</span><br/>
                   
                        <a href="chitiet.php"><button type="button" class="btn btn-danger">Mua</button></a>
                
                    
                </div>
                <?php } ?>
				<div class="clear-bothh"></div>

            </div>
		</div>

	</section>

	

	<footer class="ftco-footer ftco-no-pb ftco-section">
		<div class="container">
			<div class="row mb-5">
				<div class="col-md-6 col-lg-3">
					<div class="ftco-footer-widget mb-4">
						<h2 class="ftco-heading-2">Chạn.Restaurant</h2>
						<p>Không gian ấm cúng, phục vụ tận tình cùng những món ăn tươi ngon chắc chắn sẽ làm hài lòng cả những thực khách khó tính nhất. Hãy để chúng tôi mang đến cho bạn những khoảnh khắc ẩm thực tuyệt vời!</p>
						<ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-3">
							<li class="ftco-animate"><a href="#"><span class="fa fa-twitter"></span></a></li>
							<li class="ftco-animate"><a href="#"><span class="fa fa-facebook"></span></a></li>
							<li class="ftco-animate"><a href="#"><span class="fa fa-instagram"></span></a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-6 col-lg-3">
					<div class="ftco-footer-widget mb-4">
						<h2 class="ftco-heading-2">Giờ mở cửa</h2>
						<ul class="list-unstyled open-hours">
							<li class="d-flex"><span>Thứ 2</span><span>9:00 - 24:00</span></li>
							<li class="d-flex"><span>Thứ 3</span><span>9:00 - 24:00</span></li>
							<li class="d-flex"><span>Thứ 4</span><span>9:00 - 24:00</span></li>
							<li class="d-flex"><span>Thứ 5</span><span>9:00 - 24:00</span></li>
							<li class="d-flex"><span>Thứ 6</span><span>9:00 - 02:00</span></li>
							<li class="d-flex"><span>Thứ 7</span><span>9:00 - 02:00</span></li>
							<li class="d-flex"><span>Chủ nhật</span><span> Đóng cửa</span></li>
						</ul>
					</div>
				</div>
				
				<div class="col-md-6 col-lg-3">
					<div class="ftco-footer-widget mb-4">
						<h2 class="ftco-heading-2">Bản tin</h2>
						<p>Với hàng trăm món ăn từ các nền văn hóa khác nhau, bạn sẽ được thỏa sức khám phá và thưởng thức những hương vị độc đáo. </p>
						
					</div>
				</div>
			</div>
		</div>
		<div class="container-fluid px-0 bg-primary py-3">
			<div class="row no-gutters">
				<div class="col-md-12 text-center">

					<p class="mb-0"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						Copyright &copy;<script>document.write(new Date().getFullYear());</script> 
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
					</div>
				</div>
			</div>
		</footer>
		

		<!-- loader -->
		<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


		<script src="js/jquery.min.js"></script>
		<script src="js/jquery-migrate-3.0.1.min.js"></script>
		<script src="js/popper.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.easing.1.3.js"></script>
		<script src="js/jquery.waypoints.min.js"></script>
		<script src="js/jquery.stellar.min.js"></script>
		<script src="js/owl.carousel.min.js"></script>
		<script src="js/jquery.magnific-popup.min.js"></script>
		<script src="js/jquery.animateNumber.min.js"></script>
		<script src="js/bootstrap-datepicker.js"></script>
		<script src="js/jquery.timepicker.min.js"></script>
		<script src="js/scrollax.min.js"></script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
		<script src="js/google-map.js"></script>
		<script src="js/main.js"></script>
		
	</body>
	</html>