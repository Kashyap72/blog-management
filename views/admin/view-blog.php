<?php
include('include/header.php');

?>

<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">

            <div class="container mt-4">
                <h2 class="text-center mb-4">View Blog: <?php echo htmlspecialchars($blog['title']); ?></h2>

                <div class="card mb-3">
                    <div class="card-header">blog Information</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <strong>Image:</strong><br>
                                <?php if ($blog['image']): ?>
                                    <img src="<?php echo BASE_URL . 'assets/admin/' . htmlspecialchars($blog['image']); ?>" alt="blog Image" class="img-fluid" style="max-height: 200px;">
                                <?php else: ?>
                                    <p>No image available</p>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-6 mb-3">
                                <strong>Author Name:</strong>
                                <p><?php echo htmlspecialchars($blog['author_name']); ?></p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <strong>Category:</strong>
                                <p><?php echo htmlspecialchars($blog['category']); ?></p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <strong>Publish Date:</strong>
                                <p><?php echo htmlspecialchars($blog['publish_date']); ?></p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <strong>Short Description:</strong>
                                <p><?php echo htmlspecialchars($blog['short_descripton']); ?></p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <strong>description:</strong>
                                <p><?php echo htmlspecialchars($blog['description']); ?></p>
                            </div>
                           
                        </div>
                    </div>
                </div>
                <div class="text-center mb-4">
                    <a href="<?php echo BASE_URL . 'admin/dashboard'; ?>" class="btn btn-secondary">Back to blogs</a>
                </div>
            </div>

            <?php include('include/footer.php'); ?>