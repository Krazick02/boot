<?php
include '../app/AuthController.php';
include '../app/BrandController.php';
include '../app/productController.php';
include '../app/CategoryController.php';
include '../app/TagController.php';


$producto = new ProductosController;
$productos = $producto->productos();
$brandss = new BrandController;
$marcas = $brandss->getBrands();
$categoriess = new CategoryController;
$categories = $categoriess->getCategories();
$user = new AuthController;


$tagss = new TagController();
$tags = $tagss->getTags();


if ($user->isLogin()) {
    header("Location:../index.php");
}?>
<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">


<head>

    <meta charset="utf-8" />
    <title>Menu</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="../assets/images/favicon.ico">

    <!-- jsvectormap css -->
    <link href="../assets/libs/jsvectormap/css/jsvectormap.min.css" rel="stylesheet" type="text/css" />

    <!--Swiper slider css-->
    <link href="../assets/libs/swiper/swiper-bundle.min.css" rel="stylesheet" type="text/css" />

    <?php include '../assets/templates/css.template.php'?>
    
    
</head>

<body>
    <!-- Begin page -->
    <div id="layout-wrapper">
        <!-- Inicia navbar -->
        <?php include '../assets/templates/navBar.template.php'?>
        <!-- Termina navbar -->

        <!-- ========== App Menu ========== -->

        <?php include '../assets/templates/sidebar.template.php'?>
        <div class="main-content">

            <div class="page-content">

                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Best Selling Products</h4>
                             
                        </div>
                        <!-- end card header -->

                        <div class="card-body">
                            <div class="table-responsive table-card">
                                <table class="table table-hover table-centered align-middle table-nowrap mb-0">
                                    <tbody>
                                        <!-- Producto -->
                                        <?php foreach ($productos as $lista) :
                                                $srt = $lista->name . '||' . $lista->description . '||' . $lista->features . '||' . $lista->brand_id . '||' . $lista->id;
                                                include '../assets/templates/products.template.php';
                                            endforeach; ?>
                                        <!-- fin Producto -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- .col-->
            </div>
        </div>
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <script>
                            document.write(new Date().getFullYear())
                        </script> © UABCS EQUIPO 3.
                    </div>

                </div>
            </div>
        </footer>
        <!-- END layout-wrapper -->



        <!--start back-to-top-->
        <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
            <i class="ri-arrow-up-line"></i>
        </button>
        <!--end back-to-top-->

        <!--preloader-->
        <div id="preloader">
            <div id="status">
                <div class="spinner-border text-primary avatar-sm" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        </div>

        <!-- JAVASCRIPT -->
        <?PHP include '../assets/templates/js.template.php'?>

        <!-- apexcharts -->
        <script src="../assets/libs/apexcharts/apexcharts.min.js"></script>

        <!-- Vector map-->
        <script src="../assets/libs/jsvectormap/js/jsvectormap.min.js"></script>
        <script src="../assets/libs/jsvectormap/maps/world-merc.js"></script>

        <!--Swiper slider js-->
        <script src="../assets/libs/swiper/swiper-bundle.min.js"></script>

        <!-- Dashboard init -->
        <script src="../assets/js/pages/dashboard-ecommerce.init.js"></script>

        <!-- App js -->
        <script src="../assets/js/app.js"></script>

        <script>
            function desc(name,target){
                swal(name,target);
            }
        </script>
</body>


</html>