<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="description" content="Orbitor,business,company,agency,modern,bootstrap4,tech,software">
    <meta name="author" content="themefisher.com">

    <title>Blog Management</title>
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
                                <span class="h4">7233080418</span>
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
                        <span class="text-white">Our Blog</span>
                        <h1 class="text-capitalize mb-5 text-lg">Blog Articles</h1>
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
                        <div class="col-lg-12 mb-4">
                            <!-- Search Form -->
                            <form action="" method="GET" class="search-form d-flex">
                                <input type="text" name="search" class="form-control" placeholder="Search blog title..." value="<?= htmlspecialchars($search_query); ?>">
                                <button type="submit" class="btn btn-main btn-icon btn-round-full ml-2"><i class="ti-search"></i> Search</button>
                            </form>
                        </div>

                        <?php
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) { ?>
                                <div class="col-lg-12 col-md-12 mb-5">
                                    <div class="blog-item">
                                        <div class="blog-thumb">
                                        <img src="<?php echo BASE_URL . 'assets/admin/' . htmlspecialchars($row['image']); ?>" alt="Image" class="img-fluid rounded">

                                        </div>
                                        <div class="blog-item-content">
                                            <div class="blog-item-meta mb-3 mt-4">
                                                <span class="text-muted text-capitalize mr-3"><i class="icofont-comment mr-2"></i>5 Comments</span>
                                                <span class="text-black text-capitalize mr-3"><i class="icofont-calendar mr-1"></i> <?= date('jS F Y', strtotime($row['publish_date'])); ?></span>
                                            </div>
                                            <h2 class="mt-3 mb-3"><a href="blog-detail?slug=<?= $row['slug']; ?>"><?= htmlspecialchars($row['title']); ?></a></h2>
                                            <p class="mb-4"><?= htmlspecialchars($row['short_descripton']); ?></p>
                                            
                                            <a href="blog-detail?slug=<?= $row['slug']; ?>" class="btn btn-main btn-icon btn-round-full">Read More <i class="icofont-simple-right ml-2"></i></a>
                                        </div>
                                    </div>
                                </div>
                        <?php }
                        } else {
                            echo "<div class='col-lg-12 text-center'><p>No blogs found.</p></div>";
                        }
                        ?>
                    </div>

                    <!-- Pagination -->
                    <nav class="pagination py-2 d-inline-block">
                        <ul class="pagination">
                            <?php if ($page > 1) : ?>
                                <li class="page-item"><a class="page-link" href="?page=<?= $page - 1; ?>&search=<?= urlencode($search_query); ?>">Previous</a></li>
                            <?php endif; ?>

                            <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
                                <li class="page-item <?= $i == $page ? 'active' : ''; ?>"><a class="page-link" href="?page=<?= $i; ?>&search=<?= urlencode($search_query); ?>"><?= $i; ?></a></li>
                            <?php endfor; ?>

                            <?php if ($page < $total_pages) : ?>
                                <li class="page-item"><a class="page-link" href="?page=<?= $page + 1; ?>&search=<?= urlencode($search_query); ?>">Next</a></li>
                            <?php endif; ?>
                        </ul>
                    </nav>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <div class="sidebar-wrap pl-lg-4 mt-5 mt-lg-0">
                        <div class="sidebar-widget latest-post mb-3">
                            <h5>Popular Posts</h5>
                            <?php
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) { ?>
                                    <div class="py-2">
                                        <span class="text-sm text-muted"> <?= date('jS F Y', strtotime($row['publish_date'])); ?></span>
                                        <h6 class="my-2"><a href="#"><?= htmlspecialchars($row['title']); ?></a></h6>
                                    </div>
                            <?php }
                            }  ?>

                        </div>

                        <div class="sidebar-widget category mb-3">
                            <h5 class="mb-4">Categories</h5>

                            <ul class="list-unstyled">
                                <li class="align-items-center">
                                    <a href="#">Medicine</a>

                                </li>
                                <li class="align-items-center">
                                    <a href="#">Equipments</a>

                                </li>
                                <li class="align-items-center">
                                    <a href="#">Heart</a>

                                </li>
                                <li class="align-items-center">
                                    <a href="#">Free counselling</a>

                                </li>
                                <li class="align-items-center">
                                    <a href="#">Lab test</a>

                                </li>
                            </ul>
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
    <footer class="">
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
                                <a href="" class="btn btn-main-2 btn-round-full">Subscribe</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <!-- 
    Essential Scripts
    =====================================-->


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