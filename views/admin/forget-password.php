<!DOCTYPE html>
<html dir="ltr">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Password reset page for Blog Management" />
    <title>Blog Management - Forget Password</title>
    <link rel="icon" type="image/png" sizes="16x16" href="https://triptohoneymoon.com/assets/img/logo.png" />
    <link href="<?= BASE_URL; ?>assets/admin/dist/css/style.min.css" rel="stylesheet" />
</head>
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
<body>
    <div class="main-wrapper centered-container">
        <div class="auth-box bg-dark border-top border-secondary">
            <div id="loginform">
                <div class="text-center pt-3 pb-3">
                    <span class="db">
                        <img src="https://triptohoneymoon.com/assets/img/logo.png" alt="logo" style="width: 182px; background-color: white;" />
                    </span>
                </div>

                <?php if (isset($success) && $success): ?>
                    <div class="alert alert-success text-center"><?= $success ?></div>
                <?php endif; ?>

                <?php if (isset($error) && $error): ?>
                    <div class="alert alert-danger text-center"><?= $error ?></div>
                <?php endif; ?>

                <!-- Form to reset password -->
              
                    <form class="form-horizontal mt-3" action="<?= BASE_URL ?>admin/handleEmailInput" method="post">
                        <div class="row pb-4">
                            <div class="col-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-success text-white h-100" id="basic-addon1">
                                            <i class="mdi mdi-account fs-4"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control form-control-lg" placeholder="Email" aria-label="Email" name="email" aria-describedby="basic-addon1" required="" />
                                </div>
                            </div>
                        </div>

                        <div class="row border-top border-secondary">
                            <div class="col-12">
                                <div class="form-group">
                                    <div class="pt-3">
                                        <button class="btn btn-success float-end text-white" type="submit">
                                            Submit
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
               
                    <!-- Form to set new password -->
                    
            </div>
        </div>
    </div>
</body>
</html>
