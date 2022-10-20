<?php 
include_once '../app/config.php';
include '../app/AuthController.php';
$user = new AuthController; 
    
if(!$user->isLogin()){
    header("Location:".BASE_PATH."public/productos.php");
}
?>
<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">


<head>

    <meta charset="utf-8" />
    <title>Sign Up</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="../assets/images/favicon.ico">

    <?php include '../assets/templates/css.template.php' ?>
    <link href="../assets/css/details.css" rel="stylesheet" type="text/css" />


</head>

<body>

    <!-- auth-page wrapper -->
    <div class="auth-page-wrapper auth-bg-cover py-5 d-flex justify-content-center align-items-center min-vh-100">
        <div class="bg-overlay"></div>
        <!-- auth-page content -->
        <div class="auth-page-content overflow-hidden pt-lg-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card overflow-hidden m-0">
                            <div class="row justify-content-center g-0">
                                <div class="col-lg-6">
                                    <div class="p-lg-5 p-4 auth-one-bg h-100">
                                        <div class="bg-overlay"></div>
                                        <div class="position-relative h-100 d-flex flex-column">

                                            <div class="mt-auto">

                                                <p class="text-center text-white pb-5 fs-15 fst-italic"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="p-lg-5 p-4">
                                        <div>
                                            <h5 class="text-primary">Register Account</h5>
                                        </div>

                                        <div class="mt-4">
                                            <form method="post" action="<?= BASE_PATH ?>user" enctype="multipart/form-data" id="form">

                                                <div class="row">
                                                    <div class="col-sm-12 col-md-6">
                                                        <label for="Name" class="form-label">Name <span class="text-danger">*</span></label>
                                                        <input name="name" type="text" class="form-control" id="Name" placeholder="Enter Name" required>
                                                        <p class="formulario__input-error text-danger" id="grupo_name">The name can only contain letters and spaces and minimum 2 characters maximum 20.</p>
                                                    </div>

                                                    <div class="col-sm-12 col-md-6">
                                                        <label for="Lastname" class="form-label">Lastname <span class="text-danger">*</span></label>
                                                        <input name="lastname" type="text" class="form-control" id="Lastname" placeholder="Enter Lastname" required>
                                                        <p class="formulario__input-error text-danger" id="grupo_lastname">The lastname can only contain letters and spaces and minimum 2 characters maximum 20.</p>

                                                    </div>
                                                </div>

                                                <div class="row">
                                                <div class="col-sm-12 col-md-6">
                                                    <label for="useremail" class="form-label">Email <span class="text-danger">*</span></label>
                                                    <input name="email" type="email" class="form-control" id="useremail" placeholder="Enter email address" required>
                                                    <p class="formulario__input-error text-danger" id="grupo_email">The format is not supported</p>
                                                </div>

                                                <div class="col-sm-12 col-md-6">
                                                    <label for="Phone_number" class="form-label">Phone number <span class="text-danger">*</span></label>
                                                    <input name="phone_number" type="text" class="form-control" id="Phone_number" placeholder="Enter Phone number" required>
                                                    <p class="formulario__input-error text-danger" id="grupo_phone_number">The number can only contain 10 to 14 numbers.</p>
                                                </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="Phone_number" class="form-label">Profile photo <span class="text-danger">*</span></label>
                                                    <input name="profile_photo_file" id="profile_photo_file" type="file" class="form-control" placeholder="Profile photo" aria-label="Cover" required>
                                                    <p class="formulario__input-error text-danger" id="grupo_photo">The photo is necesary (just .jpg .png .jpeg .svg)</p>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-6">
                                                        <label for="role" class="form-label">Rol</label>
                                                        <select name="role"  class="form-select" id="role">
                                                            <option value="Cliente">Cliente</option>
                                                            <option value="Usuario">Usuario</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-12 col-md-6">
                                                        <label for="create_by" class="form-label">Create by</label>
                                                        <select name="create_by" class="form-select" id="create_by">
                                                            <option value="Jonatha Soto">Jonatha Soto</option>
                                                            <option value="Equipo Dev 3">Equipo Dev 3</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label" for="password-input">Password</label>
                                                    <div class="position-relative auth-pass-inputgroup">
                                                        <input name="password" type="password" class="form-control pe-5 password-input" onpaste="return false" placeholder="Enter password" id="password-input" aria-describedby="passwordInput" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                                                        <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                                        <p class="formulario__input-error text-danger" id="grupo_password">The password must have a minimun of 8 characters</p>
                                                    </div>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label" for="password-input">Confirm Password</label>
                                                    <div class="position-relative auth-pass-inputgroup">
                                                        <input name="password2" type="password" class="form-control pe-5 password-input" onpaste="return false" placeholder="Confirm password" id="password2-input" aria-describedby="passwordInput" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                                                        <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                                    </div>
                                                    <p class="formulario__input-error text-danger" id="grupo_password2">The password must be the same</p>
                                                </div>

                                                <div id="password-contain" class="p-3 bg-light mb-2 rounded">
                                                    <h5 class="fs-13">It is recommended that the password contain:</h5>
                                                    <p id="pass-length" class="invalid fs-12 mb-2">Minimum <b>8 characters</b></p>
                                                    <p id="pass-lower" class="invalid fs-12 mb-2">At <b>lowercase</b> letter (a-z)</p>
                                                    <p id="pass-upper" class="invalid fs-12 mb-2">At least <b>uppercase</b> letter (A-Z)</p>
                                                    <p id="pass-number" class="invalid fs-12 mb-0">A least <b>number</b> (0-9)</p>
                                                </div>

                                                <div  class="mt-4">
                                                    <button class="btn btn-success w-100" type="submit" id="send">Sign Up</button>
                                                </div>
                                                <input type="hidden" name="action" value="create">
                                                <input type="hidden" name="super_token" value="<?= $_SESSION['super_token'] ?>">
                                            </form>

                                        </div>

                                        <div class="mt-5 text-center">
                                            <p class="mb-0">Already have an account ? <a href="../index.php" class="fw-semibold text-primary text-decoration-underline"> Signin</a> </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->

                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end auth page content -->

        <!-- footer -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <p class="mb-0">&copy;
                                <script>
                                    document.write(new Date().getFullYear())
                                </script> Angel AC
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->
    </div>
    <!-- end auth-page-wrapper -->

    <!-- JAVASCRIPT -->
    <?php include '../assets/templates/js.template.php' ?>

    <!-- validation init -->
    <script src="../assets/js/pages/form-validation.init.js"></script>
    <!-- password create init -->
    <script src="../assets/js/pages/passowrd-create.init.js"></script>
    <script src="../assets/js/config/registerU.js"></script>
</body>


</html>