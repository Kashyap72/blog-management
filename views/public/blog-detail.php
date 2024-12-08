<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="zxx">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="description" content="Orbitor,business,company,agency,modern,bootstrap4,tech,software">
	<meta name="author" content="themefisher.com">

    <title>Blog Details</title>
    <link rel="shortcut icon" type="image/x-icon" href="<?= BASE_URL; ?>assets/frontend/images/favicon.ico" />
    <link rel="stylesheet" href="<?= BASE_URL; ?>assets/frontend/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= BASE_URL; ?>assets/frontend/plugins/icofont/icofont.min.css">
    <link rel="stylesheet" href="<?= BASE_URL; ?>assets/frontend/plugins/slick-carousel/slick/slick.css">
    <link rel="stylesheet" href="<?= BASE_URL; ?>assets/frontend/plugins/slick-carousel/slick/slick-theme.css">
    <link rel="stylesheet" href="<?= BASE_URL; ?>assets/frontend/css/style.css">

</head>

<body id="top">

	<header>
		<div class="header-top-bar">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-lg-6">
						<ul class="top-bar-info list-inline-item pl-0 mb-0">
							<li class="list-inline-item"><a href="mailto:support@gmail.com"><i class="icofont-support-faq mr-2"></i>support@blog.com</a></li>
							<li class="list-inline-item"><i class="icofont-location-pin mr-2"></i>Address Ta-134/A, New Delhi, India </li>
						</ul>
					</div>
					<div class="col-lg-6">
						<div class="text-lg-right top-right-bar mt-2 mt-lg-0">
							<a href="tel:+23-345-67890">
								<span>Call Now : </span>
								<span class="h4">723300418</span>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<nav class="navbar navbar-expand-lg navigation" id="navbar">
			<div class="container">
				<a class="navbar-brand" href="index.html">
				<img src="<?= BASE_URL; ?>assets/frontend/images/blog2.webp" alt="Logo" class="img-fluid" style="max-width: 110px; height: auto;">
				</a>

				<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarmain" aria-controls="navbarmain" aria-expanded="false" aria-label="Toggle navigation">
					<span class="icofont-navigation-menu"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarmain">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item active">
						<a class="nav-link" href="blog.php">Home</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
	</header>



	<section class="page-title bg-1">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="block text-center">
						<span class="text-white">News details</span>
						<h1 class="text-capitalize mb-5 text-lg">Blog Detail</h1>
					</div>
				</div>
			</div>
		</div>
	</section>

	
	<section class="section blog-wrap">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<div class="row">
						<div class="col-lg-12 mb-5">
							<div class="single-blog-item">
								<img src="<?php echo 'admin/' . htmlspecialchars($blog['image']); ?>" alt="" class="img-fluid">

								<div class="blog-item-content mt-5">
									<div class="blog-item-meta mb-3">
										<span class="text-color-2 text-capitalize mr-3"><i class="icofont-book-mark mr-2"></i> <?= $blog['category']; ?></span>
										<span class="text-muted text-capitalize mr-3"><i class="icofont-comment mr-2"></i>5 Comments</span>
										<span class="text-black text-capitalize mr-3"><i class="icofont-calendar mr-2"></i> <?= date('jS F Y', strtotime($blog['publish_date'])); ?>
										</span>
									</div>

									<h2 class="mb-4 text-md"><?= $blog['title']; ?></h2>

									<p class="lead mb-4"><?= $blog['short_descripton']; ?></p>

									<p><?= $blog['description']; ?></p>

									<div class="mt-5 clearfix">
										<ul class="float-left list-inline tag-option">
											<li class="list-inline-item"><a href="#">Advancher</a></li>
											<li class="list-inline-item"><a href="#">Landscape</a></li>
											<li class="list-inline-item"><a href="#">Travel</a></li>
										</ul>


									</div>
								</div>
							</div>
						</div>

						<div class="col-lg-12">
							<div class="comment-area mt-4 mb-5">
								<h4 class="mb-4"><?= mysqli_num_rows($comments_result); ?> Comments </h4>
								<ul class="comment-tree list-unstyled">
									<?php while ($comment = mysqli_fetch_assoc($comments_result)) { ?>
										<li class="mb-5">
											<div class="comment-area-box">
												<!-- <div class="comment-thumb float-left">
												<img alt="" src="images/blog/testimonial1.jpg" class="img-fluid">
											</div> -->

												<div class="comment-info">
													<h5 class="mb-1"><?= htmlspecialchars($comment['name']); ?></h5>
													<span><?= htmlspecialchars($comment['email']); ?></span>
													<span class="date-comm">| Posted <?= date('jS F Y, h:i A', strtotime($comment['created_at'])); ?></span>
												</div>
												<!-- <div class="comment-meta mt-2">
												<a href="#"><i class="icofont-reply mr-2 text-muted"></i>Reply</a>
											</div> -->

												<div class="comment-content mt-3">
													<p><?= nl2br(htmlspecialchars($comment['message'])); ?></p>
												</div>
											</div>
										</li>
										<li>
										</li>
									<?php } ?>
								</ul>
							</div>
						</div>

						<div class="col-lg-12">
                        <form class="comment-form my-5" id="comment-form" method="post" action="<?= BASE_URL ?>blog/submitComment">



								<h4 class="mb-4">Write a comment</h4>
								<div class="row">
									<div class="col-md-6">
                                        <input type="hidden" name="blog_id" value="<?= $blog['id']; ?>">
                                        <input type="hidden" name="slug" value="<?= $_GET['slug'] ?>">
										<div class="form-group">
											<input class="form-control" type="text" name="name" placeholder="Name:" required>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<input class="form-control" type="email" name="email" placeholder="Email:" required>
										</div>
									</div>
								</div>


								<textarea class="form-control mb-4" name="comment" cols="30" rows="5" placeholder="Comment" required></textarea>
								<button class="btn btn-main-2 btn-round-full" type="submit">Submit Comment</button>
							</form>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="sidebar-wrap pl-lg-4 mt-5 mt-lg-0">
						<div class="sidebar-widget search  mb-3 ">
							<h5>Search Here</h5>
							<form action="#" class="search-form">
								<input type="text" class="form-control" placeholder="search">
								<i class="ti-search"></i>
							</form>
						</div>


						<div class="sidebar-widget latest-post mb-3">
							<h5>Popular Posts</h5>

							<div class="py-2">
								<span class="text-sm text-muted">03 Mar 2018</span>
								<h6 class="my-2"><a href="#">Thoughtful living in los Angeles</a></h6>
							</div>

							<div class="py-2">
								<span class="text-sm text-muted">03 Mar 2018</span>
								<h6 class="my-2"><a href="#">Vivamus molestie gravida turpis.</a></h6>
							</div>

							<div class="py-2">
								<span class="text-sm text-muted">03 Mar 2018</span>
								<h6 class="my-2"><a href="#">Fusce lobortis lorem at ipsum semper sagittis</a></h6>
							</div>
						</div>

						<div class="sidebar-widget category mb-3">
							<h5 class="mb-4">Categories</h5>

							<ul class="list-unstyled">
								<li class="align-items-center">
									<a href="#">Medicine</a>
									<span>(14)</span>
								</li>
								<li class="align-items-center">
									<a href="#">Equipments</a>
									<span>(2)</span>
								</li>
								<li class="align-items-center">
									<a href="#">Heart</a>
									<span>(10)</span>
								</li>
								<li class="align-items-center">
									<a href="#">Free counselling</a>
									<span>(5)</span>
								</li>
								<li class="align-items-center">
									<a href="#">Lab test</a>
									<span>(5)</span>
								</li>
							</ul>
						</div>


						<div class="sidebar-widget tags mb-3">
							<h5 class="mb-4">Tags</h5>

							<a href="#">Doctors</a>
							<a href="#">agency</a>
							<a href="#">company</a>
							<a href="#">medicine</a>
							<a href="#">surgery</a>
							<a href="#">Marketing</a>
							<a href="#">Social Media</a>
							<a href="#">Branding</a>
							<a href="#">Laboratory</a>
						</div>


						<div class="sidebar-widget schedule-widget mb-3">
							<h5 class="mb-4">Time Schedule</h5>

							<ul class="list-unstyled">
								<li class="d-flex justify-content-between align-items-center">
									<a href="#">Monday - Friday</a>
									<span>9:00 - 17:00</span>
								</li>
								<li class="d-flex justify-content-between align-items-center">
									<a href="#">Saturday</a>
									<span>9:00 - 16:00</span>
								</li>
								<li class="d-flex justify-content-between align-items-center">
									<a href="#">Sunday</a>
									<span>Closed</span>
								</li>
							</ul>

							<div class="sidebar-contatct-info mt-4">
								<p class="mb-0">Need Urgent Help?</p>
								<h3>+23-4565-65768</h3>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</section>


	<!-- footer Start -->
	<footer class="footer">
		<div class="container">
			
			<div class="footer-btm py-4 mt-5">
				<div class="row align-items-center justify-content-between">
					<div class="col-lg-6">
						<div class="copyright">
							&copy; Copyright Reserved to <span class="text-color">Blog Management</span> by <a>Priya Kashyap</a>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="subscribe-form text-lg-right mt-5 mt-lg-0">
							<form action="#" class="subscribe">
								<input type="text" class="form-control" placeholder="Your Email address">
								<a href="#" class="btn btn-main-2 btn-round-full">Subscribe</a>
							</form>
						</div>
					</div>
				</div>

				
			</div>
		</div>
	</footer>
  <!-- Main jQuery -->
  <script src="<?= BASE_URL; ?>assets/frontend/plugins/jquery/jquery.js"></script>
    <!-- Bootstrap 4.3.2 -->
    <script src="<?= BASE_URL; ?>assets/frontend/plugins/bootstrap/js/popper.js"></script>
    <script src="<?= BASE_URL; ?>assets/frontend/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= BASE_URL; ?>assets/frontend/plugins/counterup/jquery.easing.js"></script>
    <!-- Slick Slider -->
    <script src="<?= BASE_URL; ?>assets/frontend/plugins/slick-carousel/slick/slick.min.js"></script>
    <!-- Counterup -->
    <script src="<?= BASE_URL; ?>assets/frontend/plugins/counterup/jquery.waypoints.min.js"></script>

    <script src="<?= BASE_URL; ?>assets/frontend/plugins/shuffle/shuffle.min.js"></script>
    <script src="<?= BASE_URL; ?>assets/frontend/plugins/counterup/jquery.counterup.min.js"></script>
    <!-- Google Map -->
    <script src="<?= BASE_URL; ?>assets/frontend/plugins/google-map/map.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAkeLMlsiwzp6b3Gnaxd86lvakimwGA6UA&callback=initMap"></script>

    <script src="<?= BASE_URL; ?>assets/frontend/js/script.js"></script>
    <script src="<?= BASE_URL; ?>assets/frontend/js/contact.js"></script>

</body>

</html>