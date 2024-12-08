<?php

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}
include('include/header.php');
?>

<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <div class="panel-heading">
                    <a href="user-list.php"> <button class="btn btn-primary">User List</button></a>
                </div>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add User</li>
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
                    <form class="comment-form my-5" id="comment-form" method="post" action="<?= BASE_URL ?>admin/adduser" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="role">Choose a Role</label>
                                        <select id="role" name="role" class="form-control">
                                            <option value="">Select Role</option>
                                            <option value="Super Admin">Super Admin</option>
                                            <option value="Admin">Admin</option>
                                            <option value="Employee">Employee</option>
                                        </select>
                                        <span class="text-danger"><?php echo $errors['role'] ?? ''; ?></span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="full_name">Full Name</label>
                                        <input type="text" name="full_name" class="form-control" id="full_name" placeholder="Full Name" />
                                        <span class="text-danger"><?php echo $errors['full_name'] ?? ''; ?></span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="contact_no">Contact Number</label>
                                        <input type="text" name="contact_no" class="form-control" id="contact_no" placeholder="Contact Number" />
                                        <span class="text-danger"><?php echo $errors['contact_no'] ?? ''; ?></span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" class="form-control" id="email" />
                                        <span class="text-danger"><?php echo $errors['email'] ?? ''; ?></span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="user_name">Username</label>
                                        <input type="text" name="user_name" class="form-control" id="user_name" placeholder="Username" />
                                        <span class="text-danger"><?php echo $errors['user_name'] ?? ''; ?></span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" class="form-control" id="password" placeholder="Password" />
                                        <span class="text-danger"><?php echo $errors['password'] ?? ''; ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('include/footer.php'); ?>