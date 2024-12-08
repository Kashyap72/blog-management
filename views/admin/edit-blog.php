<?php

include('include/header.php');

?>

<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <div class="panel-heading">
                <a href="<?php echo BASE_URL . 'admin/dashboard'; ?>"> 
                    <button class="btn btn-primary">Blog List</button>
                </a>

                </div>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Blog</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                <form class="comment-form my-5" id="comment-form" method="post" action="<?= BASE_URL ?>admin/updateblock" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Blog Image</label>
                                        <input type="hidden" name="blog_id" value="<?=$blog['id']; ?>" class="form-control" />
                                        <input type="file" name="image" class="form-control" />
                                        <img src="<?php echo BASE_URL . 'assets/admin/' . htmlspecialchars($blog['image']); ?>" alt="Current Image" width="100" class="mt-2" />
                                        <span class="text-danger"><?= $errors['imageError'] ?? ''; ?></span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="category">Choose a Category</label>
                                        <select id="category" name="category" class="form-control">
                                            <option value="">Select Category</option>
                                            <option value="Equipment" <?= $blog['category'] == 'Equipment' ? 'selected' : ''; ?>>Equipment</option>
                                            <option value="Medicine" <?= $blog['category'] == 'Medicine' ? 'selected' : ''; ?>>Medicine</option>
                                            <option value="Heart" <?= $blog['category'] == 'Heart' ? 'selected' : ''; ?>>Heart</option>
                                            <option value="Free counselling" <?= $blog['category'] == 'Free counselling' ? 'selected' : ''; ?>>Free counselling</option>
                                            <option value="Lab test" <?= $blog['category'] == 'Lab test' ? 'selected' : ''; ?>>Lab test</option>
                                        </select>
                                        <span class="text-danger"><?= $errors['categoryError'] ?? ''; ?></span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" name="title" class="form-control" value="<?= $blog['title'] ?>" />
                                        <span class="text-danger"><?= $errors['titleError'] ?? ''; ?></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Short Description</label>
                                        <input type="text" name="short_descripton" class="form-control" value="<?= $blog['short_descripton'] ?>" />
                                        <span class="text-danger"><?= $errors['shortdescriptioError'] ?? ''; ?></span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Publish Date</label>
                                        <input type="date" name="publish_date" class="form-control" value="<?= $blog['publish_date'] ?>" />
                                        <span class="text-danger"><?= $errors['publishdateError'] ?? ''; ?></span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Author Name</label>
                                        <input type="text" name="author_name" class="form-control" value="<?= $blog['author_name'] ?>" />
                                        <span class="text-danger"><?= $errors['authorError'] ?? ''; ?></span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Blog Detail</label>
                                        <textarea id="long_description" name="description" class="form-control"><?= $blog['description'] ?></textarea>
                                        <span class="text-danger"><?= $errors['descriptionNameError'] ?? ''; ?></span>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .ck-editor__editable_inline {
        min-height: 250px;
    }
</style>
<?php include('include/footer.php'); ?>
<script>
    function initializeCKEditor(element) {
        ClassicEditor
            .create(element)
            .catch(error => console.error(error));
    }
</script>
