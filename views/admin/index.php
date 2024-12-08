<?php
session_start();
include('include/db_connection.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = md5($_POST['password']); // Encrypt password using MD5

    // Simple SQL query to check if the user exists
    $sql = "SELECT id, full_name FROM users WHERE user_name = '$username' AND password = '$password' LIMIT 1";
    $result = mysqli_query($conn, $sql);

    // Check if query succeeded
    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }

    // Validate login credentials
    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['full_name'] = $user['full_name'];

        // Redirect to the dashboard or home page
        header("Location: blog-list.php");
        exit;
    } else {
        $error = "Invalid username or password.";
    }
}
?>


<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta
        name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Matrix lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Matrix admin lite design, Matrix admin lite dashboard bootstrap 5 dashboard template" />
    <meta
        name="description"
        content="Matrix Admin Lite Free Version is powerful and clean admin dashboard template, inpired from Bootstrap Framework" />
    <meta name="robots" content="noindex,nofollow" />
    <title>Blog Management</title>

    <link
        rel="icon"
        type="image/png"
        sizes="16x16"
        href="https://triptohoneymoon.com/assets/img/logo.png" />

    <link href="dist/css/style.min.css" rel="stylesheet" />
    <style>
        .centered-container {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        .auth-box {
            max-width: 500px;
            width: 100%;
            padding: 20px;
            box-sizing: border-box;
        }

        .input-group {
            margin-bottom: 15px;
        }
    </style>
</head>

<body>
    <div class="main-wrapper centered-container">
        <div class="auth-box bg-dark border-top border-secondary">
            <div id="loginform">
                <div class="text-center pt-3 pb-3">
                    <span class="db"><img src="https://triptohoneymoon.com/assets/img/logo.png" alt="logo" style="width: 182px;
                    background-color: white;" /></span>

                </div>
                <form class="form-horizontal mt-3" id="loginform" action="" method="post">
                    <div class="row pb-4">
                        <div class="col-12">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span  class="input-group-text bg-success text-white h-100"  id="basic-addon1"><i class="mdi mdi-account fs-4"></i></span>
                                </div>
                                <input type="text"  class="form-control form-control-lg"  placeholder="Username"  aria-label="Username" name="username" aria-describedby="basic-addon1"  required="" />
                            </div>
                            <div class="input-group mb-3" style="margin-top: 45px;">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-warning text-white h-100" id="basic-addon2"><i class="mdi mdi-lock fs-4"></i></span>
                                </div>
                                <input  type="password"   class="form-control form-control-lg" name="password"  placeholder="Password" aria-label="Password"
                                    aria-describedby="basic-addon1"
                                    required="" />
                            </div>
                            <?php if (!empty($error)) : ?>
                                <p class="text-danger text-center"><?= $error ?></p>
                            <?php endif; ?>
                        </div>
                    </div>


                    <div class="row border-top border-secondary">
                        <div class="col-12">
                            <div class="form-group">
                                <div class="pt-3">
                                  <a href="forget-password.php"><button class="btn btn-info" id="to-recover" type="button">
                                        <i class="mdi mdi-lock fs-4 me-1"></i> Forget password?
                                    </button></a> 
                                   
                                   
                                    <button
                                        class="btn btn-success float-end text-white"
                                        type="submit">
                                        Login
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>


        </div>
    </div>

    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(".preloader").fadeOut();

        $("#to-recover").on("click", function() {
            $("#loginform").slideUp();
            $("#recoverform").fadeIn();
        });
        $("#to-login").click(function() {
            $("#recoverform").hide();
            $("#loginform").fadeIn();
        });
    </script>
</body>

</html>