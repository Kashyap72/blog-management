<?php
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
include('include/header.php');
?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <div class="panel-heading">
                <a href="<?php echo BASE_URL . 'admin/adduser'; ?>"> 
                    <button class="btn btn-primary">Add User</button>
                </a>
                </div>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">User</li>
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
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Contact</th>
                                        <th>Role</th>
                                        <th>User Name</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                

                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) { ?>

                                            <tr>
                                                <td><?= $row['full_name']; ?></td>
                                                <td><?= $row['email']; ?></td>
                                                <td><?= $row['contact_no']; ?></td>
                                                <td><?= $row['role']; ?></td>
                                                <td><?= $row['user_name']; ?></td>
                                                <td>
                                                    <button class="btn user-status-btn <?= $row['status'] == 'Active' || $row['status'] == 1 ? 'btn-success' : 'btn-danger'; ?>" data-id="<?= $row['id']; ?>" data-status="<?= $row['status']; ?>"> <?= $row['status'] == 'Active' || $row['status'] == 1 ? 'Active' : 'Inactive'; ?>
                                                    </button>
                                                </td>

                                                <td>
                                                    <a href='edituser?id=<?= $row['id']; ?>' class='btn btn-warning btn-sm'>Edit</a>
                                                   
                                                    <button class='btn btn-danger btn-sm delete-btn' data-id='<?= $row['id']; ?>'>Delete</button>
                                                </td>
                                            </tr>
                                    <?php  }
                                    } else {
                                        echo "<tr><td colspan='4' class='text-center'>No Packages Found</td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Add event listener to all delete buttons
    document.querySelectorAll('.delete-btn').forEach(button => {
        button.addEventListener('click', function() {
            const packageId = this.getAttribute('data-id');

            // Show confirmation SweetAlert
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Send AJAX request to delete the blog
                    fetch(`admin/delete/user?id=${packageId}`, {
                        method: 'GET',
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            Swal.fire(
                                'Deleted!',
                                'The blog has been deleted.',
                                'success'
                            ).then(() => {
                                window.location.reload(); // Reload the page after successful deletion
                            });
                        } else {
                            Swal.fire(
                                'Error!',
                                data.message,
                                'error'
                            );
                        }
                    })
                    .catch(err => {
                        Swal.fire(
                            'Error!',
                            'Something went wrong!',
                            'error'
                        );
                    });
                }
            });
        });
    });

 
    document.addEventListener('DOMContentLoaded', function() {
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.has('message')) {
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: urlParams.get('message'),
                timer: 3000,
                showConfirmButton: false
            });
        } else if (urlParams.has('error')) {
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: urlParams.get('error'),
                timer: 3000,
                showConfirmButton: false
            });
        }
    });
</script>

<script>
   // Toggle status button with SweetAlert2
document.querySelectorAll('.user-status-btn').forEach(button => {
    button.addEventListener('click', function() {
        const packageId = this.getAttribute('data-id');
        const currentStatus = this.getAttribute('data-status');
        const newStatus = currentStatus === 'Active' ? 'Inactive' : 'Active';

        Swal.fire({
            title: 'Are you sure?',
            text: `Do you want to set this package to ${newStatus}?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, change it!'
        }).then((result) => {
            if (result.isConfirmed) {
                fetch('<?php echo BASE_URL; ?>admin/user/changeStatus', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            id: packageId,
                            status: newStatus
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            this.setAttribute('data-status', newStatus);
                            this.classList.toggle('btn-success', newStatus === 'Active');
                            this.classList.toggle('btn-danger', newStatus === 'Inactive');
                            this.textContent = newStatus;

                            Swal.fire({
                                icon: 'success',
                                title: 'Status Updated!',
                                text: 'The package status has been updated successfully.',
                                timer: 2000,
                                showConfirmButton: true
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                text: data.message || 'Failed to update package status.',
                                timer: 2000,
                                showConfirmButton: true
                            });
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: 'An error occurred while updating the package status.',
                            timer: 2000,
                            showConfirmButton: true
                        });
                    });
            }
        });
    });
});
</script>



<?php include('include/footer.php'); ?>