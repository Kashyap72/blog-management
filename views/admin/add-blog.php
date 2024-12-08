<?php

include('include/header.php'); ?>


<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
            <a href="<?php echo BASE_URL . 'admin/dashboard'; ?>"> 
                    <button class="btn btn-primary">Blog List</button>
                </a>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Blog Add </li>
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
                <form class="comment-form my-5" id="comment-form" method="post" action="<?= BASE_URL ?>admin/addblock" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Blog Image</label>
                                        <input type="file" name="image" class="form-control international-inputmask" id="international-mask" placeholder="Image" />
                                        <span class="text-danger"><?php echo $errors['imageError'] ?? ''; ?></span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="category">Choose a Category</label>
                                        <select id="category" name="category" class="form-control">
                                            <option value="">Select Category</option>
                                            <option value="Equipment">Equipment</option>
                                            <option value="Medicine">Medicine</option>
                                            <option value="Heart">Heart</option>
                                            <option value="Free counselling">Free counselling</option>
                                            <option value="Lab test">Lab test</option>
                                        </select>
                                        <span class="text-danger"><?php echo $errors['categoryError'] ?? ''; ?></span>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" name="title" class="form-control international-inputmask" id="title" placeholder="Blog Title" />
                                        <span class="text-danger"><?php echo $errors['titleError'] ?? ''; ?></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Short Description</label>
                                        <input type="text" name="short_descripton" class="form-control international-inputmask" id="short_descripton" placeholder="Short Description" />
                                        <span class="text-danger"><?php echo $errors['shortdescriptioError'] ?? ''; ?></span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Publish Date</label>
                                        <input type="date" name="publish_date" class="form-control international-inputmask" id="publish_date" />
                                        <span class="text-danger"><?php echo $errors['publishdateError'] ?? ''; ?></span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Author Name</label>
                                        <input type="text" name="author_name" class="form-control international-inputmask" id="author_name" placeholder="Author Name" />
                                        <span class="text-danger"><?php echo $errors['authorError'] ?? ''; ?></span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Blog Detail </label>
                                        <textarea id="long_description" name="description"></textarea>
                                        <span class="text-danger"><?php echo $errors['descriptionNameError'] ?? ''; ?></span>
                                    </div>
                                </div>
                            </div>
                            <hr>



                        </div>
                        <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </div>
                </div>
                </form>
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